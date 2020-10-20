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
	public function Tanaraim($osztalyid)
	{
		$query=$this->db->query("SELECT distinct(name),userid,tel,irsz,lakcim,foto_link,beosztas from 
									users,tantargyak where 
									tantargyak.osztaly='$osztalyid' AND tantargyak.tanarid=users.userid
									order by name");
		$result_array=$query->result_array();
		return $result_array;
	} 

	public function Osztalyom($osztalyid)
	{
		$query=$this->db->query("SELECT distinct(name),userid,dob,tel,irsz,lakcim,foto_link from 
									users where 
									users.osztalyid='$osztalyid'
									order by name");
		$result_array=$query->result_array();
		return $result_array;
	} 

	public function Orarend($id)
	{
		$query=$this->db->query('SELECT 
								datum,hanyadik_ora,milyennap,
								users.name as tanarnev,
								tantargyak.nev as tantargy,
								termek.nev as terem 
							from orarend 
							left join users on users.userid=orarend.tanarid 
							left join tantargyak on tantargyak.tantargyid=orarend.tantargyid
							left join termek on termek.teremid=orarend.teremid
							where orarend.osztalyid='.$id.' order by milyennap,hanyadik_ora');

		$result_array=$query->result_array();
		return $result_array;
	}
	public function jegy_set($userid)
	{
		$query=$this->db->query("SELECT value from users_sets where userid='$userid' AND set_name='jegyek'");
		return $query->result_array();
	}
	public function Jegyekidorend($userid,$ev)
	{
		$ev2=$ev+1;
		$query=$this->db->query("SELECT tantargyak.nev as tantargynev,jegyek.jegy as jegy,jegyek.idopont as idopont,jegyek.megjegyzes as megjegyzes,users.name as tanar 
							from tantargyak right join jegyek on tantargyak.tantargyid=jegyek.tantargyid 
							join users on users.userid=jegyek.kiadta  
							where jegyek.kikapta='$userid' AND jegyek.idopont between '$ev-09-01' AND '$ev2-09-01' 
							order by idopont desc");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Jegyektabla($userid,$ev)
	{
		$ev2=$ev+1;
		$query=$this->db->query("SELECT jegy,tantargyid,megjegyzes,idopont from jegyek 
							where kikapta='$userid' AND jegyek.idopont between '$ev-09-01' AND '$ev2-09-01'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function Mindentargy($osztalyid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as tantargynev,tantargyak.tantargyid as tid from tantargyak
								where osztaly=$osztalyid 
								order by fontossag");
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