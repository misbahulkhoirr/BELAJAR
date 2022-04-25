<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('kategori_model');
		$this->load->model('produk_model');
	}

	//listing data blog
	public function index()
	{
		$site  				= $this->konfigurasi_model->listing();
		$listing_kategori	= $this->blog_model->listing_kategori();
		$produk 	    	= $this->produk_model->listing();
		$tag_kategori       = $this->blog_model->listing_kategori();
		//ambil data total
		$total 				= $this->blog_model->total_blog();
		//paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'blog/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment']  	= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/blog/';
		
		$this->pagination->initialize($config);
		//ambil data blog
		$page 			= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$blog 		=$this->blog_model->blog($config['per_page'],$page);
		//paginasi end

		$data  = array  ('title'    			=> 'Blog '.$site->namaweb,
						  'site'				=> $site,
						  'listing_kategori'	=> $listing_kategori,
						  'tag_kategori'		=> $tag_kategori,
						  'blog'				=> $blog,
						  'produk'				=> $produk,
						  'pagin'				=> $this->pagination->create_links(),
						  'isi'					=> 'blog/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//listing kategori blog
	public function kategori($slug_kategori)
	{
		//kategori detail
		$kategori           = $this->kategori_model->read($slug_kategori);
		$id_kategori 		= $kategori->id_kategori;
		$produk 			= $this->produk_model->listing();
		//data global
		$site  				= $this->konfigurasi_model->listing();
		$listing_kategori   = $this->blog_model->listing_kategori();
		$tag_kategori  	    = $this->blog_model->listing_kategori();

		//ambil data total
		$total 		= $this->blog_model->total_kategori($id_kategori);
		//paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'blog/kategori/'.$slug_kategori.'/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment']  	= 5;
		$config['num_links'] 		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/blog/kategori/'.$slug_kategori;
		
		$this->pagination->initialize($config);
		//ambil data blog
		$page 			= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$blog 		=$this->blog_model->kategori($id_kategori,$config['per_page'],$page);
		//paginasi end

		$data  = array  ('title'    			=>$kategori->nama_kategori,
						  'site'				=>$site,
						  'listing_kategori'	=>$listing_kategori,
						  'tag_kategori'		=>$tag_kategori,
						  'blog'				=>$blog,
						  'produk'				=>$produk,
						  'pagin'				=> $this->pagination->create_links(),
						  'isi'					=>'blog/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail blog
	public function detail($slug_blog)
	{
		$site    	     = $this->konfigurasi_model->listing();
		$blog 		     = $this->blog_model->read($slug_blog);
		$id_blog 	     = $blog->id_blog;
		$produk 		 = $this->produk_model->listing();
		$listing_kategori= $this->blog_model->listing_kategori();
		$tag_kategori  	 = $this->blog_model->listing_kategori();
		$blog_related	 = $this->blog_model->home();

		$data  = array  (	'title'    			=>$blog->judul_blog,
							'site'				=>$site,
							'blog'				=>$blog,
						  	'blog_related'		=>$blog_related,
						  	'produk'			=>$produk,
						  	'listing_kategori'	=>$listing_kategori,
						  	'tag_kategori'		=>$tag_kategori,
						 	'isi'				=>'blog/detail'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */