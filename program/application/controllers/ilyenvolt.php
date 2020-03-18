<?php
	public function Osztalyozas() //EZ JÓ, EHHEZ NE NYÚLJ!!!
	{
		$this->load->model('tanar_model');
		$diakok=$this->tanar_model->mindendiak();
		$tantargyak=$this->tanar_model->tantargyak();
		foreach($diakok as $nev)
		{
			$diakoknevei[]=$nev['name'];
			$diakokid[]=$nev['userid'];
		}
		foreach($tantargyak as $targy)
		{
			$tantargyaknevei[]=$targy['nev'];
			$tantargyid[]=$targy['tantargyid'];
		}
		$diakoknevei=array_unique($diakoknevei);
		$tantargyaknevei=array_unique($tantargyaknevei);
		$data=[
			'diakok' => $diakoknevei,
			'tantargyak' => $tantargyaknevei
		];
		$adatok=$this->Main();
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/osztalyozas',$data);
	}

	public function Ujjegyadas()
	{
		$this->load->model('tanar_model');
		$diak=$this->input->post('diak');
		$tantargy=$this->input->post('tantargy2');
		$diakid    =$this->tanar_model->diakid($diak);
		$tantargyid=$this->tanar_model->tantargyid($tantargy);
		$jegy=$this->input->post('jegy');
		$tanarid = $this->session->user_id;
		$this->tanar_model->Ujjegy($tanarid,$diakid['userid'],$tantargyid['tantargyid'],$jegy);
		$this->Osztalyozas();		
	}
	public function Ujjegyadas2()
	{
		$this->load->model('tanar_model');
		$tanarid=$this->input->post('tanarid');
		$diakid=$this->input->post('diakid');
		$tantargyid=$this->input->post('tantargyid');
		$jegy=$this->input->post('jegy');
		$megjegyzes=$this->input->post('megjegyzes');
		$this->tanar_model->Ujjegy($tanarid,$diakid,$tantargyid,$jegy,$megjegyzes);
		$this->Jegyek($diakid,$tantargyid);		
	}
	public function Jegyek_egyeni($diakid=null,$tantargyid=null)
	{
		$this->load->model('tanar_model');
		$userid = $this->session->user_id;

		if(!isset($tantargyid))
		{
			$diaknev=$this->input->post('diak');
			$tantargynev=$this->input->post('tantargy2');
			$diakid    =$this->tanar_model->diakid($diaknev);
			$tantargyid=$this->tanar_model->tantargyid($tantargynev);
			$jegyek=$this->tanar_model->jegyek($diakid['userid'],$tantargyid['tantargyid']);
			$data=['jegyek'=>$jegyek,'tantargynev'=>$tantargynev,'diaknev'=>$diaknev];
		}
		else
		{
			$diaknev    =$this->tanar_model->diaknev($diakid);
			$tantargynev=$this->tanar_model->tantargynev($tantargyid);
			$jegyek=$this->tanar_model->jegyek($diakid,$tantargyid);
			$data=[
					'jegyek'=>$jegyek,
					'tantargynev'=>$tantargynev['nev'],
					'diaknev'=>$diaknev['name'],
					'targyid'=>$tantargyid,
					'diakid'=>$diakid,
					'tanarid'=>$userid];
		}
		$adatok=$this->Main();
		//var_dump($data);
		$this->load->view($adatok['headerlink'],$adatok);
		$this->load->view('tanar/jegyek',$data);	
	}
?>