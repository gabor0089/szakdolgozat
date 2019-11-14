<?PHP
class Users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($username,$password)
	{
		$this->db->where('username',$username);
		$password=md5($password);
		$this->db->where('password',$password);
		$result=$this->db->get('login');
		
		if($result->num_rows()==1)
		{
			return $result->row(0)->userid;
		}
		else
		{
			return false;
		}
	}
	public function get_userdata($userid)
	{
		$query=$this->db->get_where('users',['userid'=>$userid]);
		$result_array=$query->result_array();
		return $result_array;
	}
	public function iskolanev()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
}

?>