<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model admin
        $this->CI->load->model('admin_model');
	}

	//fungsi login
	public function login($username,$password)
		{
			$check = $this->CI->admin_model->login($username,$password);
			//jika ada data admin,maka create session login
			if($check){
				$id_admin		= $check->id_admin;
				$nama			= $check->nama;
				//$akses_level	= $check->akses_level;

				//create session
				$this->CI->session->set_userdata('id_admin',$id_admin);
				$this->CI->session->set_userdata('nama',$nama);
				$this->CI->session->set_userdata('username',$username);
			//	$this->CI->session->set_userdata('akses_level',$akses_level);
				//redirect ke halaman admin yang di proteksi
				redirect(base_url('admin/dashboard'),'refresh');
			}else{
				$this->CI->session->set_flashdata('warning','username dan password salah');
				redirect(base_url('login'),'refresh');
			}
		}

	//fungsi cek login
	public function cek_login(){
		//memmeriksa sessi
		if($this->CI->session->userdata('username') ==""){
				$this->CI->session->set_flashdata('warning','anda blom login');
				redirect(base_url('login'),'refresh');
		}

	}

	//fungsi logout
	public function logout(){
		//mengeluarkan sessi
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		// $this->CI->session->unset_userdata('akses_level');
		//redirect
		$this->CI->session->set_flashdata('sukses','anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/libraries/Login.php */
