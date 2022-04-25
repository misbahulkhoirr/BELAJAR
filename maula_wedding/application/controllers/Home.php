<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('blog_model');
	}

	//halaman utama hompage
	public function index()
	{
		$site    		=$this->konfigurasi_model->listing();
		$kategori 		=$this->konfigurasi_model->nav_produk();
		$produk 		=$this->produk_model->home();
		$produk_related =$this->produk_model->home();
		$blog  			=$this->blog_model->home();

		$data=array ('title'			=>$site->namaweb.' | '.$site->tagline,
					'keywords'			=>$site->keywords,
					'deskripsi'			=>$site->deskripsi,
					'site'				=>$site,
					'kategori'			=>$kategori,
					'produk'			=>$produk,
					'produk_related'	=>$produk_related,
					'blog'				=>$blog,
					 'isi'				=>'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */