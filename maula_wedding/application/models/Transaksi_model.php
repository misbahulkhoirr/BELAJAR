<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all transaksi
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//listing all transaksi berdasarkan kode_transaksi
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('transaksi.*,
							produk.nama_produk,
							produk.kode_produk');
		$this->db->from('transaksi');
		//join dengan dengan produk
		$this->db->join('produk', 'produk.kode_produk = transaksi.kode_produk', 'left');
		//end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	 //Detail transaksi
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
 		$this->db->order_by('id_transaksi', 'desc');
 		$query=$this->db->get();
	 	return $query->row();
	 }

	

	//Login transaksi
	public function login($transaksiname,$password)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where(array('transaksiname'   => $transaksiname,
							   'password'  		 => SHA1($password)));
		$this->db->order_by('id_transaksi', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('transaksi', $data);
	}

	//edit transaksi
	public function edit($data)
	{
		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->update('transaksi',$data);

	}
	//delete transaksi
	public function hapus($data)
	{	
		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->delete('transaksi',$data);

	}

	//listing laporan penjualan
	public function laporan()
	{
		$this->db->select('transaksi.*,
							pelanggan.nama_pelanggan,
							produk.nama_produk');
		$this->db->from('transaksi');
		//join dengan dengan produk
		$this->db->join('produk', 'produk.kode_produk = transaksi.kode_produk', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
		//end join
		$this->db->group_by('transaksi.id_transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//filter view laporan penjualan
	public function filter_laporan($daterange){

		$this->db->select('transaksi.*,
							pelanggan.nama_pelanggan,
							produk.nama_produk');
		$this->db->from('transaksi');
		//$this->db->like('tanggal_pernikaha', $tanggal_awal);
		$this->db->where('tanggal_transaksi >=', $daterange[0]);
		$this->db->where('tanggal_transaksi <=', $daterange[1]);
		//join
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
		$this->db->join('produk', 'produk.kode_produk = transaksi.kode_produk', 'left');
		//end join
		$this->db->group_by('transaksi.id_transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */