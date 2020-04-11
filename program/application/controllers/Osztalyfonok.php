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
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$orarend=$this->osztalyfonok_model->orarend($osztalyomid);
		$orarend2=[
		'orarend'=>$orarend,
		'osztalyom'=>$osztalyomnev,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('osztalyfonok/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
	}
	public function Osztalyozas($sorszam=null)
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];

		$tantargyak=$this->osztalyfonok_model->tantargyak($osztalyomid);

		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		if($sorszam==null)
			$sszam=0;
		else $sszam=$sorszam;
		$jegyek=$this->osztalyfonok_model->jegyek($tantargyak[$sszam]['tantargyid']);
		$data=['nevek'=>$nevek,
				'tantargyidk'=>$tantargyak[$sszam]['tantargyid'],
				'tantargynevek'=>$tantargyak[$sszam]['nev'],
				'jegyek'=>$jegyek,
				'sszam'=>$sszam,
				];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas',$data);
	}
	public function Hianyzas()
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		$hianyzasok=$this->osztalyfonok_model->hianyzasok();
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$data=array('nevek'=>$nevek,
					'hianyzasok'=>$hianyzasok);
		$this->load->view('osztalyfonok/hianyzasok',$data);
	}
	public function Reszletes_hianyzas($diakid=null)
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		if(!isset($diakid))
			$diakid=$this->input->post('userid');		
		$hianyzas=$this->osztalyfonok_model->hianyzas($diakid);
		$diaknev=$this->osztalyfonok_model->diaknev($diakid);
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$igazolasok = array(
				''		=>'',
		        'orvosi'=> 'Orvosi igazolás',
		        'szuloi'=> 'Szülői igazolás',
		        'tanari'=> 'Tanári igazolás',
		        'egyeb' => 'Egyéb',
		        'igazolatlan' => 'IGAZOLATLAN'
		);
		$data=array('hianyzas'=>$hianyzas,
					'igazolasok'=>$igazolasok,
					'diaknev'=>$diaknev['name']);
		$this->load->view('osztalyfonok/hianyzasok_reszletes',$data);
	}
	public function Hianyzaskesz()
	{
		$this->load->model('osztalyfonok_model');
		$diakid=$this->input->post('diakid');
		$hianyzasid=$this->input->post('hianyzasid');
		$tipus=$this->input->post('tipus');
		$megjegyzes=$this->input->post('megjegyzes');
		if($tipus=="igazolatlan")
		$this->osztalyfonok_model->hianyzas_mod($hianyzasid,$tipus,$megjegyzes,3);
		else
		$this->osztalyfonok_model->hianyzas_mod($hianyzasid,$tipus,$megjegyzes,2);
		$this->reszletes_hianyzas($diakid);
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
		$this->load->model('osztalyfonok_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->osztalyfonok_model->osztalylista($userid);
		$data=['osztalyok'=>$osztalylista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyom',$data);
	}
	public function Osztalynevsor()
	{
		$this->load->model('osztalyfonok_model');
		$userid = $this->session->user_id;
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalynevsor=$this->osztalyfonok_model->osztalynevsor($adatok[0]['osztalyid']);
		$data=[
			   'nevek'=>$osztalynevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalynevsor',$data);
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