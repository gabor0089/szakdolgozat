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
	/*public function ujjegy()
	{
		$data = array(
				'ki_kapta' => '1',
				'ki_adta' => '1',
				'jegy' => $this->input->post('jegy'),
				'tantargy' => $this->input->post('tantargy'),
				'jeloles' => 'kék',
				'megjegyzes' => 'ez a megjegyzés',
				'dolg_azon' => rand(0,999),
                'dolgozat_fajl_id' => rand(0,9999),
				); 		
			$this->db->insert('jegyek', $data);
		return true;
	}*/
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
		var_dump($data);
			$this->db->insert('jegyek', $data);
		return true;
	}
	public function mindendiak()
	{
		$query=$this->db->get('users');
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