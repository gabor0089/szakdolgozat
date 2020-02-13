<?PHP

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
        $this->load->helper(array('form', 'url'));
		$userid = $this->session->user_id;
	}

    public function index()
    {

        $this->load->view('admin/alapadatok', array('error' => ' ' ));
    }

	public function Main()
	{
		$this->load->model('users_model');
		$userid = $this->session->user_id;
		$iskolanev=$this->users_model->iskolanev();
		$iskolanev=$iskolanev[0]['iskolanev'];
		$items=$this->users_model->get_userdata($userid);
		switch($items[0]['beosztas'])
		{
			case '0':
				$beosztasnev="adminisztrátor";
				$headerlink='header/admin';
			break;
			case '1':
				$beosztasnev="igazgató";
				$headerlink='header/igazgato';
			break;
			case '2':
				$beosztasnev="osztályfőnök";
				$headerlink='header/ofonok';
			break;
			case '3':
				$beosztasnev="tanár";
				$headerlink='header/tanar';
			break;
			case '4':
				$beosztasnev="diák";
				$headerlink='header/diak';
			break;
			case '5':
				$beosztasnev="szülő";
				$headerlink='header/szulo';
			break;
		}
		return $adatok=
		[
			'headerlink'=>$headerlink,
			'userid'=>$items[0]['userid'],
			'name'=>$items[0]['name'],
			'beosztas'=>$beosztasnev,
			'iskolanev'=>$iskolanev
		];
	}
	public function Diakok()
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$diakoklistaja=$this->load->admin_model->diakoklistaja();
		
		$table_data=array(
				array('Név',"Születési idő","Születési hely","TAJ szám","Telefonszám","Irsz.","Lakcím","Osztály","Fénykép")
			);
		foreach($diakoklistaja as $lista)
		{
			array_push($table_data,array($lista['name'],$lista['dob'],$lista['szulhely'],$lista['taj'],$lista['tel'],$lista['irsz'],$lista['lakcim'],$lista['osztalyid'],$lista['foto_link']));
		}
		$lista=
		[
			'diakoklistaja'=>$table_data
		];
		$this->load->view('admin/diakok',$lista);

	}    

	public function Ujdiak()
	{

		$this->load->model('admin_model');
		$this->form_validation->set_rules('nev','Diák neve','required');
		
		if($this->form_validation->run()===FALSE)
		{
			$adatok2=
			[
				'feltoltes'=>'sikertelen!'
			];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/ujdiak',$adatok2);
		}

		else
		{
			$nev=$this->input->post('nev');
			$adatok2=
			[
				'feltoltes'=>'sikeres!'
			];
			$adatok=$this->Main();
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 100000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/ujdiak', $error);
                }
                else
                {

                    $data = array('upload_data' => $this->upload->data());
					$filename=$data['upload_data']['file_name'];
					$kesz=$this->admin_model->ujdiak($filename);

					$this->load->view($adatok['headerlink'],$adatok);
					$this->load->view('admin/ujdiak',$adatok2);
                }

		}    
	}

	public function Tanarok()
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$tanaroklistaja=$this->load->admin_model->tanaroklistaja();
		
		$table_data=array();
		foreach($tanaroklistaja as $lista)
		{
			$beosztasnev=$this->load->admin_model->beosztas($lista['beosztas']);
			array_push($table_data,array($lista['name'],$lista['dob'],$lista['szulhely'],$lista['taj'],$lista['tel'],$lista['irsz'],$lista['lakcim'],$beosztasnev[0]['nev'],$lista['foto_link']));
		}
		$lista=
		[
			'tanaroklistaja'=>$table_data
		];
		$this->load->view('admin/tanarok',$lista);

	}
	public function Ujtanar()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('nev','Tanár neve','required');
		$tantargyak=$this->admin_model->tantargyak();
		$osztalyok=$this->admin_model->osztalyok();
		if($this->form_validation->run()===FALSE)
		{
			$adatok2=
			[
				'feltoltes'=>'sikertelen!',
				'tantargyak'=>$tantargyak,
				'osztalyok'=>$osztalyok
			];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/ujtanar',$adatok2);
		}

		else
		{
			$nev=$this->input->post('nev');
			$adatok2=
			[
				'feltoltes'=>'sikeres!'
			];
			$adatok=$this->Main();
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 100000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('admin/ujtanar', $error);
                }
                else
                {
                	echo "itt";
                    $data = array('upload_data' => $this->upload->data());
					$filename=$data['upload_data']['file_name'];
					$kesz=$this->admin_model->ujtanar($filename);

					$this->load->view($adatok['headerlink'],$adatok);
					$this->load->view('admin/ujtanar',$adatok2);
                }
		}    
	}	
	public function Szulok()
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$szuloklistaja=$this->load->admin_model->szuloklistaja();
		
		$table_data=array(
				array('Név',"Születési idő","Születési hely","Telefonszám","Irsz.","Lakcím","Gyermek(ek) neve")
			);
		foreach($szuloklistaja as $lista)
		{
			array_push($table_data,array($lista['name'],$lista['dob'],$lista['szulhely'],$lista['tel'],$lista['irsz'],$lista['lakcim'],$lista['gyerek']));
		}

		$lista=
		[
			'szuloklistaja'=>$table_data
		];
		$this->load->view('admin/szulok',$lista);

	}    


	public function Ujszulo()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('nev','Szülő neve','required');
		
		if($this->form_validation->run()===FALSE)
		{

			//////////////
			$diakok=$this->admin_model->mindendiak();
			$diakok_nevei=array();
			foreach ($diakok as $diaknev)
			{
				foreach ($diaknev as $diak)
				{
					$diakok_nevei[]=$diak;
				}
			}
			$adatok2=
			[
				'diakok_nevei'=>$diakok_nevei,
				'feltoltes'=>'sikeres!'
			];
			///////////
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/ujszulo',$adatok2);
		}

		else
		{
			$nev=$this->input->post('nev');
		
			$adatok=$this->Main();
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 100000;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

            $this->load->library('upload', $config);

            $data = array('upload_data' => $this->upload->data());
			$kesz=$this->admin_model->ujszulo();
		}    
	}
	public function Alapadatok()
	{
		////////////////////////////////////////////////////////////////////
		$this->load->model('admin_model');
		$this->form_validation->set_rules('isnev','Iskola neve','required');
		$this->form_validation->set_rules('ignev','Igazgató neve','required');
		$this->form_validation->set_rules('cim','Iskola címe','required');
		$this->form_validation->set_rules('ev','Év','required');

		if($this->form_validation->run()===FALSE)
		{
			//$this->load->view('admin/alapadatok',$adatok);
		}
		else
		{
			$isnev=$this->input->post('isnev');
			$ignev=$this->input->post('ignev');
			$cim=$this->input->post('cim');
			$ev=$this->input->post('ev');

			$kesz=$this->admin_model->alapadatokkesz($isnev,$ignev,$cim,$ev);
		}
			$datas=$this->admin_model->alapadatok();
			$adatok2=
			[
				'isnev'=>$datas[0]['iskolanev'],
				'ignev'=>$datas[0]['igazgatonev'],
				'cim'=>$datas[0]['iskolacim'],
				'ev'=>$datas[0]['ev']
			];
//////////////////////////////////////////
		
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('admin/alapadatok',$adatok2);


		////////////////////////////////////////////////////////////////////
	}
	public function Csengrend()
	{
		$this->form_validation->set_rules('k1','1.óra kezdőidőpontja','required');

		if($this->form_validation->run()===FALSE)
		{		}
		else
		{
			$k0=$this->input->post('k0');$v0=$this->input->post('v0');
			$k1=$this->input->post('k1');$v1=$this->input->post('v1');
			$k2=$this->input->post('k2');$v2=$this->input->post('v2');
			$k3=$this->input->post('k3');$v3=$this->input->post('v3');
			$k4=$this->input->post('k4');$v4=$this->input->post('v4');
			$k5=$this->input->post('k5');$v5=$this->input->post('v5');
			$k6=$this->input->post('k6');$v6=$this->input->post('v6');
			$k7=$this->input->post('k7');$v7=$this->input->post('v7');
			$k8=$this->input->post('k8');$v8=$this->input->post('v8');
			$k9=$this->input->post('k9');$v9=$this->input->post('v9');
			$k10=$this->input->post('k10');$v10=$this->input->post('v10');
			$kesz=$this->admin_model->csengrendkesz($k0,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,$v0,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10);
		
		}
			/*$datas=$this->load->admin_model->alapadatok();
			$adatok=
			[
				'isnev'=>$datas[0]['iskolanev'],
				'ignev'=>$datas[0]['igazgatonev'],
				'cim'=>$datas[0]['iskolacim'],
				'ev'=>$datas[0]['ev']
			];*/
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/csengrend');
	}

}