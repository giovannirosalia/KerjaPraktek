<?php

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper('form');
		$this->load->helper('url'); 
		$this->load->model('tatib_model');
		$this->load->library('session');
	}
	
	public function index()
	{
		$data['error'] = "";
		$this->session->unset_userdata('username_aktif');
		$this->session->unset_userdata('jenis_aktif');
		$this->load->view('pageLogin',$data);
	}
	
	public function pageLogin()
	{
		if($this->input->post("btnLogin")) {
			$username = $this->input->post("txtusername");
			$password = $this->input->post("txtpassword");
			$respon = $this->tatib_model->cek_login($username, $password);
			
			if ($respon == 'masuk')
			{
				$jenis = $this->tatib_model->get_jenis($username);
				$this->session->set_userdata('username_aktif',$username);
				$this->session->set_userdata('jenis_aktif', $jenis);
				
				$data['kodeKategori'] = $this->tatib_model->get_last_kodeKategori();
				$data['qryKategori'] = $this->tatib_model->select_all_kategori();
				$this->load->view('masterKategori', $data);
			} else if ($respon == 'gagal')
			{
				$data['error'] = "Username atau Password salah";
				$this->load->view('pageLogin', $data);
			}
		}
	}
	
	public function dashboard($pilih)
	{
		if($pilih == 1) {
			$data['kodeKategori'] = $this->tatib_model->get_last_kodeKategori();
			$data['qryKategori'] = $this->tatib_model->select_all_kategori();
			$this->load->view('masterKategori', $data);
		} else if($pilih == 2) {
			$data['qryKategori'] = $this->tatib_model->select_all_kategori();
			$data['kodePeraturan'] = $this->tatib_model->get_last_kodePeraturan();
			$data['qryPeraturan'] = $this->tatib_model->select_all_peraturan();
			$this->load->view('masterPeraturan', $data);
		} else if($pilih == 3) {
			$this->load->view('masterSiswa');
		} else if($pilih == 4) {
			$data['qryMember'] = $this->tatib_model->select_all_member();
			$this->load->view('masterMember', $data);
		} else if($pilih == 5) {
			$data['qryPeraturan'] = $this->tatib_model->select_all_peraturan();
			$this->load->view('pencatatanPelanggaran',$data);
		}
	}
	
	public function masterKategori()
	{
		if($this->input->post("btnSimpanKategori")) {
			$kodeKategori = $this->input->post("txtkodekategori");
			$namaKategori = $this->input->post("txtnamakategori");
			$isContinue = 0;
			if($this->input->post("isContinue")) {
				$isContinue = 1;
			}
			
			$this->tatib_model->insert_Kategori($kodeKategori, $namaKategori, $isContinue);
			
			$data['kodeKategori'] = $this->tatib_model->get_last_kodeKategori();
			$data['qryKategori'] = $this->tatib_model->select_all_kategori();
			$this->load->view('masterKategori', $data);
		} else if($this->input->post("gotoDashboard")) {
			$this->load->view('dashboard');
		} else if($this->input->post("btnLogout")) {
			$this->session->unset_userdata('username_aktif');
			$this->session->unset_userdata('jenis_aktif');
			$data['error'] = "";
			$this->load->view('pageLogin',$data);
		}
	}
	
	public function masterMember()
	{
		if($this->input->post("btnSimpanMember")) {
			$username = $this->input->post("txtusername");
			$nama = $this->input->post("txtnama");
			$jenis = $this->input->post("cbjenis");
			
			$this->tatib_model->insert_Member($username, $username, $nama, $jenis);
			
			$data['qryMember'] = $this->tatib_model->select_all_member();
			$this->load->view('masterMember', $data);
		} else if($this->input->post("gotoDashboard")) {
			$this->load->view('dashboard');
		} else if($this->input->post("btnLogout")) {
			$this->session->unset_userdata('username_aktif');
			$this->session->unset_userdata('jenis_aktif');
			$data['error'] = "";
			$this->load->view('pageLogin',$data);
		}
	}
	
	public function masterPeraturan()
	{
		if($this->input->post("btnSimpanPeraturan")) {
			$kodePeraturan = $this->input->post("txtkodeperaturan");
			$kodeKategori = $this->input->post("cbkategori");
			$namaPeraturan = $this->input->post("txtnamaperaturan");
			$poin = $this->input->post("txtpoin");
			$sp = $this->input->post("txtsp");
			$keterangan = $this->input->post("txtketerangan");
			
			$this->tatib_model->insert_Peraturan($kodePeraturan, $kodeKategori, $namaPeraturan, $poin, $sp, $keterangan);
			
			$data['qryKategori'] = $this->tatib_model->select_all_kategori();
			$data['kodePeraturan'] = $this->tatib_model->get_last_kodePeraturan();
			$data['qryPeraturan'] = $this->tatib_model->select_all_peraturan();
			$this->load->view('masterPeraturan', $data);
		} else if($this->input->post("gotoDashboard")) {
			$this->load->view('dashboard');
		} else if($this->input->post("btnLogout")) {
			$this->session->unset_userdata('username_aktif');
			$this->session->unset_userdata('jenis_aktif');
			$data['error'] = "";
			$this->load->view('pageLogin',$data);
		}
	}
	
	public function pencatatanPelanggaran()
	{
		if($this->input->post("btnCatatPelanggaran")) {
			
		} else if($this->input->post("btnBack")) {
			$data['qryPeraturan'] = $this->tatib_model->select_all_peraturan();
			$this->load->view('pencatatanPelanggaran', $data);
		} else if($this->input->post("gotoDashboard")) {
			$this->load->view('dashboard');
		} else if($this->input->post("btnLogout")) {
			$this->session->unset_userdata('username_aktif');
			$this->session->unset_userdata('jenis_aktif');
			$data['error'] = "";
			$this->load->view('pageLogin',$data);
		} else if($this->input->post("btnChoose")) {
			
		}
	}
	
	public function insertpelanggaran($kodeperaturan) {
		$data['username'] = $this->session->userdata('username_aktif');
		$data['qryPeraturan'] = $this->tatib_model->ambil_peraturan($kodeperaturan);
		$data['qrySiswa'] = $this->tatib_model->select_all_siswa();
		$this->load->view('pencatatanPelanggaran2',$data);
	}
	public function pilihsiswa() {
		$nomor = $this->input->post('nomor'); 
		$qry   = $this->tatib_model->get_siswa($nomor); 
		foreach($qry->result() as $row) {
			echo $row->nomor_induk."-".$row->nama."-".$row->kelas."-".$row->absen;
		}
	}
}
?>
