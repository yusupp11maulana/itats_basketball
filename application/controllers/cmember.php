<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cmember extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mmember');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['registrasi'] = $this->mmember->viewMem();
		$data['kode'] = $this->mmember->auto();
		$this->load->view('member/index',$data);
	}

	public function insert(){
		$this->form_validation->set_rules('idp','ID Registrasi', 'required');
		$this->form_validation->set_rules('npm','NPM', 'required');
		$this->form_validation->set_rules('nmmhs','Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('jur','Jurusan', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['kode'] = $this->mmember->auto();
			redirect('cmember');			
		}
		else{
			$tanggal=date("Y/m/d");
			$foto="NEW";
			$this->mmember->addMem($tanggal,$foto);
			redirect('cmember');
		}
	}

	public function update(){
		$this->form_validation->set_rules('npm','NPM', 'required');
		$this->form_validation->set_rules('nmmhs','Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('jur','Jurusan', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['kode'] = $this->mmember->auto();
			redirect('cmember');			
		}
		else{
			$fotop = $_FILES['fotop']['name'];
            if ($fotop == "") {
			$this->mmember->UpdateMem();
			redirect('cmember');
            } else {
                $config['upload_path']          = './assets/fotomhs/';
				$config['allowed_types']        = 'jpg|png';
				$this->load->library('upload', $config);
                if (!$this->upload->do_upload('fotop')) {
					redirect('cmember');
                } else {
					$this->mmember->UpdateMem();
					$this->mmember->upFoto($fotop);
					redirect('cmember');
					
				}
			}
		}
	}
}
?>