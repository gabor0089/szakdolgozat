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
	public function jegy_set($userid)
	{
		$query=$this->db->query("SELECT value from users_sets where userid='$userid' AND set_name='jegyek'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Jegyekidorend($userid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as tantargynev,jegyek.jegy as jegy,jegyek.idopont as idopont,jegyek.megjegyzes as megjegyzes,users.name as tanar 
							from tantargyak right join jegyek on tantargyak.tantargyid=jegyek.tantargyid 
							join users on users.userid=jegyek.kiadta  
							where jegyek.kikapta='$userid' AND tantargyak.megjegyzes like '1,%' order by idopont desc");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Jegyektabla($userid,$tid)
	{
		$query=$this->db->query("SELECT jegyek.jegy as jegy 
							from tantargyak left join jegyek on tantargyak.tantargyid=jegyek.tantargyid 
							where tantargyak.megjegyzes like '1,%' AND tantargyak.tantargyid='$tid' AND kikapta='$userid'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Mindentargy($userid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as tantargynev,tantargyak.tantargyid as tid from tantargyak 
								where tantargyak.megjegyzes like '1,%' order by tantargyid");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Nezet($userid)
	{
		$this->db->where('userid', $userid);
		$this->db->set('value', 'value*-1', FALSE);
		$this->db->update('users_sets');
		return true;
	}
	public function Hianyzasok($userid)
	{
		$query = $this->db->query("SELECT hianyzas_datum, ora, perc,users.name as tanarnev,statusz 
									from hianyzasok left join users on users.userid=hianyzasok.tanarid 
									where diakid='$userid' order by hianyzas_datum desc");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function alapadatok()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
}
?>