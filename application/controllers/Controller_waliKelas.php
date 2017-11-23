<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_waliKelas extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('Model_waliKelas');
		$this->load->library('session');
	}

	public function tampilWaliKelasAktif(){
		$data = $this->Model_waliKelas->tampilWaliKelasAktif();
		$param = array(
			'data'			=> $data,
		);
		$this->load->view('headerAdmin');
		$this->load->view('AWaliKelasAktif', $param);//TampilWaliKelas
		$this->load->view('footer');
	}

	public function tampilWaliKelasTidakAktif(){
		$data = $this->Model_waliKelas->tampilWaliKelasTidakAktif();
		$param = array(
			'data'			=> $data,
		);
		$this->load->view('headerAdmin');
		$this->load->view('AWaliKelasTidakAktif', $param);//TampilWaliKelasTidakAktif
		$this->load->view('footer');
	}

	public function nonaktifkanAkunWaliKelas($id){ //di dppl kurang ($id)
		$this->Model_waliKelas->nonaktifkanAkunWaliKelas($id);

		$this->tampilWaliKelasAktif();
	}

	public function ambilDataWaliKelas($id){ //di dppl kurang ($id)
		$this->Model_waliKelas->ambilDataWaliKelas($id);
		
		$this->load->view('headerAdmin');
		$this->load->view('UbahDataWaliKelas'); //Belum front endnya
		$this->load->view('footer');
	}

	public function ubahDataWaliKelas(){ 
		$this->Model_waliKelas->ubahDataWaliKelas($id, $data, $tabel);
		
		$this->load->view('headerAdmin');
		$this->load->view('UbahDataWaliKelas'); //Belum front endnya
		$this->load->view('footer');
	}

	public function tambahAkunaWaliKelas(){
		$this->Model_waliKelas->tambahAkunaWaliKelas($data, $tabel);
		
		$this->load->view('headerAdmin');
		$this->load->view('dashboardAdmin');
		$this->load->view('footer');
	}
}
