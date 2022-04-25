<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all rekening
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('no_rekening', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//Detail rekening
	public function detail($no_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('no_rekening', $no_rekening);
		$this->db->order_by('no_rekening', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Detail slug rekening
	public function read($slug_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('slug_rekening', $slug_rekening);
		$this->db->order_by('no_rekening', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Login rekening
	public function login($rekeningname,$password)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where(array('rekeningname'   => $rekeningname,
							   'password'    => SHA1($password)));
		$this->db->order_by('no_rekening', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('rekening', $data);
	}

	//edit rekening
	public function edit($data)
	{
		$this->db->where('no_rekening', $data['no_rekening']);
		$this->db->update('rekening',$data);

	}
	//delete rekening
	public function delete($data)
	{
		$this->db->where('no_rekening', $data['no_rekening']);
		$this->db->delete('rekening',$data);

	}
}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */