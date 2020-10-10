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
	public function Diakok($sorrend='name')
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$diakoklistaja=$this->load->admin_model->diakoklistaja($sorrend);
		$table_data=array();		
		foreach($diakoklistaja as $lista)
		{
			array_push($table_data,array($lista['name'],$lista['dob'],$lista['szulhely'],$lista['taj'],$lista['tel'],$lista['irsz'],$lista['lakcim'],$lista['email'],$lista['osztalyid'],$lista['foto_link'],$lista['userid']));
		}
		$lista=
		[
			'diakoklistaja'=>$table_data
		];
		$this->load->view('admin/diakok',$lista);
	}    
	public function Diak_mod0($userid)
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$diakokadatai=$this->load->admin_model->diakokadatai($userid);
		$diakadatai=['diakokadatai'=>$diakokadatai];
		$this->load->view('admin/modosit_diak',$diakadatai);
	}
	public function UjdiakExcel()
	{
		$this->load->helper('file');
		$passz = read_file(base_url().'/excel/adatok.csv');
		var_dump($passz);
	}

	public function Ujdiak()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('nev','Diák neve','required');	
		if($this->form_validation->run()===FALSE)
		{
			$adatok2=['feltoltes'=>'sikertelen!'];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/ujdiak',$adatok2);
		}
		else
		{
			$nev=$this->input->post('nev');
			$adatok2=['feltoltes'=>'sikeres!'];
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
	public function Diak_mod()
	{
		$this->load->model('admin_model');
	
		$userid=$this->input->post('userid');
		$name=$this->input->post('name');
		$dob=$this->input->post('dob');
		$szulhely=$this->input->post('szulhely');
		$taj=$this->input->post('taj');
		$tel=$this->input->post('tel');
		$irsz=$this->input->post('irsz');
		$lakcim=$this->input->post('lakcim');
		$email=$this->input->post('email');
		$osztaly=$this->input->post('osztaly');

		$adatok=$this->Main();
			
		$kesz=$this->admin_model->modosit_diak($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid);
		redirect('Admin/diakok');
	}    
	
	public function Tanarok($sorrend='name')
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$tanaroklistaja=$this->load->admin_model->tanaroklistaja($sorrend);
		
		$table_data=array();
		foreach($tanaroklistaja as $lista)
		{
			$beosztasnev=$this->load->admin_model->beosztas($lista['beosztas']);
			array_push($table_data,array(
				$lista['name'],
				$lista['dob'],
				$lista['szulhely'],
				$lista['taj'],
				$lista['tel'],
				$lista['irsz'],
				$lista['lakcim'],
				$lista['email'],
				$beosztasnev[0]['nev'],
				$lista['foto_link'],
				$lista['userid']));
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
			$name=$this->input->post('nev');
			$dob=$this->input->post('szulido');
			$szulhely=$this->input->post('szulhely');
			$taj=$this->input->post('taj');
			$tel=$this->input->post('tel');
			$irsz=$this->input->post('irsz');
			$lakcim=$this->input->post('lakcim');
			$foto_link=$this->input->post('userfile');
			$beosztas=$this->input->post('beosztas');

			$ofopipa=$this->input->post('ofopipa');
			$ofoosztaly=$this->input->post('ofoosztaly');
			
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
                        var_dump($error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
					$filename=$data['upload_data']['file_name'];
					$kesz=$this->admin_model->ujtanar($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$beosztas,$filename);
					$utolsotanar=$this->admin_model->legutobbi_tanar();
					$kesz2=$this->admin_model->ujofoosztaly($ofoosztaly,$utolsotanar[0]['userid']);
					//var_dump($utolsotanar);
					//echo $ofoosztaly."-".$utolsotanar[0]['userid'];
					redirect('Admin/tanarok');
				} 
		}    
	}	
	public function Tanar_mod0($userid)
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$tanarokadatai=$this->load->admin_model->tanarokadatai($userid);
		$tanaradatai=['tanarokadatai'=>$tanarokadatai];
		$this->load->view('admin/modosit_tanar',$tanaradatai);
	}
	public function Tanar_mod()
	{
		$this->load->model('admin_model');
	
		$userid=$this->input->post('userid');
		$name=$this->input->post('name');
		$dob=$this->input->post('dob');
		$szulhely=$this->input->post('szulhely');
		$taj=$this->input->post('taj');
		$tel=$this->input->post('tel');
		$irsz=$this->input->post('irsz');
		$lakcim=$this->input->post('lakcim');
		$email=$this->input->post('email');
		$osztaly=$this->input->post('osztaly');

		$adatok=$this->Main();
			
		$kesz=$this->admin_model->modosit_tanar($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid);
		redirect('Admin/tanarok');
	}    


	public function Szulok()
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$szuloklistaja=$this->load->admin_model->szuloklistaja();
		$mindengyerek=$this->load->admin_model->mindendiak();
		
		$lista=
		[
			'szuloklistaja'=>$szuloklistaja,
			'mindendiak'=>$mindengyerek
		];
		$this->load->view('admin/szulok',$lista);

	}   
	public function Szulo_mod()
	{
		$this->load->model('admin_model');
	
		$userid=$this->input->post('userid');
		$name=$this->input->post('name');
		$dob=$this->input->post('dob');
		$szulhely=$this->input->post('szulhely');
		$taj=$this->input->post('taj');
		$tel=$this->input->post('tel');
		$irsz=$this->input->post('irsz');
		$lakcim=$this->input->post('lakcim');
		$email=$this->input->post('email');
		
		$adatok=$this->Main();
			
		$kesz=$this->admin_model->modosit_szulo($name,$dob,$szulhely,$taj,$tel,$irsz,$lakcim,$email,$osztaly,$userid);
		redirect('Admin/szulok');
	}    
	public function Szulo_mod0($userid)
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$szulokadatai=$this->load->admin_model->szulokadatai($userid);
		$szuloadatai=['szulokadatai'=>$szulokadatai];
		$gyerekei=$this->load->admin_model->szulogyerekei($userid);
		$diakok=$this->admin_model->mindendiak();
		$diakok_nevei=array();
		foreach ($diakok as $diaknev)
		{
			foreach ($diaknev as $diak)
			{
				$diakok_nevei[]=$diak;
			}
		}
		$adatok=['gyerekek'=>$gyerekei,
				'szulokadatai'=>$szuloadatai,
				'diakok_nevei'=>$diakok_nevei
				];

		$this->load->view('admin/modosit_szulo',$adatok);
	}

	public function Szulogyermekmutat($szuloid)
	{
		$gyerekek=array("Egyik gyerek","Másik gyerek");
		$this->load->view('admin/szulok',$gyerekek);
		
	} 


	public function Ujszulo()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('nev','Szülő neve','required');
		
		if($this->form_validation->run()===FALSE)
		{
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
			redirect('Admin/szulok');
		}    
	}
	public function Gyerekhozzaad()
	{
		$szuloid=$this->input->post('szuloid');
		$gyereknev=$this->input->post('diak');
		$kesz=$this->admin_model->gyermekhozzaad($szuloid,$gyereknev);
		redirect('Admin/szulok');
	}
	public function Alapadatok()
	{
		////////////////////////////////////////////////////////////////////
		$this->load->model('admin_model');
		$this->form_validation->set_rules('isnev','Iskola neve','required');
		$this->form_validation->set_rules('ignev','Igazgató neve','required');
		$this->form_validation->set_rules('cim','Iskola címe','required');
		$this->form_validation->set_rules('ev','Év','required');
		$this->form_validation->set_rules('evvegedatum','Évvége dátuma','required');
		$this->form_validation->set_rules('evvegeido','Év vége ideje','required');
		$this->form_validation->set_rules('erettsegidatum','Érettségi dátuma','required');
		$this->form_validation->set_rules('erettsegiido','Érettségi ideje','required');

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
			$evvegedatum=$this->input->post('evvegedatum');
			$evvegeido=$this->input->post('evvegeido');
			$erettsegidatum=$this->input->post('erettsegidatum');
			$erettsegiido=$this->input->post('erettsegiido');

			$kesz=$this->admin_model->alapadatokkesz($isnev,$ignev,$cim,$ev,$evvegedatum,$evvegeido,$erettsegidatum,$erettsegiido);
		}
			$datas=$this->admin_model->alapadatok();
			$adatok2=
			[
				'isnev'=>$datas[0]['iskolanev'],
				'ignev'=>$datas[0]['igazgatonev'],
				'cim'=>$datas[0]['iskolacim'],
				'ev'=>$datas[0]['ev'],
				'evvegedatum'=>$datas[0]['evvegedatum'],
				'evvegeido'=>$datas[0]['evvegeido'],
				'erettsegidatum'=>$datas[0]['erettsegidatum'],
				'erettsegiido'=>$datas[0]['erettsegiido']
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
			$csengetes=$this->admin_model->csengrend();
			$data=['csengetes'=>$csengetes];
			$adatok=$this->Main();
			$this->load->view($adatok['headerlink'],$adatok);
			$this->load->view('admin/csengrend',$data);
	}
	public function Ujtantargy()
	{
		$this->load->model('admin_model');
		$nev=$_POST['tantargynev'];
		$osztalyid=$this->admin_model->osztalyid($_POST['osztalynev']);
		$tanarid=$this->admin_model->tanarid($_POST['tanarnev']);
		$oraszam=$_POST['oraszam'];
		$this->admin_model->ujtantargy($nev,$osztalyid['osztalyid'],$tanarid['userid'],$oraszam);
		$this->Tantargyak();
	}
	public function Tantargyak($sorrend=null)
	{
		$this->load->helper('url');
		$this->load->model('admin_model');
		if($sorrend==null)
			$sorrend='nev';
		$targyak=$this->admin_model->tantargyaklista($sorrend);
		$data=['targyak'=>$targyak];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('admin/tantargyak',$data);
	}
	public function Tantargyvaltozas()
	{
		$this->load->model('admin_model');
		$tantargyid=$this->input->post('tantargyid');
		$tantargynev=$this->input->post('tantargynev');
		$tanarnev=$this->input->post('tanarnev');
		$tanarid=$this->admin_model->tanarid($tanarnev);
		$osztalynev=$this->input->post('osztalynev');
		$osztalyid=$this->admin_model->osztalyid($osztalynev);
		$oraszam=$this->input->post('oraszam');
		$this->admin_model->Tantargyvaltozas($tantargyid,$tantargynev,$tanarid['userid'],$osztalyid['osztalyid'],$oraszam);
		$this->Tantargyak();
	}

	public function Tantermek()
	{
		$this->load->model('admin_model');
		$termek=$this->admin_model->tanteremlista();
		$data=['termek'=>$termek];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('admin/tantermek',$data);
	}
	public function Ujterem()
	{
		$this->load->model('admin_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('admin/ujterem');
	}
	public function Ujteremkesz()
	{
		$this->load->model('admin_model');
		$terem=$this->input->post('nev');
		$megjegyzes=$this->input->post('megjegyzes');
		$this->admin_model->ujterem($terem,$megjegyzes);
		$this->Tantermek();
	}
	public function Orarend($osztaly)
	{
		$this->load->model('admin_model');
		$orarend=$this->admin_model->orarend($osztaly);
		$osztalynev=$this->admin_model->osztalynev($osztaly);
		$osztalyok=$this->admin_model->osztalyok();
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$data=['orarend'=>$orarend,
				'osztalyok'=>$osztalyok,
				'osztalynev'=>$osztalynev,
				'alaposztalyid'=>$osztaly];
		$this->load->view('admin/orarend',$data);
	}
	public function Orarend_mod($oraid,$osztalyid)
	{
		$this->load->model('admin_model');
		$orarend_ora=$this->admin_model->orarend_ora($oraid);
		$tantermek=$this->admin_model->tanteremlista();
		$tantargyaklista=$this->admin_model->tantargyak_adottosztaly($osztalyid);
		$adatok=$this->Main();
		$tanarok=$this->admin_model->tanarok_adottosztaly();
		$this->load->view($adatok['headerlink'],$adatok);
		$data=['orarend'=>$orarend_ora,
				'tantargyak'=>$tantargyaklista,
				'terem'=>$tantermek,
				'tanarok'=>$tanarok,
				'oraid'=>$oraid];
		$this->load->view('admin/orarend_ora',$data);
	}
	public function Orarend_ora_kesz()
	{
		$this->load->model('admin_model');
	    $oraid=$_POST['oraid'];
	    if(isset($_POST['terem']))
	    {
	    	$terem=$_POST['terem'];
	    	$this->admin_model->orarend_valtozas_terem($oraid,$terem);
	    }
	    if(isset($_POST['targy']))
	    {
	    	$targy=$_POST['targy'];
	    	echo $targy;
	    	$this->admin_model->orarend_valtozas_targy($oraid,$targy);
	    }
	    if(isset($_POST['tanar']))
	    {
	    	$tanar=$_POST['tanar'];
	    	echo $tanar;
	    	$this->admin_model->orarend_valtozas_tanar($oraid,$tanar);
	    }
	    redirect('Admin/Orarend_mod/'.$oraid);
	}
	public function Ora_torol($oraid)
	{
		$this->load->model('admin_model');
		$this->admin_model->ora_torol($oraid);
		redirect('Admin/Orarend_mod/'.$oraid);        
	}
	public function orarend_letrehozas($osztalyid)
	{
		$this->load->model('admin_model');
		$this->admin_model->orarend_adat_torol($osztalyid);
		for ($i=1; $i < 6; $i++) { 
			for ($j=0; $j < 11; $j++) { 
						$this->admin_model->orarend_letrehoz($osztalyid,$i,$j);				
			}
		}
	redirect('Admin/Orarend/'.$osztalyid);        
			        
	}
}