<?php
class tatib_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function cek_login($username, $password) {
		$qry = $this->db->query("select * from member where username = '".$username."' and password = '".$password."'");
		$jum = $qry->num_rows();
		
		if($jum == 1)
		{
			return "masuk";
		} else
		{
			return "gagal";
		}
	}
	
	public function get_jenis($username) {
		$jenis = "";
		$qry = $this->db->query("select jenis from member where username = '".$username."'");
		
		foreach($qry->result() as $row)
		{
			$jenis = $row->jenis;
		}
		return $jenis;
	}
	
	public function insert_Kategori($kodeKategori, $namaKategori, $isContinue) {
		$this->db->query("insert into kategori values ('".$kodeKategori."',UPPER('".$namaKategori."'),".$isContinue.")");
	}
	
	public function insert_Member($username, $password, $nama, $jenis) {
		$this->db->query("insert into member values ('".$username."', '".$password."',UPPER('".$nama."'),'".$jenis."')");
	}
	
	public function insert_Peraturan($kodePeraturan, $kodeKategori, $namaPeraturan, $poin, $sp, $keterangan) {
		$this->db->query("insert into peraturan values ('".$kodePeraturan."','".$kodeKategori."',UPPER('".$namaPeraturan."'),".$poin.",".$sp.",UPPER('".$keterangan."'))");
	}
	
	public function get_last_kodePeraturan() {
		$qry = $this->db->query("select * from peraturan");
		$jum = $qry->num_rows();
		
		if($jum > 0)
		{
			$qry = $this->db->query("select max(kode) as nomer from peraturan");
			foreach ($qry->result() as $rowmax){
				$max = $rowmax->nomer;
			}
			$max = substr($max,1,3);
			$max = intval($max)+1;
			
			if ($max < 10) {
				$max = "P00".$max;
			} else if ($max < 100) {
				$max = "P0".$max;
			}  else if ($max < 1000) {
				$max = "P".$max;
			}
			
			return $max;
		} else
		{
			$kodePeraturan = "P001";
			return $kodePeraturan;
		}
	}
	
	public function select_all_siswa() {
		$qry = $this->db->query("select * from siswa");
		return $qry;
	}
	
	public function get_siswa($nomor) {
		$qry = $this->db->query("select * from siswa where nomor_induk = '$nomor'");
		return $qry;
	}
	
	public function select_all_member() {
		$qry = $this->db->query("select * from member");
		return $qry;
	}
	
	public function select_all_peraturan() {
		$qry = $this->db->query("select peraturan.*, kategori.nama as namakategori from peraturan, kategori where peraturan.kode_kategori = kategori.kode");
		return $qry;
	}
	
	public function get_last_kodeKategori() {
		$qry = $this->db->query("select * from kategori");
		$jum = $qry->num_rows();
		
		if($jum > 0)
		{
			$qry = $this->db->query("select max(kode) as nomer from kategori");
			foreach ($qry->result() as $rowmax){
				$max = $rowmax->nomer;
			}
			$max = substr($max,1,3);
			$max = intval($max)+1;
			
			if ($max < 10) {
				$max = "K00".$max;
			} else if ($max < 100) {
				$max = "K0".$max;
			}  else if ($max < 1000) {
				$max = "K".$max;
			}
			
			return $max;
		} else
		{
			$kodepokemon = "K001";
			return $kodepokemon;
		}
	}
	
	public function ambil_peraturan($kode) {
		$qry = $this->db->query("select peraturan.*, kategori.nama as namakategori from peraturan, kategori where peraturan.kode ='".$kode."' and peraturan.kode_kategori = kategori.kode");
		return $qry;
	}
	
	public function select_all_kategori() {
		$qry = $this->db->query("select * from kategori");
		return $qry;
	}
}
?>