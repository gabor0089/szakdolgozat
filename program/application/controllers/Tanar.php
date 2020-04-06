<?PHP

class Tanar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
        $this->load->helper(array('form', 'url'));
		$userid = $this->session->user_id;
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
			'iskolanev'=>$iskolanev
		];
	}
	public function Orarend()
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$orarend=$this->tanar_model->orarend($userid);
		$orarend2=[
		'orarend'=>$orarend,
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/orarend',$orarend2);
	}
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$orarend=$this->tanar_model->orarend($userid);
		$orarend2=[
		'orarend'=>$orarend,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('tanar/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
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
	public function Osztalyozas() //EZ JÓ, EHHEZ NE NYÚLJ!!!
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$diakok=$this->tanar_model->mindensajatdiak($userid);
		$tantargyak=$this->tanar_model->sajattantargyak($userid);
		foreach($diakok as $nev)
		{
			$diakoknevei[]=$nev['name'];
			$diakokid[]=$nev['userid'];
		}
		foreach($tantargyak as $targy)
		{
			$tantargyaknevei[]=$targy['tantargy']."_".$targy['osztaly'];
		}
		$diakoknevei=array_unique($diakoknevei);
		$tantargyaknevei=array_unique($tantargyaknevei);
		$data=[
			'diakok' => $diakoknevei,
			'tantargyak' => $tantargyaknevei
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyozas',$data);
	}

	public function Jegyek_egyeni($diakid=null,$tantargy=null)
	{
		if($diakid==null)
		{
			//echo "null a diakid";
			$tanarid=$this->session->user_id;
			$this->load->model('tanar_model');
			$diak=$this->input->post('diak');
			$diakid=$this->tanar_model->diakid($diak);
			
			$tantargy=$this->input->post('tantargy');
			$szokozhelye=strrpos($tantargy, '_', -1);
			$osztaly = substr($tantargy,-3,$szokozhelye);
			$targy = substr($tantargy,0,$szokozhelye);
			$tantargyid=$this->tanar_model->tantargyid($targy,$osztaly);
			$jegyek=$this->tanar_model->jegyek($diakid['userid'],$tantargyid['tantargyid']);
			$data=[
					'jegyek'=>$jegyek,
					'tantargynev'=>$targy,
					'tantargyid'=>$tantargyid['tantargyid'],
					'diaknev'=>$diak,
					'diakid'=>$diakid['userid']];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('tanar/jegyek',$data);
		}
		else
		{
			//echo "nem null a diakid";
			$tanarid=$this->session->user_id;
			$this->load->model('tanar_model');
			$diak=$this->tanar_model->diaknev($diakid);
			
			$targy=$this->tanar_model->tantargynev($tantargy);
			$jegyek=$this->tanar_model->jegyek($diakid,$tantargy);
			$data=[
					'jegyek'=>$jegyek,
					'tantargynev'=>$targy['nev'],
					'tantargyid'=>$tantargy,
					'diaknev'=>$diak['name'],
					'diakid'=>$diakid];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('tanar/jegyek',$data);
		}	
	}
	public function Ujjegyadas()
	{
		$this->load->model('tanar_model');
		$diak=$this->input->post('diakid');
		$tantargy=$this->input->post('tantargyid');
		$megjegyzes=$this->input->post('megjegyzes');
		$jegy=$this->input->post('jegy');
		$tanarid = $this->session->user_id;
		$this->tanar_model->Ujjegy($tanarid,$diak,$tantargy,$jegy,$megjegyzes);
		$this->Jegyek_egyeni($diak,$tantargy);		
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
		$this->load->model('tanar_model');
		$datas=$this->tanar_model->alapadatok();
		$adatok2=
		[
			'isnev'=>$datas[0]['iskolanev'],
			'ignev'=>$datas[0]['igazgatonev'],
			'cim'=>$datas[0]['iskolacim'],
			'ev'=>$datas[0]['ev']
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/alapadatok',$adatok2);
	}
	public function Kollegalista()
	{
		$this->load->model('tanar_model');
		$kollegalista=$this->tanar_model->kollegalista();
		$data=['kollegak'=>$kollegalista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/kollegak',$data);
	}
	public function Osztalylista()
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->tanar_model->osztalylista($userid);
		$data=['osztalyok'=>$osztalylista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyok',$data);
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

}