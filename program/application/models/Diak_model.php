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

	public function Orarend($osztalyid)
	{
		$query=$this->db->query("SELECT datum,hanyadik_ora,users.name as tanarnev,tantargyak.nev as tantargy,orarend.teremid as terem 
							from orarend left join osztalyok on orarend.osztalyid=osztalyok.osztalyid 
										 join tantargyak on tantargyak.tantargyid=orarend.tantargyid
										 join users on users.userid=orarend.tanarid
							where orarend.osztalyid='$osztalyid' order by hanyadik_ora,datum");
		$result_array=$query->result_array();
		return $result_array;
	} 
}
?>