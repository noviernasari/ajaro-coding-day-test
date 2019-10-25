<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Barang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}
	
	function index(){
		$x['data']=$this->m_barang->show_barang();
		$this->load->view('v_barang',$x);
	}

	function simpan_barang(){
		$kode_barang=$this->input->post('kode_barang');
		$nama_barang=$this->input->post('nama_barang');
        $deskripsi=$this->input->post('deskripsi');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');
        $berat=$this->input->post('berat');
		$this->m_barang->simpan_barang($kode_barang,$nama_barang,$deskripsi,$stok,$harga,$berat);
		redirect('barang');
	}

	function edit_barang(){
		$kode_barang=$this->input->post('kode_barang');
		$nama_barang=$this->input->post('nama_barang');
        $deskripsi=$this->input->post('deskripsi');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');
        $berat=$this->input->post('berat');
		$this->m_barang->edit_barang($kode_barang,$nama_barang,$deskripsi,$stok,$harga,$berat);
		redirect('barang');
    }
    function delete($barang_id)
    {
        $this->db->where('kode', $barang_id);
        $this->db->delete('tbl_barang');
        redirect('barang'); 
    }
}


/* End of file Barang.php */
