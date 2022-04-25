<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all produk
	public function listing()
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->group_by('produk.kode_produk');
		$this->db->order_by('kode_produk', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//listing all produk home
	public function home()
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.kode_produk');
		$this->db->order_by('kode_produk', 'desc');
		$this->db->limit(12);
		$query=$this->db->get();
		return $query->result();
	}

	//Read Produk
	public function read($slug_produk)
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.kode_produk)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.kode_produk');
		$this->db->order_by('kode_produk', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Produk
	public function produk($limit,$start)
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.kode_produk');
		$this->db->order_by('kode_produk', 'desc');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}

	//total produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

		//kategori Produk
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.kode_produk');
		$this->db->order_by('kode_produk', 'desc');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}

	//total kategori produk
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	//listing kategori
	public function listing_kategori()
	{
		$this->db->select('produk.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar)AS total_gambar');
		$this->db->from('produk');
		//join
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.kode_produk = produk.kode_produk', 'left');
		//end join
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('kode_produk', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//Detail produk
	public function detail($kode_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kode_produk', $kode_produk);
		$this->db->order_by('kode_produk', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Detail gambar
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//gambar
	public function gambar($kode_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('kode_produk', $kode_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query=$this->db->get();
		return $query->result();
	}


	// Tambah
	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}

	// Tambah gambar
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	//edit produk
	public function edit($data)
	{
		$this->db->where('kode_produk', $data['kode_produk']);
		$this->db->update('produk',$data);

	}
	//delete produk
	public function delete($data)
	{
		$this->db->where('kode_produk', $data['kode_produk']);
		$this->db->delete('produk',$data);

	}

	//delete gambar
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar',$data);

	}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */