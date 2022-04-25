<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing all blog
	public function listing()
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->group_by('blog.id_blog');
		$this->db->order_by('id_blog', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//listing all blog home
	public function home()
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->where('blog.status_blog', 'Publish');
		$this->db->group_by('blog.id_blog');
		$this->db->order_by('id_blog', 'desc');
		$this->db->limit(12);
		$query=$this->db->get();
		return $query->result();
	}

	//Read Blog
	public function read($slug_blog)
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
						');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->where('blog.status_blog', 'Publish');
		$this->db->where('blog.slug_blog', $slug_blog);
		$this->db->group_by('blog.id_blog');
		$this->db->order_by('id_blog', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	//Blog
	public function blog($limit,$start)
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
						');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->where('blog.status_blog', 'Publish');
		$this->db->group_by('blog.id_blog');
		$this->db->order_by('id_blog', 'desc');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}

	//total blog
	public function total_blog()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('blog');
		$this->db->where('status_blog', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

		//kategori Blog
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->where('blog.status_blog', 'Publish');
		$this->db->where('blog.id_kategori', $id_kategori);
		$this->db->group_by('blog.id_blog');
		$this->db->order_by('id_blog', 'desc');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result();
	}

	//total kategori blog
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('blog');
		$this->db->where('status_blog', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	//listing kategori
	public function listing_kategori()
	{
		$this->db->select('blog.*,
							admin.nama,
							kategori.nama_kategori,
							kategori.slug_kategori,
							');
		$this->db->from('blog');
		//join
		$this->db->join('admin', 'admin.id_admin = blog.id_admin', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori', 'left');
		//end join
		$this->db->group_by('blog.id_kategori');
		$this->db->order_by('id_blog', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//Detail blog
	public function detail($id_blog)
	{
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('id_blog', $id_blog);
		$this->db->order_by('id_blog', 'desc');
		$query=$this->db->get();
		return $query->row();
	}

	


	// Tambah
	public function tambah($data)
	{
		$this->db->insert('blog', $data);
	}

	// Tambah gambar
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	//edit blog
	public function edit($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->update('blog',$data);

	}
	//delete blog
	public function delete($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->delete('blog',$data);

	}

	//delete gambar
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar',$data);

	}

}

/* End of file Blog_model.php */
/* Location: ./application/models/Blog_model.php */