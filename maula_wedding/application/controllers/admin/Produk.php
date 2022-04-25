<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		//proteksi halaman
		$this->login_admin->cek_login();

	}
	//data produk
	public function index()
	{
		$produk=$this->produk_model->listing();
		$data=array('title'  =>'Data Produk',
					'produk' =>$produk,
					'isi'    =>'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//gambar
	public function gambar ($kode_produk)
	{
		$produk 	=$this->produk_model->detail($kode_produk);
		$gambar 	=$this->produk_model->gambar($kode_produk);

		// validasi input gambar
		$valid = $this ->form_validation;

		$valid->set_rules('judul_gambar','Judul/Nama gambar','required',
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
		$data=array('title'		=>'Tambah Gambar Produk: '.$produk->nama_produk,
					'produk'	=> $produk,
					'gambar'	=> $gambar,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/produk/gambar');

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
		
			$data = array ( 'kode_produk'		=>$kode_produk,
							'judul_gambar' 		  => $i->post('judul_gambar'),
							//disimpan nama file gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name']);
			
			$this->produk_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses', 'gambar telah ditambahkan');
			redirect(base_url('admin/produk/gambar/'.$kode_produk),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Tambah Gambar Produk: '.$produk->nama_produk,
					'produk'	=> $produk,
					'gambar'	=> $gambar,
					'isi'   	=>'admin/produk/gambar');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah produk
	public function tambah()
	{
		//data kategori
		$kategori = $this->kategori_model->listing();

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('kode_produk','Kode produk','required|is_unique[produk.kode_produk]',
		 array( 'required'  =>'harus diisi',
				'is_unique'	=>'sudah ada. buat kode produk baru'));

		$valid->set_rules('nama_produk','Nama produk','required',
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
		$data=array('title'		=>'Tambah Produk',
					'kategori'	=> $kategori,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/produk/tambah');

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
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array ( 
							'kode_produk'   => $i->post('kode_produk'),
							'id_kategori'   => $i->post('id_kategori'),
							'nama_produk'   => $i->post('nama_produk'),
							'slug_produk'   => $slug_produk,
							'keterangan'    => $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga' 		=> $i->post('harga'),
							//disimpan nama file gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'status_produk' => $i->post('status_produk'),
							'tanggal_post' 	=> date('Y-m-d H:i:s'));
			
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Tambah Produk',
					'kategori'	=> $kategori,
					'isi'   	=>'admin/produk/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit produk
	public function edit($kode_produk)
	{
		//ambli data produk yang akan diedit
		$produk=$this ->produk_model->detail($kode_produk);

		//data kategori
		$kategori = $this->kategori_model->listing();

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama_produk','Nama produk','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('kode_produk','Kode produk','required',
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
		$data=array('title'		=>'Edit Produk : '. $produk->nama_produk,
					'kategori'	=> $kategori,
					'produk'	=>$produk,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/produk/edit');

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
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array ( 'kode_produk'   => $i->post('kode_produk'),
							'id_kategori'   => $i->post('id_kategori'),
							'nama_produk'   => $i->post('nama_produk'),
							'slug_produk'   => $slug_produk,
							'keterangan'    => $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga' 		=> $i->post('harga'),
							//disimpan nama file gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'status_produk' => $i->post('status_produk'));
			
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}}else{
			//edit produk tanpa ganti gambar
			$i=$this->input;
			//SLUG PRODUK
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array ( 'kode_produk'   => $i->post('kode_produk'),
							'id_kategori'   => $i->post('id_kategori'),
							'nama_produk'   => $i->post('nama_produk'),
							'slug_produk'   => $slug_produk,
							'keterangan'    => $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga' 		=> $i->post('harga'),
							//disimpan nama file gambar
							//'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'status_produk' => $i->post('status_produk'));
			
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Edit Produk : '.$produk->nama_produk,
					'kategori'	=> $kategori,
					'produk'	=>$produk,
					'isi'   	=>'admin/produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}
		
		//delete produk
	public function delete ($kode_produk)
	{

		//proses hapus gambar
		$produk =$this->produk_model->detail($kode_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);

		//end proses hapus
	$data = array ('kode_produk'  => $kode_produk);

	$this->produk_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/produk'),'refresh');
	}

// delete gambar
	public function delete_gambar ($kode_produk,$id_gambar)
	{

		//proses hapus gambar
		$gambar =$this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

		//end proses hapus
	$data = array ('id_gambar'  => $id_gambar);

	$this->produk_model->delete_gambar($data);
	$this->session->set_flashdata('sukses', 'data gambar telah dihapus');
	redirect(base_url('admin/produk/gambar/'.$kode_produk),'refresh');
	}
}

/* End of file produk.php */
/* Location: ./application/controllers/admin/produk.php */