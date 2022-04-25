<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('kategori_model');
		//proteksi halaman
		$this->login_admin->cek_login();

	}
	//data blog
	public function index()
	{
		$blog=$this->blog_model->listing();
		$data=array('title'  =>'Postingan Blog',
					'blog'	 =>$blog,
					'isi'    =>'admin/blog/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	//Tambah blog
	public function tambah()
	{
		//data kategori
		$kategori = $this->kategori_model->listing();

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('judul_blog','Judul blog','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('deskripsi','Deskripsi','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()){
			$config['upload_path']	 	= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size'] 	 	= '2400'; // dalam kb
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
						
		
		//end validasi
		$data=array('title'		=>'Tambah Blog',
					'kategori'	=> $kategori,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/blog/tambah');

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			//create tumbnail gambar
			$config['image_library']  = 'gd2';
			$config['source_image']   = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']      ='./assets/upload/image/thumbs/';
			$config['create_thumb']   = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 250; //pixel
			$config['height']         = 250; //pixel
			$config['thumb_marker']	  = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end create thumbnail

			$i=$this->input;
			//SLUG PRODUK
			$slug_blog = url_title($this->input->post('id_kategori').'-'.$this->input->post('judul_blog'), 'dash', TRUE);
			$data = array ( 'id_admin'		 =>$this->session->userdata('id_admin'),
							'id_kategori'    => $i->post('id_kategori'),
							'judul_blog'	 => $i->post('judul_blog'),
							'deskripsi'  	 => $i->post('deskripsi'),
							'slug_blog'  	 => $slug_blog,
							'keterangan'     => $i->post('keterangan'),
							'keywords' 		 => $i->post('keywords'),
							//disimpan nama file gambar
							'gambar' 		 => $upload_gambar['upload_data']['file_name'],
							'status_blog'    => $i->post('status_blog'),
							'tanggal_post' 	 => date('Y-m-d H:i:s'));
			
			$this->blog_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah ditambah');
			redirect(base_url('admin/blog'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Tambah Blog',
					'kategori'	=> $kategori,
					'isi'   	=>'admin/blog/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit blog
	public function edit($id_blog)
	{
			//data kategori
		$kategori = $this->kategori_model->listing();
		//ambli data blog yang akan diedit
		$blog=$this ->blog_model->detail($id_blog);

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('judul_blog','Judul blog','required',
		 array( 'required'  =>'%s harus diisi'));
		
		$valid->set_rules('deskripsi','Deskripsi','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()){
			//check jika gambar di ganti
			if(! empty($_FILES['gambar']['name'])){
			$config['upload_path']	 	= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size'] 	 	= '2400'; // dalam kb
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
						
		
		//end validasi
		$data=array('title'		=>'Edit Blog: '.$blog->judul_blog,
					'blog'		=>$blog,
					'kategori'	=> $kategori,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/blog/edit');

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			//create tumbnail gambar
			$config['image_library']  = 'gd2';
			$config['source_image']   = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']      ='./assets/upload/image/thumbs/';
			$config['create_thumb']   = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']          = 250; //pixel
			$config['height']         = 250; //pixel
			$config['thumb_marker']	  = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end create thumbnail

			$i=$this->input;
			//SLUG PRODUK
			$slug_blog = url_title($this->input->post('id_kategori').'-'.$this->input->post('judul_blog'), 'dash', TRUE);
			$data = array ( 'id_blog'		=>$id_blog,
							'id_kategori'   => $i->post('id_kategori'),
							'judul_blog'  	 => $i->post('judul_blog'),
							'deskripsi'  	 => $i->post('deskripsi'),
							'slug_blog'   	=> $slug_blog,
							'keterangan'    => $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							//disimpan nama file gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'status_blog' => $i->post('status_blog'),
							'tanggal_post' 	=> date('Y-m-d H:i:s'));
			
			$this->blog_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diedit');
			redirect(base_url('admin/blog'),'refresh');
		}}else{
			//edit blog tanpa ganti gambar
			$i=$this->input;
			//SLUG PRODUK
			$slug_blog = url_title($this->input->post('id_kategori').'-'.$this->input->post('judul_blog'), 'dash', TRUE);
			$data = array ( 'id_blog'		=>$id_blog,
							'id_kategori'   => $i->post('id_kategori'),
							'judul_blog' 	 => $i->post('judul_blog'),
							'deskripsi'  	 => $i->post('deskripsi'),
							'slug_blog'  	 => $slug_blog,
							'keterangan'    => $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							//disimpan nama file gambar
							//'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'status_blog' => $i->post('status_blog'));
			
			$this->blog_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diedit');
			redirect(base_url('admin/blog'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Edit Blog '.$blog->judul_blog,
					'kategori'	=> $kategori,
					'blog'		=>	$blog,
					'isi'   	=>'admin/blog/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}
		
		//delete blog
	public function delete ($id_blog)
	{

		//proses hapus gambar
		$blog =$this->blog_model->detail($id_blog);
		unlink('./assets/upload/image/'.$blog->gambar);
		unlink('./assets/upload/image/thumbs/'.$blog->gambar);

		//end proses hapus
	$data = array ('id_blog'  => $id_blog);

	$this->blog_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/blog'),'refresh');
	}

// delete gambar
	public function delete_gambar ($id_blog,$id_gambar)
	{

		//proses hapus gambar
		$gambar =$this->blog_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

		//end proses hapus
	$data = array ('id_gambar'  => $id_gambar);

	$this->blog_model->delete_gambar($data);
	$this->session->set_flashdata('sukses', 'data gambar telah dihapus');
	redirect(base_url('admin/blog/gambar/'.$id_blog),'refresh');
	}
}

/* End of file produk.php */
/* Location: ./application/controllers/admin/produk.php */