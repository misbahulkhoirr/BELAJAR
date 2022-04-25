<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekening_model');
		//proteksi halaman
		$this->login_admin->cek_login();

	}
	//data rekening
	public function index()
	{
		$rekening=$this->rekening_model->listing();
		$data=array('title'  	=>'Data Rekening',
					'rekening'   =>$rekening,
					'isi'  	  =>'admin/rekening/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah rekening
	public function tambah()
	{
		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama_bank','Nama Rekening','required',
		 array( 'required'  =>'%s harus diisi',));

		$valid->set_rules('nama_pemilik','Nama Pemilik Rekening','required',
		 array( 'required'  =>'%s harus diisi',));

		$valid->set_rules('no_rekening','No. Rekening','required|is_unique[rekening.no_rekening]',
		 array( 'required'  =>'%s harus diisi',
		 	'is_unique'		=>'%$ sudah ada, Buat No.Rekening baru !'));

		if($valid->run()){
			$config['upload_path']	 	= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size'] 	 	= '2400'; // dalam kb
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
						
		
		//end validasi
		$data=array('title'		=>'Tambah Rekening',
					'rekening'	=> $rekening,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/rekening/tambah');

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
			$data = array ( 'nama_bank'         	=> $i->post('nama_bank'),
							'no_rekening'      		=> $i->post('no_rekening'),
							'nama_pemilik'  		=> $i->post('nama_pemilik'),
							'gambar' 				=> $upload_gambar['upload_data']['file_name'],
							);

			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data berhasil di tambah');
			redirect(base_url('admin/rekening'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Tambah Rekening',
					'isi'   	=>'admin/rekening/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit rekening
	public function edit($no_rekening)
	{
		$rekening=$this ->rekening_model->detail($no_rekening);

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama_bank','Nama Rekening','required',
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
		$data=array('title'		=>'Edit Rekening'.$rekening->nama_bank,
					'rekening'	=> $rekening,
					'error'		=>$this->upload->display_errors(),
					'isi'   	=>'admin/rekening/edit');

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
			$i 				=$this->input;
			$data = array ( 'no_rekening'      		=>$no_rekening,
							'nama_bank'         	=> $i->post('nama_bank'),
							'no_rekening'      		=> $i->post('no_rekening'),
							'nama_pemilik'  		=> $i->post('nama_pemilik'),
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							);

			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses', 'data berhasil di edit');
			redirect(base_url('admin/rekening'),'refresh');
						
		}}else{
			//edit produk tanpa ganti gambar
			$i=$this->input;
			$data = array ( 'no_rekening'      		=>$no_rekening,
							'nama_bank'         	=> $i->post('nama_bank'),
							'no_rekening'      		=> $i->post('no_rekening'),
							'nama_pemilik'  		=> $i->post('nama_pemilik'),
							//'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							);

			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses', 'data berhasil di edit');
			redirect(base_url('admin/rekening'),'refresh');
		}
	}
		//end masuk database
		$data=array('title'		=>'Edit Rekening'.$rekening->nama_bank,
					'rekening'	=> $rekening,
					'isi'   	=>'admin/rekening/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}
		
		//delete rekening
	public function delete ($no_rekening)
	{

	$rekening =$this->rekening_model->detail($no_rekening);

	unlink('./assets/upload/image/'.$rekening->gambar);
	unlink('./assets/upload/image/thumbs/'.$rekening->gambar);
	$data = array ('no_rekening'  => $no_rekening);

	$this->rekening_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/rekening'),'refresh');
	}
}

/* End of file rekening.php */
/* Location: ./application/controllers/admin/rekening.php */