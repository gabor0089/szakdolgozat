<?PHP

class Szulo extends CI_Controller
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
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/orarend',$orarend2);
	}
	public function Osztalyozas()
	{
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/osztalyozas');
	}

	public function Gyermeklista()
	{
		$szuloid = $this->session->user_id;
		$this->load->model('szulo_model');
		$gyerek=$this->szulo_model->aktualgyerek($szuloid);		
		return $adatok2=['aktgyerek'=>$gyerek];
	}

	public function Mindengyerek()
	{
		$szuloid = $this->session->user_id;
		$this->load->model('szulo_model');
		$gyerekek=$this->szulo_model->gyermeklista($szuloid);
		return $adatok2=['mindengyerek'=>$gyerekek];
	}

	public function Hianyzas()
	{
		$adatok=$this->Main();
		////
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		////
		//var_dump($adatok);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/hianyzasok');

	}
	public function Kozlemenyek()
	{
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/kozlemenyek');
	}
	public function Alapadatok()
		{
		////////////////////////////////////////////////////////////////////
		$this->load->model('admin_model');
		$datas=$this->admin_model->alapadatok();
		$adatok2=
		[
			'isnev'=>$datas[0]['iskolanev'],
			'ignev'=>$datas[0]['igazgatonev'],
			'cim'=>$datas[0]['iskolacim'],
			'ev'=>$datas[0]['ev']
		];
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/alapadatok',$adatok2);
	}

	public function Csengrend()
	{
		$this->load->model('users_model');
		$datas=$this->users_model->csengrend();
		$adatok2=[
		'datas'=>$datas
		];	
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/csengrend',$adatok2);
	}
	public function Gyerekvaltas()
	{
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$mindengyerek=$this->Mindengyerek();
		$this->load->view('szulo/gyerekvalasztas',$mindengyerek);
		
	}

	public function Chdchng()
	{
		$this->form_validation->set_rules('gyerek','Gyerek','required');
		if($this->form_validation->run()===FALSE)
		{
			$adatok=$this->Main();
			$gyermeklista=$this->Gyermeklista();
			$adatok=array_merge($adatok,$gyermeklista);
			$this->load->view($adatok['headerlink'],$adatok);
			$mindengyerek=$this->Mindengyerek();
			$this->load->view('szulo/gyerekvalasztas',$mindengyerek);
		}
		else
		{
			$uj_akt_gyerek=$this->input->post('gyerek');
			//echo $uj_akt_gyerek;
			$szuloid = $this->session->user_id;
			$this->load->model('szulo_model');
			$datas=$this->szulo_model->Chdchng($szuloid,$uj_akt_gyerek);
			$adatok=$this->Main();
			$gyermeklista=$this->Gyermeklista();
			$adatok=array_merge($adatok,$gyermeklista);
			$this->load->view($adatok['headerlink'],$adatok);
			$mindengyerek=$this->Mindengyerek();
			$this->load->view('szulo/gyerekvalasztas',$mindengyerek);

		}
	}
	
	
}