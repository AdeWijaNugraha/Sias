<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_siswa extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('Model_siswa');
		$this->load->library('session');
	}

	public function tampilSiswaAktif(){
		$data = $this->Model_siswa->tampilSiswaAktif();
		$param = array(
			'data' 	=> $data,
		);

		$this->load->view('headerAdmin');
		$this->load->view('ASiswaAktif', $param);//TampilSiswa
		$this->load->view('footer');
	}

	public function tampilSiswaTidakAktif(){
		$data = $this->Model_siswa->tampilSiswaTidakAktif();
		$param = array(
			'data' 	=> $data,
		);

		$this->load->view('headerAdmin');
		$this->load->view('ASiswaTidakAktif', $param);//TampilSiswaTidakAktif
		$this->load->view('footer');
	}

	public function nonaktifkanAkunSiswa($id){ //di dppl kurang ($id)
		$this->Model_siswa->nonaktifkanAkunSiswa($id);

		$this->tampilSiswaAktif();
	}

	public function ambilDataSiswa($id){ //di dppl kurang ($id)
		$data = $this->Model_siswa->ambilDataSiswa($id);
		$param = array(
			'data' 	=> $data,
		);

		$this->load->view('headerAdmin');
		$this->load->view('ABiodataSiswa', $param); //UbahDataSiswa
		$this->load->view('footer');
	}

	public function ubahDataSiswa(){ 

		$config['upload_path'] = './uploads/';
		$config['file_name']   = 'foto';
		$config['allowed_types']  = 'jpeg|gif|jpg|png';
 
		$this->load->library('upload', $config);

		$file_name = "";

		$this->upload->initialize($config);

		if ( $this->upload->do_upload('avatar')){
			$data = $this->upload->data();
			$file_name = $data['file_name'];
		}else{
			var_dump($this->upload->display_errors());
		}

		$tabel = 'siswa';
		
		$id = $this->input->post('id');

		$data = array(
			'nama_siswa'		=> $this->input->post('nama'),
			'nis'				=> $this->input->post('nis'),
			'jenis_kelamin'		=> $this->input->post('jk'),
			'password'			=> $this->input->post('password'),
			'foto'				=> $file_name
		);

		$this->Model_siswa->ubahDataSiswa($id, $data, $tabel);

		$this->tampilSiswaAktif(); //Beda sama kyk yg di dppl, ganti dppl
	}

	public function tambahAkunaSiswa(){
		$this->Model_siswa->tambahAkunaSiswa($data, $tabel);
		
		$this->load->view('headerAdmin');
		$this->load->view('dashboardAdmin');
		$this->load->view('footer');
	}
}