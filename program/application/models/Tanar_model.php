<?PHP
class tanar_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Orarend($id)
	{
		$query=$this->db->query('SELECT datum,hanyadik_ora,milyennap,orarend.osztalyid as osztalyid,osztalyok.osztalynev as osztaly,orarend.tantargyid as tantargyid,tantargyak.nev as tantargy,orarend.teremid as terem 
							from orarend left join osztalyok on orarend.osztalyid=osztalyok.osztalyid 
										 join tantargyak on tantargyak.tantargyid=orarend.tantargyid
							where orarend.tanarid='.$id.' order by milyennap,hanyadik_ora');
		$result_array=$query->result_array();
		return $result_array;
	} 
	public function diakid($diak)
	{
		$query=$this->db->query("SELECT userid from users where name='$diak'");
		$diakid=$query->row_array();
		return $diakid;
	}
	public function tantargyid($tantargy,$osztaly)
	{
		$query=$this->db->query("SELECT tantargyid from tantargyak where nev='$tantargy' AND osztaly='$osztaly'");
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

	public function ujjegy($tanar,$diakid,$tantargy,$jegy,$megjegyzes)
	{
		$data = array(
				'kikapta' => $diakid,
				'kiadta' => $tanar,
				'jegy' => $jegy,
				'tantargyid' => $tantargy,
				'jeloles' => '3',
				'megjegyzes' => $megjegyzes,
				'dolgid' => rand(0,999),
                'dolgfajlid' => rand(0,9999),
				); 		
			$this->db->insert('jegyek', $data);
		return true;
	}
	public function ujhianyzasfelvitel($tanarid,$diakid,$ora,$perc,$hianyzas_datum)
	{
		$datum=date("Y-m-d H:i:s",time());
		$data = array(
				'tanarid'=>$tanarid,
				'diakid' => $diakid,
				'ora'=>$ora,
				'perc'=>$perc,
				'rogz_datum'=>$datum,
				'hianyzas_datum' => $hianyzas_datum,
				'statusz' => 1,
				); 		
			$this->db->insert('hianyzasok', $data);
		return true;

	}
	public function mindendiak()
	{
		$query = $this->db->get_where('users', array('beosztas' => 4));
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function tantargyak()
	{
		$query=$this->db->get('tantargyak');
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function tanitotttargyak($userid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as nev, osztalyok.osztalynev as osztalynev,tantargyak.tantargyid from 
									tantargyak,osztalyok where
									tantargyak.osztaly=osztalyok.osztalyid AND
									tantargyak.tanarid=$userid");
		return $query->result_array();
	}
	public function haladasinaplo($targyid)
	{
		$query=$this->db->query("SELECT
									haladasi_naplo.id as id,
									osztalyok.osztalynev as osztalynev,
									tantargyak.nev as tantargynev,
									tantargyak.tantargyid as tantargyid,
									haladasi_naplo.datum as datum,
									haladasi_naplo.hanyadik_ora as hanyadik_ora,
									haladasi_naplo.tevekenyseg as tevekenyseg 
								from
									osztalyok,tantargyak,haladasi_naplo
								where
									haladasi_naplo.tantargyid=$targyid AND
									haladasi_naplo.osztalyid=osztalyok.osztalyid AND
									haladasi_naplo.tantargyid=tantargyak.tantargyid");
		return $query->result_array();	
	}
	public function haladasinaplokesz($naploid,$tev)
	{
		$this->db->set('tevekenyseg',$tev);
		$this->db->where('id',$naploid);
		$this->db->update('haladasi_naplo');
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
	public function jegyek($diakid,$tantargyid)
	{
		$this->db->order_by('idopont','DESC');
		$query=$this->db->get_where('jegyek',array('kikapta'=>$diakid,'tantargyid'=>$tantargyid));
		return $query->result_array();
	}

}
?>