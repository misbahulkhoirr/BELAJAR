<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		//proteksi halaman
		$this->login_admin->cek_login();

	}
	//data admin
	public function index()
	{
		$admin=$this->admin_model->listing();
		$data=array('title'  =>'Data Pengguna',
					'admin'   =>$admin,
					'isi'    =>'admin/admin/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah admin
	public function tambah()
	{
		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
		 array( 'required'  =>'%s harus diisi',
				'valid_email'  =>'%s tidak valid'));

		$valid->set_rules('username','Adminname','required|min_length[6]|max_length[30]|is_unique[admin.username]',
		 array( 'required'  =>'%s harus diisi',
				'min_length'  =>'%s minimal 6 karakter',
				'max_length'  =>'%s maksimal 30 karakter',
				'is_unique'  =>'%s username sudah ada. buat username baru'));

		$valid->set_rules('password','Password','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()===FALSE){
		
		//end validasi
		$data=array('title'  =>'Tambah Pengguna',
					'isi'    =>'admin/admin/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//masuk database
		}else{
			$i=$this->input;
			$data = array ( 'nama'         => $i->post('nama'),
							'email'        => $i->post('email'),
							'username'     => $i->post('username'),
							'password'     => SHA1($i->post('password')),
							// 'akses_level'  => $i->post('akses_level')
						);
			
			$this->admin_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah ditambah');
			redirect(base_url('admin/admin'),'refresh');
		}
		//end masuk database
	}

	//Edit admin
	public function edit($id_admin)
	{
		$admin=$this ->admin_model->detail($id_admin);

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama','Nama lengkap','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
		 array( 'required'  =>'%s harus diisi',
				'valid_email'  =>'%s tidak valid'));

		
		$valid->set_rules('password','Password','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()===FALSE){
		
		//end validasi
		$data=array('title'  =>'Edit Pengguna',
					'admin'   =>$admin,
					'isi'    =>'admin/admin/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i=$this->input;
			$data = array ( 'id_admin'      =>$id_admin,
							'nama'         => $i->post('nama'),
							'email'        => $i->post('email'),
							'username'     => $i->post('username'),
							'password'     =>SHA1($i->post('password')),
							// 'akses_level'  => $i->post('akses_level')
						);
			
			$this->admin_model->edit($data);
			$this->session->set_flashdata('sukses', 'data berhasil di edit');
			redirect(base_url('admin/admin'),'refresh');
		}
		//end masuk database
	}


		//delete admin
	public function delete ($id_admin)
	{
	$data = array ('id_admin'  => $id_admin);

	$this->admin_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/admin'),'refresh');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin/admin.php */