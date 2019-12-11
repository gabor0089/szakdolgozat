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
	public function Osztalyozas()
	{
		$this->load->model('tanar_model');
		$diakok=$this->tanar_model->mindendiak();
		$tantargyak=$this->tanar_model->tantargyak();
		foreach($diakok as $nev)
		{
			$diakoknevei[]=$nev['name'];
			$diakokid[]=$nev['userid'];
		}
		foreach($tantargyak as $targy)
		{
			$tantargyaknevei[]=$targy['nev'];
			$tantargyid[]=$targy['tantargyid'];
		}
		$data=[
			'diakok' => $diakoknevei,
			'tantargyak' => $tantargyaknevei
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyozas',$data);
	}
	public function Hianyzas()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/hianyzasok');
	}
	public function Kozlemenyek()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/kozlemenyek');
	}
	public function Ujjegyadas()
	{
		$this->load->model('tanar_model');
		$diak=$this->input->post('diaknev');
		$tantargy=$this->input->post('tantargy');
		echo $tantargy;
		$diakid    =$this->tanar_model->diakid($diak);
		$tantargyid=$this->tanar_model->tantargyid($tantargy);
		$jegy=$this->input->post('jegy');
		$tanarid = $this->session->user_id;
		$this->tanar_model->Ujjegy($tanarid,$diakid['userid'],$tantargyid['tantargyid'],$jegy);
		$this->Osztalyozas();

		
	}
}