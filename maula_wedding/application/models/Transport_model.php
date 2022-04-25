<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all transport
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('transport');
		$this->db->order_by('id_transport','asc');
		$query=$this->db->get();
		return $query->result();
	}
	

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('transport', $data);
	}

	//edit transport
	public function edit($data)
	{
		$this->db->where('id_transport', $data['id_transport']);
		$this->db->update('transport',$data);

	}
	//delete transport
	public function delete($data)
	{
		$this->db->where('id_transport', $data['id_transport']);
		$this->db->delete('transport',$data);

	}
	//Detail produk
	public function detail($id_transport)
	{
		$this->db->select('*');
		$this->db->from('transport');
		$this->db->where('id_transport', $id_transport);
		$this->db->order_by('id_transport', 'desc');
		$query=$this->db->get();
		return $query->row();
	}
}

/* End of file Transport_model.php */
/* Location: ./application/models/Transport_model.php */