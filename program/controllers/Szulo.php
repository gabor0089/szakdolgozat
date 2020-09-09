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
		$this->load->model('szulo_model');
		$userid = $this->session->user_id;
		$osztaly=$this->szulo_model->aktualgyerek($userid);
		$orarend=$this->diak_model->orarend($osztaly[0]['osztalyid']);
		$orarend2=[
		'orarend'=>$orarend,
		];
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/orarend',$orarend2);
	}
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$this->load->model('diak_model');
		$userid = $this->session->user_id;
		$this->load->model('szulo_model');
		$osztaly=$this->szulo_model->aktualgyerek($userid);
		$orarend=$this->diak_model->orarend($osztaly[0]['osztalyid']);
		$orarend2=[
		'orarend'=>$orarend,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('szulo/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
	}
///////////////////////////////////////////////////////////////////////////
	
////////////////////////////////////////////////////////////////////////////
	public function Osztalyozas()
	{
		$userid = $this->session->user_id;
		$this->load->model('szulo_model');
		$this->load->model('diak_model');
		$set=$this->szulo_model->jegy_set($userid);
		$aktualgyerek=$this->szulo_model->aktualgyerek($userid);
		if($set[0]['value']<0)//Táblázatosan jelenjenek meg!!!
		{
			$osztalyidm=$this->diak_model->osztaly($aktualgyerek[0]['gyermekid']);
			$targyak=$this->diak_model->mindentargy($osztalyidm[0]['osztalyid']);		
			$jegyek=$this->diak_model->jegyektabla($aktualgyerek[0]['gyermekid']);		
			$jegyektargyak=['targyak'=>$targyak,'jegyek'=>$jegyek];
			$adatok=$this->Main();
			$gyermeklista=$this->Gyermeklista();
			$adatok=array_merge($adatok,$gyermeklista);
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('szulo/osztalyozastablazat',$jegyektargyak);
		}
		else
		{//Időrendben jelenik  meg!
			$jegyektargyak=$this->diak_model->jegyekidorend($aktualgyerek[0]['gyermekid']);
			$jegyektargyak=[
				'jegyektargyak'=>$jegyektargyak
			];
			$adatok=$this->Main();
			$gyermeklista=$this->Gyermeklista();
			$adatok=array_merge($adatok,$gyermeklista);
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('szulo/osztalyozas',$jegyektargyak);
		}
	}
	public function Nezet()
	{
		$userid=$this->session->user_id;
		$this->load->model('diak_model');
		$this->diak_model->nezet($userid);
		$this->Osztalyozas();
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////

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
		$userid = $this->session->user_id;
		$adatok=$this->Main();
		$this->load->model('szulo_model');
		$aktualgyerek=$this->szulo_model->aktualgyerek($userid);
		$this->load->model('diak_model');
		$datas=$this->diak_model->hianyzasok($aktualgyerek[0]['gyermekid']);
		$napok=array('ismeretlen nap','hétfő','kedd','szerda','csütörtök','péntek','szombat','vasárnap');
		$statusz=array('ismeretlen státusz','igazolandó','igazolt','igazolatlan');
		$datas=[
		'datas'=>$datas,
		'napok'=>$napok,
		'statusz'=>$statusz];

		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);

		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/hianyzasok',$datas);

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
	public function Uzenetek()
	{
		$userid = $this->session->user_id;
		$this->load->model('users_model');
		$uzenetek=$this->users_model->Uzenetek($userid);
		$data=['uzenetek'=>$uzenetek,'userid'=>$userid];
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
			
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/uzenetek',$data);
	}
	public function egyuzenet($csoport,$userid)
	{
		$this->load->model('users_model');
		$partnerek=explode('-',$csoport);
		if($partnerek[0]==$userid)
		{
			$partner=$partnerek[1];
		}
		else
		{
			$partner=$partnerek[0];	
		}
		$usernev=$this->users_model->usernev($partner);
		$egyuzi=$this->users_model->egyuzi($csoport,$userid);

		$data=['uzenetek'=>$egyuzi,
			   'partner'=>$usernev[0]['name'],
			   'partnerid'=>$partner];
		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Szulo/uzenet',$data);
		
	}
	public function Ujuzenet($partnerid=null)
	{
		$userid = $this->session->user_id;
		$this->load->model('users_model');
		$partnernev=$this->users_model->usernev($partnerid);
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$data=['partner'=>$partnerid,
				'userid'=>$userid,
				'partnernev'=>$partnernev[0]['name']];
		$this->load->view('users/ujuzenet',$data);
	}
	public function Ujuzenetkuldes()
	{
		$felado=$this->input->post('felado');
		$cimzett=$this->input->post('cimzett');
		$szoveg=$this->input->post('uzenetszoveg');
		$datum=date("Y-m-d H:i:s",time());
		$csoport=$felado."-".$cimzett;
		if($felado>$cimzett)
			$csoport=$cimzett."-".$felado;
		echo $felado." ".$cimzett." ".$szoveg." ".$datum." ".$csoport;
		$this->load->model('users_model');
		$this->users_model->ujuzenet($felado,$cimzett,$szoveg,$datum,$csoport);
		redirect('Szulo/uzenetek');
	}
	public function Tanarok()
	{
		$this->load->model('tanar_model');
		$kollegalista=$this->tanar_model->kollegalista();
		$data=['kollegak'=>$kollegalista];

		$adatok=$this->Main();
		$gyermeklista=$this->Gyermeklista();
		$adatok=array_merge($adatok,$gyermeklista);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('szulo/tanarok',$data);
	}

	
	
}