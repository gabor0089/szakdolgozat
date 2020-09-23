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
	public function tantargyideredeti($tantargy,$osztaly)
	{
		$query=$this->db->query("SELECT tantargyid from tantargyak where nev='$tantargy' AND osztaly='$osztaly'");
		$tantargyid=$query->row_array();
		return $tantargyid;
	}

	public function tantargyid($tantargy,$osztaly)
	{
		$query=$this->db->query("SELECT tantargyid from 
								tantargyak,osztalyok where 
								osztalyok.osztalyid=tantargyak.osztaly AND 
								tantargyak.nev='$tantargy' AND osztalyok.osztalynev='$osztaly'");
		$tantargyid=$query->row_array();
		return $tantargyid;
	}

	public function osztalyid($osztaly)
	{
		$query=$this->db->query("SELECT osztalyid from osztalyok where osztalynev='$osztaly'");
		$osztalyid=$query->row_array();
		return $osztalyid;
	}
	public function osztalynev($osztalyid)
	{
		$query=$this->db->query("SELECT osztalynev from osztalyok where osztalyid='$osztalyid'");
		return $query->row_array();
	}

	public function tantargynev($tantargyid)
	{
		$query=$this->db->query("SELECT tantargyak.nev,osztalyok.osztalynev from 
				tantargyak,osztalyok where 
					osztalyok.osztalyid=tantargyak.osztaly AND tantargyid='$tantargyid'");
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
	public function diakdolgozatfeltoltes($diakid,$filehelye,$dolgazon)
	{
		$data=['diakid'=>$diakid,'filehelye'=>$filehelye,'dolg_azon'=>$dolgazon];
		$this->db->insert('diak_dolgozatok',$data);
	}
	public function utolsodolgozatazon()
	{
		$query=$this->db->query("SELECT azon from diak_dolgozatok order by azon desc limit 1");
		return $query->result_array();
	}
	public function ujjegy($tanar,$diakid,$tantargy,$jegy,$megjegyzes,$dolgozatid,$diakdolgid)
	{
		$data = array(
				'kikapta' => $diakid,
				'kiadta' => $tanar,
				'jegy' => $jegy,
				'tantargyid' => $tantargy,
				'jeloles' => '3',
				'megjegyzes' => $megjegyzes,
				'dolgid' => $dolgozatid,
                'dolgfajlid' => $diakdolgid,
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

	public function mindensajatdiak($tanarid,$kapottnev)
	{
		$query = $this->db->query("SELECT name,userid from users,tantargyak where 
									tantargyak.osztaly=users.osztalyid AND 
									tantargyak.tanarid='$tanarid' AND
									users.name like '%$kapottnev%' group by userid
									order by name");
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function kozostargyak($userid,$diakid)
	{
		$query=$this->db->query("SELECT nev,tantargyid from 
								tantargyak,users where 
								tantargyak.tanarid='$userid' AND
								users.userid='$diakid' AND
								tantargyak.osztaly=users.osztalyid");
		return $query->result_array();
	}
	public function tantargyak()
	{
		$query=$this->db->get('tantargyak');
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function sajattantargyak($userid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as tantargy, 
										osztalyok.osztalynev as osztaly
										from tantargyak,osztalyok
										where tantargyak.tanarid='$userid' AND
										tantargyak.osztaly=osztalyok.osztalyid");
		$result_array=$query->result_array();
		return $result_array;	
	}
	public function tanitotttargyak($userid)
	{
		$query=$this->db->query("SELECT tantargyak.nev as nev, osztalyok.osztalynev as osztalynev,tantargyak.tantargyid from 
									tantargyak,osztalyok where
									tantargyak.osztaly=osztalyok.osztalyid AND
									tantargyak.tanarid=$userid ORDER BY nev asc,length(osztalynev) asc,osztalynev asc");
		return $query->result_array();
	}
	public function tanitotttargyakosztalyban($userid,$osztalyid)
	{
		$query=$this->db->query("SELECT nev,tantargyid from 
									tantargyak where
									tantargyak.tanarid='$userid' AND
									tantargyak.osztaly='$osztalyid'");
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
		$query=$this->db->query("SELECT osztalyok.osztalynev as osztaly,osztalyok.osztalyid as osztalyid from 
									osztalyok,tantargyak where 
									osztalyok.osztalyid=tantargyak.osztaly AND 
									tantargyak.tanarid=$userid group by osztalyid");
		return $query->result_array();
	}	
	public function osztalynevsor($osztalyid)
	{
		$query0=$this->db->query("SELECT gy.userid,gy.name,gy.dob,gy.taj,gy.szulhely,gy.tel,gy.irsz,gy.email,gy.lakcim,
				gy.foto_link,sz.name as szulonev,sz.userid as szuloid from 
					szulogyermek right join 
						users gy on(szulogyermek.gyermekid=gy.userid) left join
							users sz on(szulogyermek.szuloid=sz.userid) where gy.osztalyid=$osztalyid order by gy.name");
		return $query0->result_array();
	}

	public function jegyek($diakid,$tantargyid)
	{
		$query=$this->db->query("SELECT idopont,jegy,megjegyzes,
								feltoltott_dolgozatok.dolgozatcim as dolgozat,
								diak_dolgozatok.filehelye as file 
								from jegyek left join 
								feltoltott_dolgozatok on jegyek.dolgid=feltoltott_dolgozatok.dolgozatid left join 
								diak_dolgozatok on diak_dolgozatok.diakid=jegyek.kikapta where
								jegyek.kikapta='$diakid' AND 
								jegyek.tantargyid='$tantargyid' GROUP BY
								jegyek.jegyid ORDER BY 
								idopont desc");
		return $query->result_array();
	}
	public function osztalytargyjegy($osztalyid,$tantargyid)
	{
		$query=$this->db->query("SELECT	jegyek.idopont as idopont,
										jegyek.jegy as jegy,
										jegyek.megjegyzes as megjegyzes,
										users.name as name,
										jegyek.kikapta as userid from 
										users left join jegyek on jegyek.kikapta=users.userid join 
										osztalyok on osztalyok.osztalyid=users.osztalyid join 
										tantargyak on tantargyak.tantargyid=jegyek.tantargyid AND
										jegyek.tantargyid='$tantargyid' AND
										osztalyok.osztalyid='$osztalyid'
										");
		return $query->result_array();
	}
	public function dolgozatlista($userid)
	{
		$query=$this->db->query("SELECT 
								tantargyak.nev as tantargynev,
								feltoltott_dolgozatok.datum as datum,
								feltoltott_dolgozatok.dolgozatid as dolgozatid,
								feltoltott_dolgozatok.dolgozatcim as dolgozatcim from 
								tantargyak,feltoltott_dolgozatok where
								feltoltott_dolgozatok.tanarid='$userid' AND
								feltoltott_dolgozatok.tantargyid=tantargyak.tantargyid");
		return $query->result_array();
	}
	public function dolgozatlista1tantargy($userid,$tantargyid)
	{
		$query=$this->db->query("SELECT 
								feltoltott_dolgozatok.dolgozatid as dolgozatid,
								feltoltott_dolgozatok.dolgozatcim as dolgozatcim from 
								tantargyak,feltoltott_dolgozatok where
								feltoltott_dolgozatok.tanarid='$userid' AND
								feltoltott_dolgozatok.tantargyid='$tantargyid' AND
								feltoltott_dolgozatok.tantargyid=tantargyak.tantargyid");
		return $query->result_array();
	}
	public function ujdolgozat($tantargyid,$datum,$dolgozatcim,$userid)
	{
		$data=['tantargyid'=>$tantargyid,
				'datum'=>$datum,
				'tanarid'=>$userid,
				'dolgozatcim'=>$dolgozatcim];
		$this->db->insert('feltoltott_dolgozatok',$data);
	}
	public function dolgozatok($tanarid,$tantargyid)
	{
		$datum=date("Y-m-d H:i:s",time());
		$query=$this->db->get_where('feltoltott_dolgozatok',array('tantargyid'=>$tantargyid,'tanarid'=>$tanarid,'datum<'=>$datum));
		return $query->result_array();
	}
	public function evvegijegyek($tantargyid,$osztalyid)
	{
		$query=$this->db->query("SELECT users.name,users.userid,jegyek_evvegi.jegy,jegyek_evvegi.tantargyid from 
			users left join jegyek_evvegi on users.userid=jegyek_evvegi.userid where 
    			users.osztalyid=$osztalyid AND (jegyek_evvegi.tantargyid=$tantargyid OR jegyek_evvegi.tantargyid IS NULL) order by name");
		return $query->result_array();
	}

	public function evvegijegy($tantargyid,$jegy,$datum,$diakid)
	{
		$data=[
			'tantargyid'=>$tantargyid,
			'jegy'=>$jegy,
			'datum'=>$datum,
			'userid'=>$diakid
		];
		$this->db->insert('jegyek_evvegi',$data);			
	}

}
?>