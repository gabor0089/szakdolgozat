<?PHP
class osztalyfonok_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Orarend($osztalyid)
	{	
		$query=$this->db->query('SELECT datum,hanyadik_ora,milyennap,users.name as tanarnev,tantargyak.nev as tantargy,orarend.teremid as terem 
							from orarend left join users on users.userid=orarend.tanarid 
										 join tantargyak on tantargyak.tantargyid=orarend.tantargyid
							where orarend.osztalyid='.$osztalyid.' order by milyennap,hanyadik_ora');
		$result_array=$query->result_array();
		return $result_array;
	} 
	public function diakid($diak)
	{
		$query=$this->db->query("SELECT userid from users where name='$diak'");
		$diakid=$query->row_array();
		return $diakid;
	}
	public function tantargyid($tantargy)
	{
		$query=$this->db->query("SELECT tantargyid from tantargyak where nev='$tantargy'");
		$tantargyid=$query->row_array();
		return $tantargyid;
	}
	public function osztalyid($osztaly)
	{
		$query=$this->db->query("SELECT osztalyid from osztalyok where osztalynev='$osztaly'");
		$osztalyid=$query->row_array();
		return $osztalyid;
	}
	public function tantargynev($tantargyid)
	{
		$query=$this->db->query("SELECT nev from tantargyak where tantargyid='$tantargyid'");
		$tantargynev=$query->row_array();
		return $tantargynev;
	}
	public function diaknev($diakid)
	{
		$query=$this->db->query("SELECT name from users where userid='$diakid'");
		$diaknev=$query->row_array();
		return $diaknev;
	}
	public function nevsor($osztalyid)
	{
		$query=$this->db->query("SELECT name, userid from users where osztalyid='$osztalyid' order by name");
		$nevsor=$query->result_array();
		return $nevsor;
	}

	public function mindendiak()
	{
		$query = $this->db->get_where('users', array('beosztas' => 4));
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function tantargyak($osztalyomid)
	{
		$this->db->order_by('tantargyid','ASC');
		$query=$this->db->get_where('tantargyak',array('osztaly'=>$osztalyomid));
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function alapadatok()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
	public function kollegalista()
	{
		$this->db->order_by('name','ASC');
		$query=$this->db->get_where('users',array('beosztas'=>3));
		return $query->result_array();
	}
	public function osztalylista($userid)
	{
		$query=$this->db->query("SELECT osztalyok.osztalynev,osztalyok.osztalyid from 
									osztalyok,haladasi_naplo where 
									osztalyok.osztalyid=haladasi_naplo.osztalyid AND 
									haladasi_naplo.tanarid=$userid group by osztalynev");
		return $query->result_array();
	}	
	public function osztalynevsor($osztalyid)
	{
		$this->db->order_by('name','ASC');
		$query=$this->db->get_where('users',array('osztalyid'=>$osztalyid));
		return $query->result_array();
	}
	public function jegyek($tantargyid)
	{
		$this->db->order_by('idopont','ASC');
		$query=$this->db->get_where('jegyek',array('tantargyid'=>$tantargyid));
		return $query->result_array();
	}
	public function osztalyom($userid)
	{
		$query=$this->db->get_where('osztalyok',array('ofo'=>$userid));
		return $query->result_array();
	}
	public function hianyzasok()
	{
		$query=$this->db->query("SELECT * from hianyzasok");
		return $query->result_array();
	}
	public function hianyzas($userid)
	{
		$query=$this->db->query("SELECT  hianyzasid,hianyzas_datum,diakid,ora,perc,statusz,tipus,megjegyzes, 
								users.name as nev from 
								hianyzasok,users 
								where hianyzasok.tanarid=users.userid AND 
								diakid='$userid' order by 
								hianyzas_datum asc");
		return $query->result_array();
	}
	public function hianyzas_mod($hianyzasid,$tipus,$megjegyzes,$statusz)
	{
		$query=$this->db->query("UPDATE hianyzasok SET tipus='$tipus',megjegyzes='$megjegyzes',statusz='$statusz' where hianyzasid='$hianyzasid'");
		return $query;
	}
	public function erettsegikesz($userid,$magyarszint,$magyarszazalek,$matekszint,$matekszazalek,$toriszint,$toriszazalek,$idegennyelv,$nyelvszint,$nyelvszazalek,$szabval,$szabvalszint,$szabvalszazalek)
	{
		$datum=date("Y-m-d H:i:s",time());
		$data=[
			'magyarszint'=>$magyarszint,
			'magyarszazalek'=>$magyarszazalek,
			'matekszint'=>$matekszint,
			'matekszazalek'=>$matekszazalek,
			'toriszint'=>$toriszint,
			'toriszazalek'=>$toriszazalek,
			'idegennyelv'=>$idegennyelv,
			'nyelvszint'=>$nyelvszint,
			'nyelvszazalek'=>$nyelvszazalek,
			'szabval'=>$szabval,
			'szabvalszint'=>$szabvalszint,
			'szabvalszazalek'=>$szabvalszazalek,
			'userid'=>$userid,
			'datum'=>$datum
		];
		$this->db->insert('erettsegi',$data);	
	}
	public function erettsegimod($userid,$magyarszint,$magyarszazalek,$matekszint,$matekszazalek,$toriszint,$toriszazalek,$idegennyelv,$nyelvszint,$nyelvszazalek,$szabval,$szabvalszint,$szabvalszazalek)
	{
		$datum=date("Y-m-d H:i:s",time());
		$data=[
			'magyarszint'=>$magyarszint,
			'magyarszazalek'=>$magyarszazalek,
			'matekszint'=>$matekszint,
			'matekszazalek'=>$matekszazalek,
			'toriszint'=>$toriszint,
			'toriszazalek'=>$toriszazalek,
			'idegennyelv'=>$idegennyelv,
			'nyelvszint'=>$nyelvszint,
			'nyelvszazalek'=>$nyelvszazalek,
			'szabval'=>$szabval,
			'szabvalszint'=>$szabvalszint,
			'szabvalszazalek'=>$szabvalszazalek,
			'datum'=>$datum
		];
		$this->db->where('userid', $userid);
		$this->db->update('erettsegi',$data);	
	}
	public function elsodiak($userid)
	{
		$query=$this->db->query("SELECT userid,name from users,osztalyok where 
									users.osztalyid=osztalyok.osztalyid AND 
									osztalyok.ofo='$userid' order by name limit 1");
		return $query->row_array();
	}
	public function kovetkezodiak($tanarid,$diaknev)
	{
		$query=$this->db->query("SELECT userid,name from users,osztalyok where 
									users.osztalyid=osztalyok.osztalyid AND 
									osztalyok.ofo='$tanarid' AND
									name>'$diaknev'order by name limit 1");
		return $query->row_array();
	}
	public function elozodiak($tanarid,$diaknev)
	{
		$query=$this->db->query("SELECT userid,name from users,osztalyok where 
									users.osztalyid=osztalyok.osztalyid AND 
									osztalyok.ofo='$tanarid' AND
									name<'$diaknev'order by name desc limit 1");
		return $query->row_array();
	}
	public function erettsegiadatok($userid)
	{
		$query=$this->db->get_where('erettsegi',array('userid'=>$userid));
		return $query->row_array();
	}


}
?>