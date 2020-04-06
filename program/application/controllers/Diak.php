<?PHP

class Diak extends CI_Controller
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
	public function Alapadatok()
	{
		$this->load->model('diak_model');
		$datas=$this->diak_model->alapadatok();
		$adatok2=
		[
			'isnev'=>$datas[0]['iskolanev'],
			'ignev'=>$datas[0]['igazgatonev'],
			'cim'=>$datas[0]['iskolacim'],
			'ev'=>$datas[0]['ev']
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/alapadatok',$adatok2);
	}
	public function Tanaraim()
	{
		$this->load->model('diak_model');
		$userid=$this->session->user_id;
		$osztalyidm=$this->diak_model->osztaly($userid);
		$tanaraim=$this->diak_model->tanaraim($osztalyidm[0]['osztalyid']);
		$adatok2=[
		'tanaraim'=>$tanaraim
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/tanaraim',$adatok2);
	}
	public function Osztalyom()
	{
		$this->load->model('diak_model');
		$userid=$this->session->user_id;
		$osztalyidm=$this->diak_model->osztaly($userid);
		$osztalyom=$this->diak_model->osztalyom($osztalyidm[0]['osztalyid']);
		$adatok2=[
		'osztalyom'=>$osztalyom
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/osztalyom',$adatok2);
	}

	public function Orarend()
	{
		$this->load->model('diak_model');
		$userid = $this->session->user_id;
		$osztalyidm=$this->diak_model->osztaly($userid);
		$orarend=$this->diak_model->orarend($osztalyidm[0]['osztalyid']);
		$orarend2=[
		'orarend'=>$orarend,
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/orarend',$orarend2);
	}
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$this->load->model('diak_model');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$userid = $this->session->user_id;
		$osztalyidm=$this->diak_model->osztaly($userid);
		$orarend=$this->diak_model->orarend($osztalyidm[0]['osztalyid']);
		$orarend2=[
		'orarend'=>$orarend,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('diak/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
	}

	public function Osztalyozas()
	{
		$userid = $this->session->user_id;
		$this->load->model('diak_model');
		$set=$this->diak_model->jegy_set($userid);
		if($set[0]['value']<0)//Táblázatosan jelenjenek meg!!!
		{
			$osztalyidm=$this->diak_model->osztaly($userid);
			$targyak=$this->diak_model->mindentargy($osztalyidm[0]['osztalyid']);		
			$jegyek=$this->diak_model->jegyektabla($userid);		
			$jegyektargyak=['targyak'=>$targyak,'jegyek'=>$jegyek];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('diak/osztalyozastablazat',$jegyektargyak);
		}
		else
		{//Időrendben jelenik  meg!
			$jegyektargyak=$this->diak_model->jegyekidorend($userid);
			$jegyektargyak=[
				'jegyektargyak'=>$jegyektargyak
			];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('diak/osztalyozas',$jegyektargyak);
		}
	}
	public function Nezet()
	{
		$userid=$this->session->user_id;
		$this->load->model('diak_model');
		$this->diak_model->nezet($userid);
		$this->Osztalyozas();
	}
	public function Hianyzas()
	{
		$userid = $this->session->user_id;
		$adatok=$this->Main();
		$this->load->model('diak_model');
		$datas=$this->diak_model->hianyzasok($userid);
		$napok=array('ismeretlen nap','hétfő','kedd','szerda','csütörtök','péntek','szombat','vasárnap');
		$statusz=array('ismeretlen státusz','igazolandó','igazolt','igazolatlan');
		$datas=[
		'datas'=>$datas,
		'napok'=>$napok,
		'statusz'=>$statusz];
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/hianyzasok',$datas);
	}
	public function Kozlemenyek()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/kozlemenyek');
	}

}