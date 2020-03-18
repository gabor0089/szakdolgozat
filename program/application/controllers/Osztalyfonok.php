<?PHP

class Osztalyfonok extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
        $this->load->helper(array('form', 'url'));
	}

    public function index()
    {

        $this->load->view('admin/alapadatok', array('error' => ' ' ));
    }

	public function Main()
	{
		$this->load->model('users_model');
		$userid = $this->session->user_id;
		$iskolanev=$this->users_model->iskolanev();
		$iskolanev=$iskolanev[0]['iskolanev'];
		$items=$this->users_model->get_userdata($userid);
		switch($items[0]['beosztas'])
		{
			case '0':
				$beosztasnev="adminisztrátor";
				$headerlink='header/admin';
			break;
			case '1':
				$beosztasnev="igazgató";
				$headerlink='header/igazgato';
			break;
			case '2':
				$this->load->model('osztalyfonok_model');
				$osztalynev=$this->osztalyfonok_model->osztalyom($userid);
				$osztaly=$osztalynev[0]['osztalynev'];
				$beosztasnev="osztályfőnök";
				$headerlink='header/ofonok';
			break;
			case '3':
				$beosztasnev="tanár";
				$headerlink='header/tanar';
			break;
			case '4':
				$beosztasnev="diák";
				$headerlink='header/diak';
			break;
			case '5':
				$beosztasnev="szülő";
				$headerlink='header/szulo';
			break;
		}
		return $adatok=
		[
			'headerlink'=>$headerlink,
			'userid'=>$items[0]['userid'],
			'name'=>$items[0]['name'],
			'beosztas'=>$beosztasnev,
			'iskolanev'=>$iskolanev,
			'osztaly'=>$osztaly
		];
	}
	public function Orarend()
	{
		$userid = $this->session->user_id;
		
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$orarend=$this->osztalyfonok_model->orarend($osztalyomid);


		$orarend2=[
		'orarend'=>$orarend,
		'osztalyom'=>$osztalyomnev
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/orarend',$orarend2);
	}
	public function Osztalyozas()
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];

		$tantargyak=$this->osztalyfonok_model->tantargyak($osztalyomid);

		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		$jegyek=$this->osztalyfonok_model->jegyek($tantargyak[0]['tantargyid']);
		$data=['nevek'=>$nevek,
				'tantargyidk'=>$tantargyak[0]['tantargyid'],
				'tantargynevek'=>$tantargyak[0]['nev'],
				'jegyek'=>$jegyek
				];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas',$data);
	}
	public function Hianyzas()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/hianyzasok');
	}
	public function Ujhianyzas()
	{
		$this->load->model('tanar_model');
		$osztaly=$this->input->post('osztaly');
		$datum=$this->input->post('datum');
		$ora=$this->input->post('ora');
		$osztalyid=$this->tanar_model->osztalyid($osztaly);
		$osztalyid=$osztalyid['osztalyid'];
		$nevsor=$this->tanar_model->nevsor($osztalyid);
		$nevsorhianyzas=[
			'osztaly'=>$osztaly,
			'datum'=>$datum,
			'ora'=>$ora,
			'nevsor'=>$nevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/hianyzasok',$nevsorhianyzas);		
	}
	public function Ujhianyzasfelvitel()
	{
		$tanarid=$this->session->user_id;
		$this->load->model('tanar_model');
		$diakid=$this->input->post('diakid');
		$ora=$this->input->post('ora');
		$hianyzas_datum=$this->input->post('hianyzas_datum');
		$perc=$this->input->post('perc');
		$this->tanar_model->Ujhianyzasfelvitel($tanarid,$diakid,$ora,$perc,$hianyzas_datum);
		$this->Ujhianyzas();
	}
	public function Ujjegyadas()
	{
		$this->load->model('tanar_model');
		$diak=$this->input->post('diak');
		$tantargy=$this->input->post('tantargy2');
		$diakid    =$this->tanar_model->diakid($diak);
		$tantargyid=$this->tanar_model->tantargyid($tantargy);
		$jegy=$this->input->post('jegy');
		$tanarid = $this->session->user_id;
		$this->tanar_model->Ujjegy($tanarid,$diakid['userid'],$tantargyid['tantargyid'],$jegy);
		$this->Osztalyozas();		
	}
	public function Ujjegyadas2()
	{
		$this->load->model('tanar_model');
		$tanarid=$this->input->post('tanarid');
		$diakid=$this->input->post('diakid');
		$tantargyid=$this->input->post('tantargyid');
		$jegy=$this->input->post('jegy');
		$megjegyzes=$this->input->post('megjegyzes');
		$this->tanar_model->Ujjegy($tanarid,$diakid,$tantargyid,$jegy,$megjegyzes);
		$this->Jegyek($diakid,$tantargyid);		
	}
	public function Haladasinaplo($targyid=null)
	{
		$haladasinaplo=[];
		$this->load->model('tanar_model');
		if($targyid<>NULL)
		{
			$haladasinaplo=$this->tanar_model->haladasinaplo($targyid);
		}
		$adatok=$this->Main();
		$userid = $this->session->user_id;
		$tanitotttargyak=$this->tanar_model->tanitotttargyak($userid);
		$data=[ 'tanitotttargyak'=>$tanitotttargyak,
				'naplo'=>$haladasinaplo];
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/haladasinaplo',$data);
	}
	public function Haladasinaplokesz()
	{
		$id=$this->input->post('naploid');
		$targyid=$this->input->post('targyid');
		$tev=$this->input->post('tev');
		$this->load->model('tanar_model');
		$this->tanar_model->haladasinaplokesz($id,$tev);
		redirect('Tanar/Haladasinaplo/'.$targyid);
	}

	public function Alapadatok()
	{
		$this->load->model('osztalyfonok_model');
		$datas=$this->osztalyfonok_model->alapadatok();
		$adatok2=
		[
			'isnev'=>$datas[0]['iskolanev'],
			'ignev'=>$datas[0]['igazgatonev'],
			'cim'=>$datas[0]['iskolacim'],
			'ev'=>$datas[0]['ev']
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/alapadatok',$adatok2);
	}
	public function Kollegalista()
	{
		$this->load->model('tanar_model');
		$kollegalista=$this->tanar_model->kollegalista();
		$data=['kollegak'=>$kollegalista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/kollegak',$data);
	}
	public function Osztalylista()
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->osztalyfonok_model->osztalylista($userid);
		$data=['osztalyok'=>$osztalylista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyok',$data);
	}
	public function Osztalynevsor($osztalyid)
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->tanar_model->osztalylista($userid);
		$osztalynevsor=$this->tanar_model->osztalynevsor($osztalyid);
		$data=['osztalyok'=>$osztalylista,
			   'nevek'=>$osztalynevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalynevsor',$data);
	}
	public function Jegyek($diakid=null,$tantargyid=null)
	{
		$this->load->model('tanar_model');
		if(!isset($tantargyid))
		{
			$diaknev=$this->input->post('diak');
			$tantargynev=$this->input->post('tantargy2');
			$diakid    =$this->tanar_model->diakid($diaknev);
			$tantargyid=$this->tanar_model->tantargyid($tantargynev);
			$jegyek=$this->tanar_model->jegyek($diakid['userid'],$tantargyid['tantargyid']);
			$data=['jegyek'=>$jegyek,'tantargynev'=>$tantargynev,'diaknev'=>$diaknev];
		}
		else
		{
			$diaknev    =$this->tanar_model->diaknev($diakid);
			$tantargynev=$this->tanar_model->tantargynev($tantargyid);
			$jegyek=$this->tanar_model->jegyek($diakid,$tantargyid);
			$data=['jegyek'=>$jegyek,'tantargynev'=>$tantargynev['nev'],'diaknev'=>$diaknev['name']];
		}
		$adatok=$this->Main();
		//var_dump($data);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/jegyek',$data);	
	}

}