<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
			//proteksi halaman
		$this->login_admin->cek_login();
		$this->load->model('konfigurasi_model');
		$this->load->model('pembayaran_model');
	}

//Halaman utama dashboard
	public function index()
	{
		$site     	 = $this->konfigurasi_model->listing();
		$pembayaran = $this->pembayaran_model->order();


		$data=array ('title'	=>'Halaman Administrator',
					'site'		=>$site,
					'pembayaran' =>$pembayaran,
					'isi'		=>'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */