<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cjurusan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('mjurusan');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['jurusan'] = $this->mjurusan->viewJur();
		$data['kode'] = $this->mjurusan->auto();
		$this->load->view('jurusan/index',$data);
	}

	public function insert(){
		$this->form_validation->set_rules('kj','Kode Jurusan', 'required');
		$this->form_validation->set_rules('nj','Nama Jurusan', 'required');
		$this->form_validation->set_rules('kelas','Kelas', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['kode'] = $this->mjurusan->auto();
			$this->session->set_flashdata('kosong','Kosong');
			redirect('cjurusan');			
		}
		else{
			$this->mjurusan->addJur();
			$this->session->set_flashdata('berhasil','Berhasil');
			redirect('cjurusan');
		}
	}

	public function update(){
		$this->form_validation->set_rules('kj','Kode Jurusan', 'required');
		$this->form_validation->set_rules('nj','Nama Jurusan', 'required');
		$this->form_validation->set_rules('kelas','Kelas', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('kosong','Kosong');
			redirect('cjurusan');
		}
		else{
			$this->mjurusan->upJur();
			$this->session->set_flashdata('berhasil','Berhasil');
			redirect('cjurusan');
		}
	}

	public function delete($id){
		$this->mjurusan->delJur($id);
		redirect('cjurusan');
	}
}
