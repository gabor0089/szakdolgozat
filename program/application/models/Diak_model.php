<?PHP
class diak_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function Osztaly($userid)
	{
		$query=$this->db->query("SELECT osztalyid from users where userid='$userid'");
		$result_array=$query->result_array();
		return $result_array;
	} 

	public function Orarend($id)
	{
		$query=$this->db->query('SELECT datum,hanyadik_ora,milyennap,users.name as tanarnev,tantargyak.nev as tantargy,orarend.teremid as terem 
							from orarend left join users on users.userid=orarend.tanarid 
										 join tantargyak on tantargyak.tantargyid=orarend.tantargyid
							where orarend.osztalyid='.$id.' order by milyennap,hanyadik_ora');
		$result_array=$query->result_array();
		return $result_array;
	} 
}
?>