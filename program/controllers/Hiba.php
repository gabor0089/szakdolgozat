<?PHP

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
		$userid = $this->session->user_id;
	}
	public function Nincs()
	{
		echo 'Ez az oldal nem létezik';
	}

}