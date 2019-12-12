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
	public function Orarend()
	{
		$this->load->model('diak_model');
		$userid = $this->session->user_id;
		$orarend=$this->diak_model->orarend(1);
		$orarend2=[
		'orarend'=>$orarend,
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/orarend',$orarend2);
	}

	public function Osztalyozas()
	{
		$userid = $this->session->user_id;
		$this->load->model('diak_model');
		$set=$this->diak_model->jegy_set($userid);
		if($set[0]['value']<0)//Táblázatosan jelenjenek meg!!!
		{
			$targyak=$this->diak_model->mindentargy($userid);
			$jegyektargyak=array();
			foreach ($targyak as $t)
			{
				$jegyektargyak[]=$t['tantargynev'];
				$jegyektargyak[]=$jegyek=$this->diak_model->jegyektabla($userid,$t['tid']);
			}
			$jegyektargyak=['jegyektargyak'=>$jegyektargyak];
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
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/hianyzasok');
	}
	public function Kozlemenyek()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('diak/kozlemenyek');
	}
}