<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_barang extends CI_Model{
	
	function show_barang(){
		$hasil=$this->db->query("SELECT * FROM tbl_barang");
		return $hasil;
	}

	function simpan_barang($kode_barang,$nama_barang,$deskripsi,$stok,$harga,$berat){
		$hasil=$this->db->query("INSERT INTO tbl_barang (kode,nama,deskripsi,stok,harga,berat) VALUES ('$kode_barang','$nama_barang','$deskripsi','$stok','$harga','$berat')");
		return $hasil;
	}

	function edit_barang($kode_barang,$nama_barang,$deskripsi,$stok,$harga,$berat){
		$hasil=$this->db->query("UPDATE tbl_barang SET nama='$nama_barang',deskripsi='$deskripsi',stok='$stok',harga='$harga',berat='$berat' WHERE kode='$kode_barang'");
		return $hsl;
	}
	
}

/* End of file M_barangs.php */
