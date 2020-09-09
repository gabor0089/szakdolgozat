<?PHP

class Tanar extends CI_Controller
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
	public function Orarend()
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$orarend=$this->tanar_model->orarend($userid);
		$orarend2=[
		'orarend'=>$orarend,
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/orarend',$orarend2);
	}
	public function OrarendExport()
	{
		$this->load->library('mypdf');
		$this->load->model('users_model');
		$csengrend=$this->users_model->csengrend();
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$orarend=$this->tanar_model->orarend($userid);
		$orarend2=[
		'orarend'=>$orarend,
		'csengrend'=>$csengrend
		];
		$this->mypdf->generate('tanar/orarend_pdf', $orarend2, 'laporan-mahasiswa', 'A4', 'landscape');
	}
	public function Hianyzas()
	{
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/hianyzasok');
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
		$this->load->view('tanar/hianyzasok',$nevsorhianyzas);		
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
		$this->Ujhianyzas();
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
		$this->load->view('tanar/osztalyozas_egyeni',$data);
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
		$this->load->view('tanar/osztalyozas_egyeni',$data);
	}
	public function Osztalyozas_egyeni()
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyozas_egyeni');
	}
	public function Jegyek_egyeni($diak=null,$tantargy=null)
	{
		$this->load->model('tanar_model');
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
		$jegyek=$this->tanar_model->jegyek($diakid,$tantargyid);
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
		$this->load->view('tanar/jegyek',$data);
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


	public function Osztalyozas_csoportos() //EZ JÓ, EHHEZ NE NYÚLJ!!!
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$tanitottosztalyaim=$this->tanar_model->osztalylista($userid);
		$data=['osztalyok'=>$tanitottosztalyaim];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyozas_csoportos',$data);
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
		$this->load->view('tanar/osztalyozas_csoportos',$data);	
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
		$jegyek=$this->tanar_model->osztalytargyjegy($osztalyid,$tantargyid);
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
		$this->load->view('tanar/jegyek_csoportos',$data);	
	}

	public function Haladasinaplo($targyid=null)
	{
		$haladasinaplo=[];
		$this->load->model('tanar_model');
		if($targyid<>NULL)
		{
			$haladasinaplo=$this->tanar_model->haladasinaplo($targyid);
		}
		$adatok=$this->Main();
		$userid = $this->session->user_id;
		$tanitotttargyak=$this->tanar_model->tanitotttargyak($userid);
		$data=[ 'tanitotttargyak'=>$tanitotttargyak,
				'naplo'=>$haladasinaplo];
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/haladasinaplo',$data);
	}
	public function Haladasinaplokesz()
	{
		$id=$this->input->post('naploid');
		$targyid=$this->input->post('targyid');
		$tev=$this->input->post('tev');
		$this->load->model('tanar_model');
		$this->tanar_model->haladasinaplokesz($id,$tev);
		redirect('Tanar/Haladasinaplo/'.$targyid);
	}

	public function Alapadatok()
	{
		$this->load->model('tanar_model');
		$datas=$this->tanar_model->alapadatok();
		$adatok2=
		[
			'isnev'=>$datas[0]['iskolanev'],
			'ignev'=>$datas[0]['igazgatonev'],
			'cim'=>$datas[0]['iskolacim'],
			'ev'=>$datas[0]['ev']
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/alapadatok',$adatok2);
	}
	public function Kollegalista()
	{
		$this->load->model('tanar_model');
		$kollegalista=$this->tanar_model->kollegalista();
		$data=['kollegak'=>$kollegalista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/kollegak',$data);
	}
	public function Osztalylista()
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->tanar_model->osztalylista($userid);
		$data=['osztalyok'=>$osztalylista];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyok',$data);
	}
	public function Osztalynevsor($osztalyid)
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;
		$osztalylista=$this->tanar_model->osztalylista($userid);
		$osztalynevsor=$this->tanar_model->osztalynevsor($osztalyid);
		$data=['osztalyok'=>$osztalylista,
			   'nevek'=>$osztalynevsor];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalynevsor',$data);
	}
	public function Dolgozatok()
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$dolgozatlista=$this->tanar_model->dolgozatlista($userid);
		$tantargyak=$this->tanar_model->tanitotttargyak($userid);
		$data=['dolgozatok'=>$dolgozatlista,
				'tantargyak'=>$tantargyak];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/dolgozatok',$data);
	}
	public function Dolgozatkesz()
	{
		$userid=$this->session->user_id;
		$this->load->model('tanar_model');
		$tantargyid=$this->input->post('tantargyid');
		$datum=$this->input->post('datum');
		$datum.=" ".$this->input->post('ido').":00";
		$dolgozatcim=$this->input->post('dolgozatcim');
		$this->tanar_model->ujdolgozat($tantargyid,$datum,$dolgozatcim,$userid);
		$this->Dolgozatok();
	}
}