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
	public function get_mainpage($userid)
	{
		$query=$this->db->query("SELECT value from users_sets where userid='$userid' AND set_name='default'	");
		$result_array=$query->result_array();
		return $result_array;
	}

	public function defaultfelulet($userid)
	{
		$query=$this->db->get_where('users_sets',['userid'=>$userid,'set_name'=>'default']);
		return $query->result_array();
	}
	public function iskolanev()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
	public function csengrend()
	{
		$query=$this->db->get('csengetesirend');
		$result_array=$query->result_array();
		return $result_array;
	}
	public function uzenetek($userid)
	{
		$query=$this->db->query("SELECT t.felado, t.cimzett,t1.name as feladonev, t2.name as cimzettnev,csoport,datum,uzenet
									FROM uzenetek t
									JOIN users t1 ON t1.userid = t.felado
									JOIN users t2 ON t2.userid = t.cimzett
									WHERE
									t.uzenetid in(SELECT max(uzenetid) from uzenetek u
										join users t1 on t1.userid=u.felado
										join users t2 on t2.userid=u.cimzett
										where u.cimzett='$userid' or u. felado='$userid'
										group by u.csoport) order by datum desc");
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function usernev($partner)
	{
		$query=$this->db->get_where('users',['userid'=>$partner]);
		return $query->result_array();
	}
	public function egyuzi($csoport,$userid)
	{
		$query=$this->db->query("SELECT t.felado, t.cimzett,t1.name as feladonev, t2.name as cimzettnev,csoport,datum,uzenet
									FROM uzenetek t
									JOIN users t1 ON t1.userid = t.felado
									JOIN users t2 ON t2.userid = t.cimzett
									WHERE
									(t.felado=$userid OR
									t.cimzett=$userid) AND
									csoport='$csoport' ORDER BY datum DESC");
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function ujuzenet($felado,$cimzett,$szoveg,$datum,$csoport)
	{
		$data=array(
			'felado'=>$felado,
			'cimzett'=>$cimzett,
			'csoport'=>$csoport,
			'datum'=>$datum,
			'uzenet'=>$szoveg,
			'statusz'=>1
			);
		$this->db->insert('uzenetek', $data);
	}
	public function useradatok($userid)
	{
		$query=$this->db->get_where('users',array('userid'=>$userid));
		return $query->result_array();
	}
	public function profilmod($userid,$nev,$email,$irsz,$lakcim,$tel)
	{
		$data=array(
			'name'=>$nev,
			'email'=>$email,
			'irsz'=>$irsz,
			'lakcim'=>$lakcim,
			'tel'=>$tel);
		$this->db->where('userid',$userid);
		$this->db->update('users',$data);
	}
	public function jelszomod($userid,$jelszo)
	{
		$enc_password=md5($jelszo);
		$data=array(
			'password'=>$enc_password);
		$this->db->where('userid',$userid);
		$this->db->update('login',$data);
	}
	public function feluletmod($userid,$felulet)
	{
		$data=array(
			'value'=>$felulet);
		$this->db->where('userid',$userid);
		$this->db->where('set_name','default');
		$this->db->update('users_sets',$data);
	}
}

?>