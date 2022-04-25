<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing transaksi berdasarkan status bayar 'konfirmasi'
	public function listing()
	{
		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							transaksi.tanggal_pernikahan,
							transaksi.tanggal_transaksi,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		//end join
		$this->db->where('pembayaran.status_bayar', 'Konfirmasi');
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	public function order()
	{
		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							transaksi.tanggal_pernikahan,
							transaksi.tanggal_transaksi,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		//end join
		$this->db->where('pembayaran.status_bayar', 'belum');
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//listing transaksi berdasarkan status bayar 'selesai'
	public function transaksi_selesai()
	{
		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							transaksi.tanggal_pernikahan,
							transaksi.kode_produk,
							transaksi.tanggal_transaksi,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		//end join
		$this->db->where('pembayaran.status_bayar', 'Selesai');
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//filter view transaksi selesai
	public function filter_transaksi($daterange){

		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							transaksi.tanggal_transaksi,
							transaksi.tanggal_pernikahan,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		
		$this->db->where('tanggal_pernikahan >=', $daterange[0]);
		$this->db->where('tanggal_pernikahan <=', $daterange[1]);
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		//end join
		$this->db->where('pembayaran.status_bayar', 'Konfirmasi');
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//filter view transaksi selesai
	public function filter_transaksi_selesai($daterange){

		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							transaksi.tanggal_transaksi,
							transaksi.tanggal_pernikahan,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		$this->db->where('tanggal_pernikahan >=', $daterange[0]);
		$this->db->where('tanggal_pernikahan <=', $daterange[1]);
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		//end join
		$this->db->where('pembayaran.status_bayar', 'Selesai');
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}


	//listing all transaksi dari dashboard pelanggan
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('pembayaran.*,
							transaksi.tanggal_pernikahan,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		$this->db->where('pembayaran.id_pelanggan', $id_pelanggan);
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		//end join
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//konfirmasi_pembayaran
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('pembayaran.*,
							pelanggan.nama_pelanggan,
							rekening.nama_bank AS bank,
							rekening.no_rekening,
							rekening.nama_pemilik,
							transaksi.tanggal_pernikahan,
							transaksi.tanggal_transaksi,
						SUM(transaksi.jumlah) AS total_item');
		$this->db->from('pembayaran');
		//join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = pembayaran.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan', 'left');
		$this->db->join('rekening', 'rekening.no_rekening = pembayaran.no_rekening', 'left');
		//end join
		$this->db->group_by('pembayaran.kode_pembayaran');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Detail konfirmasi pembayaran
	public function detail($kode_pembayaran)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('kode_pembayaran', $kode_pembayaran);
		$this->db->order_by('kode_pembayaran', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('pembayaran', $data);
	}

	//edit pembayaran
	public function edit($data)
	{
		$this->db->where('kode_pembayaran', $data['kode_pembayaran']);
		$this->db->update('pembayaran',$data);

	}
	//delete pembayaran
	public function delete($data)
	{
		$this->db->where('kode_pembayaran', $data['kode_pembayaran']);
		$this->db->delete('pembayaran',$data);

	}

	//hapus transaksi admin/dashbord
	public function hapus($data)
	{
		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->delete('pembayaran',$data);

	}

}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */