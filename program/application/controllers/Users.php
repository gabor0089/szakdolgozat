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
///////////////

		$this->load->model('users_model');
		$userid = $this->session->user_id;
		$iskolanev=$this->users_model->iskolanev();
		$iskolanev=$iskolanev[0]['iskolanev'];
		$items=$this->users_model->get_userdata($userid);
		$adatok=[
		'user'=>$items,
		'iskola'=>$iskolanev
		];
		$this->load->view('belepve',$adatok);
			
				/////////////


			}
			else
			{
				$this->session->set_flashdata('login_failed','Login is invalid');
			}

		}
	}
} 