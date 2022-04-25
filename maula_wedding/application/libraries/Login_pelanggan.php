<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('pelanggan_model');
	}

	//fungsi login
	public function login($email,$password)
		{
			$check = $this->CI->pelanggan_model->login($email,$password);
			//jika ada data user,maka create session login
			if($check){
				$id_pelanggan		= $check->id_pelanggan;
				$nama_pelanggan		= $check->nama_pelanggan;

				//create session
				$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
				$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
				$this->CI->session->set_userdata('email',$email);
				//redirect ke halaman pelanggan yang di proteksi
				redirect(base_url('dashboard'),'refresh');
			}else{
				$this->CI->session->set_flashdata('warning','email dan password salah');
				redirect(base_url('masuk'),'refresh');
			}
		}

	//fungsi cek login
	public function cek_login(){
		//memmeriksa sessi
		if($this->CI->session->userdata('email') ==""){
				$this->CI->session->set_flashdata('warning','anda blom login');
				redirect(base_url('masuk'),'refresh');
		}

	}

	//fungsi form login/registrasi
	public function loginpelanggan(){
		//redirect	
		redirect(base_url('masuk'),'refresh');
	}

	//fungsi logout
	public function logout(){
		//mengeluarkan sessi
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		//redirect
		$this->CI->session->set_flashdata('sukses','anda berhasil logout');
		redirect(base_url('masuk'),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/libraries/Login.php */
