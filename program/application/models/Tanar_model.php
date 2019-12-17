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
		$query=$this->db->query('SELECT datum,hanyadik_ora,milyennap,osztalyok.osztalynev as osztaly,tantargyak.nev as tantargy,orarend.teremid as terem 
							from orarend left join osztalyok on orarend.osztalyid=osztalyok.osztalyid 
										 join tantargyak on tantargyak.tantargyid=orarend.tantargyid
							where tanarid='.$id.' order by milyennap,hanyadik_ora');
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
		$tantargyid=$query->row_array();
		return $tantargyid;
	}
	public function nevsor($osztalyid)
	{
		$query=$this->db->query("SELECT name, userid from users where osztalyid='$osztalyid' order by name");
		$nevsor=$query->result_array();
		return $nevsor;
	}

	public function ujjegy($tanar,$diakid,$tantargy,$jegy)
	{
		$data = array(
				'kikapta' => $diakid,
				'kiadta' => $tanar,
				'jegy' => $jegy,
				'tantargyid' => $tantargy,
				'jeloles' => '3',
				'megjegyzes' => 'ez a megjegyzés',
				'dolgid' => rand(0,999),
                'dolgfajlid' => rand(0,9999),
				); 		
			$this->db->insert('jegyek', $data);
		return true;
	}
	public function ujhianyzasfelvitel($diakid,$perc)
	{
		$data = array(
				'diakid' => $diakid,
				'hianyzas_tipus'=>$perc,
				'tanarid' => 99,
				'hianyzas_datum' => '2019-12-12',
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
}
?>