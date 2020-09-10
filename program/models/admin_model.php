<?PHP
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function alapadatok()
	{
		$query=$this->db->get('beallitasok');
		$result_array=$query->result_array();
		return $result_array;
	}
	public function alapadatokkesz($isnev,$ignev,$cim,$ev,$evvegedatum,$evvegeido,$erettsegidatum,$erettsegiido)
	{
		$query=$this->db->query("UPDATE beallitasok SET 
			iskolanev='$isnev',
			igazgatonev='$ignev',
			iskolacim='$cim',
			ev='$ev',
			evvegedatum='$evvegedatum',
			evvegeido='$evvegeido',
			erettsegidatum='$erettsegidatum',
			erettsegiido='$erettsegiido'
			");
		return $query;
	}
	public function csengrend()
	{
		$query=$this->db->get('csengetesirend');
		return $query->result_array();
	}
	public function csengrendkesz($k0,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,
								  $v0,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10)
	{
		$query0=$this->db->query("UPDATE csengetesirend SET kezdes='$k0',vege='$v0' where ora=0");
		$query1=$this->db->query("UPDATE csengetesirend SET kezdes='$k1',vege='$v1' where ora=1");
		$query2=$this->db->query("UPDATE csengetesirend SET kezdes='$k2',vege='$v2' where ora=2");
		$query3=$this->db->query("UPDATE csengetesirend SET kezdes='$k3',vege='$v3' where ora=3");
		$query4=$this->db->query("UPDATE csengetesirend SET kezdes='$k4',vege='$v4' where ora=4");
		$query5=$this->db->query("UPDATE csengetesirend SET kezdes='$k5',vege='$v5' where ora=5");
		$query6=$this->db->query("UPDATE csengetesirend SET kezdes='$k6',vege='$v6' where ora=6");
		$query7=$this->db->query("UPDATE csengetesirend SET kezdes='$k7',vege='$v7' where ora=7");
		$query8=$this->db->query("UPDATE csengetesirend SET kezdes='$k8',vege='$v8' where ora=8");
		$query9=$this->db->query("UPDATE csengetesirend SET kezdes='$k9',vege='$v9' where ora=9");
		$query10=$this->db->query("UPDATE csengetesirend SET kezdes='$k10',vege='$v10' where ora=10");
	}

	public function diakoklistaja($sorrend)
	{
		$query=$this->db->query('SELECT name,dob,szulhely,taj,tel,irsz,lakcim,email,osztalyok.osztalynev as osztalyid,foto_link,userid from users,osztalyok where users.osztalyid=osztalyok.osztalyid AND beosztas=4 order by '.$sorrend);
		$result_array=$query->result_array();
		return $result_array;
	}
	public function diakokadatai($userid)
	{
		$this->db->from('users');
		$this->db->where('userid',$userid);
		$query=$this->db->get();
		$result_array=$query->row_array();
		return $result_array;
	}
	public function modosit_diak($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid)
	{
		$data = array(
        'name'  => $name,
        'dob'  => $dob,
        'szulhely' => $szulhely,
        'taj' => $taj,
        'tel' => $tel,
        'irsz' => $irsz,
        'lakcim' => $lakcim,
        'email' => $email,
        'osztalyid' => $osztaly
		);
		$this->db->where('userid',$userid);
		$this->db->update('users', $data);
		return true;
	
	}
	public function tanaroklistaja($sorrend)
	{
		$this->db->from('users');
		$beosztas=array(0,1,2,3);
		$this->db->order_by($sorrend);
		$this->db->where_in('beosztas', $beosztas);
		$query=$this->db->get();
		$result_array=$query->result_array();
		return $result_array;
	}
	public function tanarokadatai($userid)
	{
		$this->db->from('users');
		$this->db->where('userid',$userid);
		$query=$this->db->get();
		$result_array=$query->row_array();
		return $result_array;
	}
	public function modosit_tanar($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid)
	{
		$data = array(
        'name'  => $name,
        'dob'  => $dob,
        'szulhely' => $szulhely,
        'taj' => $taj,
        'tel' => $tel,
        'irsz' => $irsz,
        'lakcim' => $lakcim,
        'email' => $email,
        'osztalyid' => $osztaly
		);
		$this->db->where('userid',$userid);
		$this->db->update('users', $data);
		return true;
	}
	public function beosztas($beosztas)
	{
		$this->db->from('beosztasok');
		$this->db->where('beosztasid',$beosztas);
		$query=$this->db->get();
		$result_array=$query->result_array();
		return $result_array;
	}
	public function ujtanar($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$beosztas,$filename)
	{
		$data=array(
		'name'=>$name,
		'dob'=>$dob,
		'szulhely'=>$szulhely,
		'taj'=>$taj,
		'tel'=>$tel,
		'irsz'=>$irsz,
		'lakcim'=>$lakcim,
		'foto_link'=>$filename,
		'beosztas'=>$beosztas,
		'osztalyid'=>0
		);
		$this->db->insert('users', $data);

		$ekezettel=   array('á','é','í','ó','ö','ő','ú','ü','ű','Á','É','Í','Ó','Ö','Ő','Ú','Ü','Ű',' ');
		$ekezetnelkul=array('a','e','i','o','o','o','u','u','u','a','e','i','o','o','o','u','u','u','');
		$felhasznalonev=str_replace($ekezettel,$ekezetnelkul,$name);
		$felhasznalonev=strtolower($felhasznalonev);
		$jelszo = md5($felhasznalonev);
		$data2=array(
			'username'=>$felhasznalonev,
			'password'=>$jelszo);
		$this->db->insert('login',$data2);
	}

	public function ujdiak($filename)
	{
		$data=array(
		'name'=>$this->input->post('nev'),
		'dob'=>$this->input->post('szulido'),
		'szulhely'=>$this->input->post('szulhely'),
		'taj'=>$this->input->post('taj'),
		'tel'=>$this->input->post('tel'),
		'irsz'=>$this->input->post('irsz'),
		'lakcim'=>$this->input->post('lakcim'),
		'email'=>$this->input->post('email'),
		'foto_link'=>$filename,
		'beosztas'=>4,
		'osztalyid'=>$this->input->post('osztaly')
		);
		$this->db->insert('users', $data);
		$ekezettel=   array('á','é','í','ó','ö','ő','ú','ü','ű','Á','É','Í','Ó','Ö','Ő','Ú','Ü','Ű',' ');
		$ekezetnelkul=array('a','e','i','o','o','o','u','u','u','a','e','i','o','o','o','u','u','u','');
		$felhasznalonev=str_replace($ekezettel,$ekezetnelkul,$data['name']);
		$felhasznalonev=strtolower($felhasznalonev);
		$jelszo = md5($felhasznalonev);
		$data2=array(
			'username'=>$felhasznalonev,
			'password'=>$jelszo);
		$this->db->insert('login',$data2);
		$data3=array('userid'=>9999,
						'set_name'=>'jegyek',
						'value'=>1);
		$utolsouserid=$this->db->query('SELECT userid from users order by userid desc limit 1');
		$resultarray=$utolsouserid->result_array();
		$data3=array('userid'=>$resultarray[0]['userid'],
						'set_name'=>'jegyek',
						'value'=>1);
		$this->db->insert('users_sets',$data3);
		
	}
	public function tantargyak()
	{
		$query1=$this->db->query("SELECT nev,osztaly,tantargyid from tantargyak");
		$result_array=$query1->result_array();
		return $result_array;
		
	}
	public function osztalyok()
	{	
		$query2=$this->db->query("SELECT osztalynev,osztalyid from osztalyok order by osztalyid");
		$result_array=$query2->result_array();
		return $result_array;
		
	}
	public function mindendiak()
		{
		$query0=$this->db->query("SELECT name,userid from users where beosztas=4");
		$result_array=$query0->result_array();
		return $result_array;
		}

	public function szuloklistaja()
	{
//		$query0=$this->db->query("SELECT sz.userid,sz.name,sz.dob,sz.szulhely,sz.tel,sz.irsz,sz.email,sz.lakcim,gy.userid as gyerekid from szulogyermek inner join users sz on(szulogyermek.szuloid=sz.userid) inner join users gy on(szulogyermek.gyermekid=gy.userid) group by sz.userid");
		$query0=$this->db->query("SELECT * from users where beosztas=5");
		$result_array=$query0->result_array();

		return $result_array;
	}
	public function szulokadatai($userid)
	{
		$this->db->from('users');
		$this->db->where('userid',$userid);
		$query=$this->db->get();
		$result_array=$query->row_array();
		return $result_array;
	}

	public function ujszulo()
	{
		$data=array(
		'name'=>$this->input->post('nev'),
		'dob'=>$this->input->post('szulido'),
		'szulhely'=>$this->input->post('szulhely'),
		'tel'=>$this->input->post('tel'),
		'irsz'=>$this->input->post('irsz'),
		'lakcim'=>$this->input->post('lakcim'),
		'beosztas'=>5,
		);
		$this->db->insert('users', $data);
		$ekezettel=   array('á','é','í','ó','ö','ő','ú','ü','ű','Á','É','Í','Ó','Ö','Ő','Ú','Ü','Ű',' ');
		$ekezetnelkul=array('a','e','i','o','o','o','u','u','u','a','e','i','o','o','o','u','u','u','');
		$felhasznalonev=str_replace($ekezettel,$ekezetnelkul,$data['name']);
		$felhasznalonev=strtolower($felhasznalonev);
		$jelszo = md5($felhasznalonev);
		$data2=array(
			'username'=>$data['name'],
			'password'=>$jelszo);
		$this->db->insert('login',$data2);
		$idd=$this->legutobbi_szulo();
		$gyermekid=$this->gyermekidkeres($this->input->post('diak'));
		$data3=array(
			'szuloid'=>$idd[0]['userid'],
			'gyermekid'=>$gyermekid[0]['userid']
			);
		$this->db->insert('szulogyermek',$data3);
		

	}
	public function modosit_szulo($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid)
	{
		$data = array(
        'name'  => $name,
        'dob'  => $dob,
        'szulhely' => $szulhely,
        'taj' => $taj,
        'tel' => $tel,
        'irsz' => $irsz,
        'lakcim' => $lakcim,
        'email' => $email,
        'osztalyid' => $osztaly
		);
		$this->db->where('userid',$userid);
		$this->db->update('users', $data);
		return true;
	}

	public function gyermekidkeres($nev)
	{
		$query=$this->db->query("SELECT userid from users where name='$nev'");
		$result_array=$query->result_array();
		return $result_array;
	}
	public function legutobbi_szulo()
	{
		$this->db->order_by("userid", "desc");
		$this->db->limit(1);
		$query = $this->db->get_where('users', array('beosztas' => 5));
		$result_array=$query->result_array();
		return $result_array;
	}
	public function legutobbi_tanar()
	{
		$this->db->order_by("userid", "desc");
		$this->db->limit(1);
		$query = $this->db->get_where('users', array('beosztas' => 2)); // Ez az osztályfőnököket adja csak vissza, mert ez kell az osztályhoz hozzárendeléshez.
		$result_array=$query->result_array();
		//var_dump($result_array);
		return $result_array;
	}
	public function ujofoosztaly($osztalyid,$ofoid)
	{
		$data=['ofo'=>$ofoid];
		$this->db->where('osztalyid',$osztalyid);
		$this->db->update('osztalyok',$data);
		
	}
	public function tantargyaklista($sorrend)
	{
		$query=$this->db->query("SELECT tantargyid,nev,osztaly,tanarid,
									users.name as tanarnev,
									osztalyok.osztalynev as osztalynev 
									from tantargyak,users,osztalyok 
									where users.userid=tantargyak.tanarid AND
									tantargyak.osztaly=osztalyok.osztalyid order by $sorrend");
		return $query->result_array();
	}

	public function tanarid($tanarnev)
	{
		$query=$this->db->query("SELECT userid from users where name='$tanarnev'");
		$diakid=$query->row_array();
		return $diakid;
	}

	public function Tantargyvaltozas($tantargyid,$tantargynev,$tanarid,$osztalyid)
	{
		$data=['nev'=>$tantargynev,
				'osztaly'=>$osztalyid,
				'tanarid'=>$tanarid];
		$this->db->where('tantargyid',$tantargyid);
		$this->db->update('tantargyak',$data);
	}

	public function osztalyid($osztaly)
	{
		$query=$this->db->query("SELECT osztalyid from osztalyok where osztalynev='$osztaly'");
		$osztalyid=$query->row_array();
		return $osztalyid;
	}


	public function tanteremlista()
	{
		$query=$this->db->get('termek');
		return $query->result_array();
	}
	public function ujterem($terem,$megjegyzes)
	{
		$data=['nev'=>$terem,'megjegyzes'=>$megjegyzes];
		$query=$this->db->insert('termek',$data);
	}

}

?>