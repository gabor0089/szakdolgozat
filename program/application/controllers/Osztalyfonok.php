<?PHP

class Osztalyfonok extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();	
        $this->load->helper(array('form', 'url'));
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
				$this->load->model('osztalyfonok_model');
				$osztalynev=$this->osztalyfonok_model->osztalyom($userid);
				$osztaly=$osztalynev[0]['osztalynev'];
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
			'iskolanev'=>$iskolanev,
			'osztaly'=>$osztaly
		];
	}
	public function Orarend()
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$orarend=$this->osztalyfonok_model->orarend($osztalyomid);
		$orarend2=[
		'orarend'=>$orarend,
		'osztalyom'=>$osztalyomnev
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/orarend',$orarend2);
	}
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$orarend=$this->osztalyfonok_model->orarend($osztalyomid);
		$orarend2=[
		'orarend'=>$orarend,
		'osztalyom'=>$osztalyomnev,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('osztalyfonok/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
	}
	public function SajatOsztalyJegyek($sorszam=null)
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];

		$tantargyak=$this->osztalyfonok_model->tantargyak($osztalyomid);

		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		$datas=$this->osztalyfonok_model->alapadatok();
		
		if($sorszam==null || $sorszam>count($tantargyak)-1 || $sorszam<0)
			$sszam=0;
		else $sszam=$sorszam;

		$this->load->model('users_model');
		$ev=$this->users_model->iskolanev();
		$jegyek=$this->osztalyfonok_model->jegyek($tantargyak[$sszam]['tantargyid'],$ev[0]['ev']);
		$data=['nevek'=>$nevek,
				'tantargyidk'=>$tantargyak[$sszam]['tantargyid'],
				'tantargynevek'=>$tantargyak[$sszam]['nev'],
				'jegyek'=>$jegyek,
				'sszam'=>$sszam,
				'evvegedatum'=>$datas[0]['evvegedatum'],
				'evvegeido'=>$datas[0]['evvegeido'],
				];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas',$data);
	}
	public function SajatOsztalyHianyzasok()
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];
		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		$hianyzasok=$this->osztalyfonok_model->hianyzasok();
		$data=array('nevek'=>$nevek,
					'hianyzasok'=>$hianyzasok);
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/sajatosztalyhianyzasok',$data);
	}
	public function Reszletes_hianyzas($diakid)
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$hianyzas=$this->osztalyfonok_model->hianyzas($diakid);
		$diaknev=$this->osztalyfonok_model->diaknev($diakid);
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$igazolasok = array(
				''		=>'',
		        'orvosi'=> 'Orvosi igazolás',
		        'szuloi'=> 'Szülői igazolás',
		        'tanari'=> 'Tanári igazolás',
		        'egyeb' => 'Egyéb',
		        'igazolatlan' => 'IGAZOLATLAN'
		);
		$data=array('hianyzas'=>$hianyzas,
					'igazolasok'=>$igazolasok,
					'diaknev'=>$diaknev['name'],
					'adatok'=>$adatok);
		$this->load->view('osztalyfonok/sajatosztalyhianyzasok_reszletes',$data);
	}
	public function Hianyzaskesz()
	{
		$this->load->model('osztalyfonok_model');
		$diakid=$this->input->post('diakid');
		$hianyzasid=$this->input->post('hianyzasid');
		$tipus=$this->input->post('tipus');
		$megjegyzes=$this->input->post('megjegyzes');
		if($tipus=="igazolatlan")
		$this->osztalyfonok_model->hianyzas_mod($hianyzasid,$tipus,$megjegyzes,3);
		else
		$this->osztalyfonok_model->hianyzas_mod($hianyzasid,$tipus,$megjegyzes,2);
		$this->reszletes_hianyzas($diakid);
	}

	public function Alapadatok()
	{
		$this->load->model('osztalyfonok_model');
		$datas=$this->osztalyfonok_model->alapadatok();
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
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/alapadatok',$adatok2);
	}
	public function Kollegalista()
	{
		$this->load->model('tanar_model');
		$kollegalista=$this->tanar_model->kollegalista();
		$data=['kollegak'=>$kollegalista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/kollegak',$data);
	}
	public function Osztalylista()
	{
		$this->load->model('osztalyfonok_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->osztalyfonok_model->osztalylista($userid);
		$data=['osztalyok'=>$osztalylista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyom',$data);
	}
	public function Osztalynevsor()
	{
		$this->load->model('osztalyfonok_model');
		$userid = $this->session->user_id;
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalynevsor=$this->osztalyfonok_model->osztalynevsor($adatok[0]['osztalyid']);
		$data=[
			   'nevek'=>$osztalynevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalynevsor',$data);
	}
	public function Erettsegi($userid=null)
	{
		$tanarid=$this->session->user_id;
		$this->load->model('osztalyfonok_model');
		if($userid<>null)
		{
			$diaknev=$this->osztalyfonok_model->diaknev($userid);
			$kovetkezodiak=$this->osztalyfonok_model->kovetkezodiak($tanarid,$diaknev['name']);
			$elozodiak=$this->osztalyfonok_model->elozodiak($tanarid,$diaknev['name']);
			$erettsegiadatok=$this->osztalyfonok_model->erettsegiadatok($userid);
			$data=[	'userid'=>$userid,
					'diaknev'=>$diaknev['name'],
					'kovuserid'=>$kovetkezodiak['userid'],
					'kovusernev'=>$kovetkezodiak['name'],
					'elozouserid'=>$elozodiak['userid'],
					'elozousernev'=>$elozodiak['name'],
					'erettsegiadatok'=>$erettsegiadatok
					];
		}
		else
		{
			$elsodiak=$this->osztalyfonok_model->elsodiak($tanarid);
			$kovetkezodiak=$this->osztalyfonok_model->kovetkezodiak($tanarid,$elsodiak['name']);
			$data=[	'userid'=>$elsodiak['userid'],
					'diaknev'=>$elsodiak['name'],
					'kovuserid'=>$kovetkezodiak['userid'],
					'kovusernev'=>$kovetkezodiak['name']
			];
		}
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/erettsegi',$data);	
	}
	public function Erettsegikesz()
	{
		$gomb=$this->input->post('gomb');
		
		$this->load->model('osztalyfonok_model');
		$userid=$this->input->post('userid');

		$magyarszint=$this->input->post('magyar');
		$magyarszazalek=$this->input->post('magyarszazalek');
	
		$matekszint=$this->input->post('matek');
		$matekszazalek=$this->input->post('matekszazalek');
	
		$toriszint=$this->input->post('tori');
		$toriszazalek=$this->input->post('toriszazalek');
	
		$idegennyelv=$this->input->post('idegennyelv');
		$nyelvszint=$this->input->post('nyelv');
		$nyelvszazalek=$this->input->post('nyelvszazalek');
	
		$szabval=$this->input->post('szabval');
		$szabvalszint=$this->input->post('szab');
		$szabvalszazalek=$this->input->post('szabszazalek');
		if($gomb=="kesz")
		{
			$this->osztalyfonok_model->erettsegikesz($userid,
									$magyarszint,$magyarszazalek,
									$matekszint,$matekszazalek,
									$toriszint,$toriszazalek,
									$idegennyelv,$nyelvszint,$nyelvszazalek,
									$szabval,$szabvalszint,$szabvalszazalek);
		}
		if($gomb=="modosit")
		{
			$this->osztalyfonok_model->erettsegimod($userid,
									$magyarszint,$magyarszazalek,
									$matekszint,$matekszazalek,
									$toriszint,$toriszazalek,
									$idegennyelv,$nyelvszint,$nyelvszazalek,
									$szabval,$szabvalszint,$szabvalszazalek);
		}
		$this->Erettsegi($userid);
	}
	public function Evvege($sorszam=null)
	{
		$userid = $this->session->user_id;
		$this->load->model('osztalyfonok_model');
		$adatok=$this->osztalyfonok_model->osztalyom($userid);
		$osztalyomnev=$adatok[0]['osztalynev'];
		$osztalyomid=$adatok[0]['osztalyid'];

		$tantargyak=$this->osztalyfonok_model->tantargyak($osztalyomid);
		$tantargyidk=array();
		foreach($tantargyak as $t)
		{
			$tantargyidk[]=$t['tantargyid'];
		}
		$nevek=$this->osztalyfonok_model->nevsor($osztalyomid);
		$datas=$this->osztalyfonok_model->alapadatok();
		if($sorszam==null)
			$sszam=$tantargyidk[0];
		elseif($sorszam>=0 && $sorszam<count($tantargyidk)-1)
		{ 
			$sszam=$tantargyidk[$sorszam];
		}
		elseif($sorszam<0)
		{
			$sszam=$tantargyidk[count($tantargyidk)-1];
		}
		elseif($sorszam>count($tantargyidk)-1)
		{
			$sszam=$tantargyidk[0];
		}
		$evvegijegyek=$this->osztalyfonok_model->evvegijegyek($sszam,$adatok[0]['osztalyid']);
		$tantargynev=$this->osztalyfonok_model->tantargynev($sszam);
		if(count($evvegijegyek)==0)
			$evvegijegyek=array();
		$key = array_search($sszam, $tantargyidk);
		$data=['nevek'=>$nevek,
				'tantargyidk'=>$sszam,
				'tantargynevek'=>$tantargynev['nev'],
				'sszam'=>$key,
				'evvegijegyek'=>$evvegijegyek
				];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas_evvege',$data);

	}
	public function Evvegekesz()
	{
		$this->load->model('osztalyfonok_model');
		foreach ($_POST as $key => $value) 
		{
			if($key=="tantargyid")
				$tantargyid=$value;
		}
		$tanar=$this->session->user_id;
		foreach ($_POST as $key => $value)
		{
				$diakid=$key;
				$jegy=$value;
				$datum=date("Y-m-d H:i:s",time());
				if($value<>"" && $key<>"tantargyid")
				{
					$this->osztalyfonok_model->evvegijegy($tantargyid,$jegy,$datum,$diakid);
				}
		}
		//var_dump($_POST);
		$this->Evvege($tantargyid);
	}

	public function Osztalyozas_diakok()
	{
		$kapottnev=$this->input->post('diaknev');
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$diakok=$this->tanar_model->mindensajatdiak($userid,$kapottnev);
		$data=['diakok'=>$diakok];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas_egyeni',$data);
	}
	public function Osztalyozas_tantargy()
	{
		$userid=$this->session->user_id;
		$diakid=$this->input->post('diakid');
		$this->load->model('tanar_model');
		$targyak=$this->tanar_model->kozostargyak($userid,$diakid);
		$diaknev=$this->tanar_model->diaknev($diakid);
		$data=['targyak'=>$targyak,
				'diaknev'=>$diaknev['name'],
				'diakid'=>$diakid];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas_egyeni',$data);
	}
	public function Osztalyozas_egyeni()
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('osztalyfonok/osztalyozas_egyeni');
	}
	public function Jegyek_egyeni($diak=null,$tantargy=null)
	{
		$this->load->model('tanar_model');
		$this->load->model('users_model');
		$tanarid=$this->session->user_id;
		if($diak==null)
			$diakid=$this->input->post('diakid');
		else
			$diakid=$diak;

		if($tantargy==null)
			$tantargyid=$this->input->post('tantargyid');
		else
			$tantargyid=$tantargy;
		$diak=$this->tanar_model->diaknev($diakid);
		$targy=$this->tanar_model->tantargynev($tantargyid);
		$this->load->model('users_model');
		$ev=$this->users_model->iskolanev();
		$jegyek=$this->tanar_model->jegyek($diakid,$tantargyid,$ev[0]['ev']);
		$dolgozatok=$this->tanar_model->dolgozatok($tanarid,$tantargyid);
		$data=[
				'jegyek'=>$jegyek,
				'tantargynev'=>$targy['nev'],
				'tantargyid'=>$tantargyid,
				'diaknev'=>$diak['name'],
				'diakid'=>$diakid,
				'dolgozatok'=>$dolgozatok];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/jegyek',$data);
	}
	public function Ujjegyadas()
	{
		$tanarid = $this->session->user_id;
		$this->load->model('tanar_model');
		$diak=$this->input->post('diakid');
		$tantargy=$this->input->post('tantargyid');
		$megjegyzes=$this->input->post('megjegyzes');
		$jegy=$this->input->post('jegy');
		$dolgozatid=$this->input->post('dolgozat');
		if(!isset($dolgozatid))
		{
			$dolgozatid=0;
		}
		if(isset($userfile))
		{
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 100000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 1024;
	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('userfile'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            $filename="";
	            $dolgozatid=0;
	            $utolsoazon[0]['azon']=0;
	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];
				$this->tanar_model->diakdolgozatfeltoltes($diak,$filename,$dolgozatid);
				$utolsoazon=$this->tanar_model->utolsodolgozatazon();
			}
		}
		else
		{
			$utolsoazon[0]['azon']=0;	
		}
   		$query=$this->tanar_model->Ujjegy($tanarid,$diak,$tantargy,$jegy,$megjegyzes,$dolgozatid,$utolsoazon[0]['azon']);
		$this->Jegyek_egyeni($diak,$tantargy);		
	}

	public function Csoportos_ujjegyadas()
	{
		$this->load->model('tanar_model');
		$userid[]=$this->input->post('userid[]');
		$jegy[]=$this->input->post('jegy[]');
		$tantargy=$this->input->post('tantargyid');
		$osztalyid=$this->input->post('osztalyid');
		$megjegyzes=$this->input->post('megjegyzes');
		$dolgozatid=$this->input->post('dolgozat');
		$tanar=$this->session->user_id;
		for ($i=0; $i < count($jegy[0]); $i++) 
		{ 
			if($jegy[0][$i]<>'')
			{
				if($dolgozatid=="")
				{
					$dolgozatid=0;
					$utolsoazon[0]['azon']=0;
				}
				if(isset($fajl))
				{
					$config['upload_path']          = './uploads/dolgozatok/';
			        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
			        $config['max_size']             = 100000;
			        $config['max_width']            = 1024;
			        $config['max_height']           = 1024;
			        $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('fajl'))
			        {
			            $error = array('error' => $this->upload->display_errors());
			            $filename="";
			        }
			        else
			        {
			            $data = array('upload_data' => $this->upload->data());
						$filename=$data['upload_data']['file_name'];
					}
					$this->tanar_model->diakdolgozatfeltoltes($userid[0][$i],$filename,$dolgozatid);
					$utolsoazon=$this->tanar_model->utolsodolgozatazon();
				}
				else
				{
					$utolsoazon[0]['azon']=0;
				}
				$this->tanar_model->ujjegy($tanar,$userid[0][$i],$tantargy,$jegy[0][$i],$megjegyzes,$dolgozatid,$utolsoazon[0]['azon']);
			}
		}
		$this->jegyek_csoportos($osztalyid);
	}


	public function Osztalyozas_csoportos()
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$tanitottosztalyaim=$this->tanar_model->osztalylista($userid);
		$data=['osztalyok'=>$tanitottosztalyaim];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/osztalyozas_csoportos',$data);
	}
	public function osztalyozas_csoportos_osztaly()
	{
		$userid=$this->session->user_id;
		$osztalyid=$this->input->post('osztalyid');
		$this->load->model('tanar_model');
		$tanitotttantargyaim=$this->tanar_model->tanitotttargyakosztalyban($userid,$osztalyid);
		$osztalynev=$this->tanar_model->osztalynev($osztalyid);
		$data=['tantargyak'=>$tanitotttantargyaim,
				'osztaly'=>$osztalynev['osztalynev'],
				'osztalyid'=>$osztalyid];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/osztalyozas_csoportos',$data);	
	}
	public function jegyek_csoportos($osztalyid=null)
	{
		$userid=$this->session->user_id;
		if($osztalyid==null)
		{
			$osztalyid=$this->input->post('osztalyid');
		}
		$tantargyid=$this->input->post('tantargyid');
		$this->load->model('tanar_model');
		$tantargynev=$this->tanar_model->tantargynev($tantargyid);
		$nevsor=$this->tanar_model->osztalynevsor($osztalyid);
		$this->load->model('users_model');
		$ev=$this->users_model->iskolanev();
		$jegyek=$this->tanar_model->osztalytargyjegy($osztalyid,$tantargyid,$ev[0]['ev']);
		$osztalynev=$this->tanar_model->osztalynev($osztalyid);
		$dolgozatlista=$this->tanar_model->dolgozatlista1tantargy($userid,$tantargyid);
		
		$data=['jegyek'=>$jegyek,
				'nevsor'=>$nevsor,
				'osztalynev'=>$osztalynev['osztalynev'],
				'osztaly'=>$osztalyid,
				'tantargynev'=>$tantargynev['nev'],
				'tantargyid'=>$tantargyid,
				'dolgozatok'=>$dolgozatlista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/jegyek_csoportos',$data);	
	}



	public function sajatosztaly()
	{
		$this->load->view('osztalyfonok/sajatosztaly'); //ez a sor csak átmeneti!!!!!!!!!!!!!!!
		//Kell ide egy feltétel, hogy melyik jelenjen meg: az, amelyik utoljára lett kiválasztva, tehát az adatbázisból jöjjön
		//$this->SajatOsztalyJegyek();
		//$this->SajatOsztalyHianyzasok();
	}
		public function Haladasinaplo($targyid=null)
	{
		$haladasinaplo=[];
		$this->load->model('tanar_model');
		if($targyid<>NULL)
		{
			$haladasinaplo=$this->tanar_model->haladasinaplo($targyid);
		}
		if(count($haladasinaplo)<1)
				$haladasinaplo=$this->tanar_model->haladasinaplo_ures($targyid);
		$adatok=$this->Main();
		$userid = $this->session->user_id;
		$tanitotttargyak=$this->tanar_model->tanitotttargyak($userid);
		$data=[ 'tanitotttargyak'=>$tanitotttargyak,
				'naplo'=>$haladasinaplo,
				'userid'=>$userid];
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/haladasinaplo',$data);
	}


	public function Haladasi_naplo_uj()
	{
		$datum=$this->input->post('datum');
		$hanyadik_ora=$this->input->post('ora');
		$osztalyid=$this->input->post('osztalyid');
		$tantargyid=$this->input->post('tantargyid');
		$tevekenyseg=$this->input->post('tev');
		$tanarid=$this->session->user_id;
		$this->load->model('tanar_model');
		$this->tanar_model->haladasinaplo_uj($datum,$hanyadik_ora,$osztalyid,$tantargyid,$tevekenyseg,$tanarid);
		$this->Haladasinaplo($tantargyid);
	}
	public function Haladasinaplokesz()
	{
		$id=$this->input->post('naploid');
		$targyid=$this->input->post('targyid');
		$tev=$this->input->post('tev');
		$this->load->model('tanar_model');
		$this->tanar_model->haladasinaplokesz($id,$tev);
		redirect('Osztalyfonok/Haladasinaplo/'.$targyid);
	}
	public function Hianyzas()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/hianyzasok');
	}
	public function Ujhianyzas()
	{
		$this->load->model('tanar_model');
		$osztaly=$this->input->post('osztaly');
		$datum=$this->input->post('datum');
		$ora=$this->input->post('ora');
		$osztalyid=$this->tanar_model->osztalyid($osztaly);
		$osztalyid=$osztalyid['osztalyid'];
		$nevsor=$this->tanar_model->nevsor($osztalyid);
		$nevsorhianyzas=[
			'osztaly'=>$osztaly,
			'datum'=>$datum,
			'ora'=>$ora,
			'nevsor'=>$nevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('Osztalyfonok/hianyzasok',$nevsorhianyzas);		
	}
	public function Ujhianyzasfelvitel()
	{
		$tanarid=$this->session->user_id;
		$this->load->model('tanar_model');
		$diakid=$this->input->post('diakid');
		$ora=$this->input->post('ora');
		$hianyzas_datum=$this->input->post('hianyzas_datum');
		$perc=$this->input->post('perc');
		$this->tanar_model->Ujhianyzasfelvitel($tanarid,$diakid,$ora,$perc,$hianyzas_datum);
		$this->Hianyzas();
	}


}