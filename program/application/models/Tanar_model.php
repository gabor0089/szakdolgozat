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
	public function ujjegy()
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
	}
	public function mindendiak()
	{
		$query=$this->db->get('users');
		$result_array=$query->result_array();
		
		//var_dump($result_array);
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