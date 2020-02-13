<?PHP
class Users extends CI_Controller
{
	public function index()
	{

	}
	public function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			/*
			$this->load->library('email');
			$config=array(
				'mailtype'=>"html",
				'protocol'=>'smtp',
				'smtp_host'=>'mail.atw.hu',
				'smtp_user'=>'regabi.atw.hu',
				'smtp_pass'=>'Secret2018regabi!',
				'smtp_port'=>587
				);
			$this->email->initialize($config);
			$this->email->from('renyhart.gabor@gmail.com', 'Gábortól');
			$this->email->to('renyhart.gabor@gmail.com');
			
			$this->email->subject('TesztEmail');
			$this->email->message('Ez az üzenet.');

			if($this->email->send())
				{
					echo "üzenet elküldve";
				}
			else
				{
					echo $this->email->print_debugger();
				}
			*/
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$this->load->model('users_model');
			$userid=$this->users_model->login($username,$password);
		
			if($userid)
			{
				$user_data=
				[
					'user_id'=>$userid,
					'logged_in'=>true
				];
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin','Sikeresen bejelentkeztél!');

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
				$adatok=
				[
					'headerlink'=>$headerlink,
					'userid'=>$items[0]['userid'],
					'name'=>$items[0]['name'],
					'beosztas'=>$beosztasnev,
					'iskolanev'=>$iskolanev
				];
				if($headerlink=='header/szulo')
				{
					$szuloid = $this->session->user_id;
					$this->load->model('szulo_model');
					$gyerek=$this->szulo_model->aktualgyerek($szuloid);
				
					$adatok2=['aktgyerek'=>$gyerek];
					$adatok=array_merge($adatok,$adatok2);
				}
				$this->load->view($adatok['headerlink'],$adatok);
			}
			else
			{
				$this->session->set_flashdata('login_failed','Login is invalid');
			}
		}
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
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('users/alapadatok',$adatok2);
	}
	public function Csengrend()
	{
		$this->load->model('users_model');
		$datas=$this->users_model->csengrend();
		$adatok2=[
		'datas'=>$datas
		];	
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('users/csengrend',$adatok2);
	}

		public function Uzenetek()
	{
		$userid = $this->session->user_id;
		$this->load->model('users_model');
		$uzenetek=$this->users_model->Uzenetek($userid);
		$data=['uzenetek'=>$uzenetek,'userid'=>$userid];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('users/uzenetek',$data);
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
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('users/uzenet',$data);
		
	}
	public function Ujuzenet($partnerid=null)
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);

		$this->load->view('users/ujuzenet');
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
		redirect('Users/uzenetek');
	}

	public function Kilepes()
	{
		$this->session->sess_destroy();
		redirect('../Users/login');
	}
} 