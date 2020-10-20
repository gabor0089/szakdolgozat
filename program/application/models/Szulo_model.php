<?PHP
class szulo_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Gyermeklista($szuloid)
	{
		$query=$this->db->query("SELECT gyermekid,users.name as gyermeknev from szulogyermek,users where users.userid=szulogyermek.gyermekid AND 
			szuloid='$szuloid'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Chdchng($szuloid,$gyerekid)
	{
		$data=array('hasznalt'=>0);
		$this->db->where('szuloid', $szuloid);
		$this->db->update('szulogyermek', $data);	
		$data=array('hasznalt'=>$gyerekid);
		$this->db->where('szuloid', $szuloid);
		$this->db->where('gyermekid', $gyerekid);
		$this->db->update('szulogyermek', $data);
	}
	public function Aktualgyerek($szuloid)
	{
		$query=$this->db->query("SELECT gyermekid,users.osztalyid as osztalyid,users.name as gyermeknev from szulogyermek,users where users.userid=szulogyermek.gyermekid AND 
			szuloid='$szuloid' AND hasznalt<>'0'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function jegy_set($userid)
	{
		$query=$this->db->query("SELECT value from users_sets where userid='$userid' AND set_name='jegyek'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Nezet($userid)
	{
		$this->db->where('userid', $userid);
		$this->db->set('value', 'value*-1', FALSE);
		$this->db->update('users_sets');
	}
	public function alapadatok()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
}
?>