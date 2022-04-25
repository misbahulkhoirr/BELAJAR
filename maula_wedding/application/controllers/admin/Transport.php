<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport extends CI_Controller {

//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transport_model');
		//proteksi halaman
		$this->login_admin->cek_login();

	}
	//data transport
	public function index()
	{
		$transport=$this->transport_model->listing();
		$data=array('title'       =>'Data Biaya Transport',
					'transport'  =>$transport,
					'isi'  	      =>'admin/transport/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah transport
	public function tambah()
	{
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('tujuan','Tujuan','required|is_unique[transport.tujuan]',
		 array( 'required'  =>'%s harus diisi',
		 	'is_unique'		=>'%$ sudah ada, buat transport baru !'));

		$valid->set_rules('biaya_transport','Biaya transport','required',
		 array( 'required'  =>'%s harus diisi'));


		if($valid->run()===FALSE){
		
		//end validasi
		$data=array('title'  =>'Tambah Biaya transport',
					'isi'    =>'admin/transport/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i=$this->input;

			$data = array ( 'tujuan'         			=> $i->post('tujuan'),
							'biaya_transport'  			=> $i->post('biaya_transport'),
							'urutan'  					=> $i->post('urutan'));
			
			$this->transport_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah ditambah');
			redirect(base_url('admin/transport'),'refresh');
		}
		//end masuk database
	}

	//Edit transport
	public function edit($id_transport)
	{
		$transport=$this ->transport_model->detail($id_transport);

		// validasi input
		$valid = $this ->form_validation;
		$valid->set_rules('tujuan','Tujuan','required',
		 array( 'required'  =>'%s harus diisi'));


		if($valid->run()===FALSE){
		
		//end validasi
		$data=array('title'  		=>'Edit biaya transport',
					'transport'     =>$transport,
					'isi'  		 	=>'admin/transport/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i 				=$this->input;
 			
			$data = array ( 'id_transport'      		=>$id_transport,
							'tujuan'       				=> $i->post('tujuan'),
							'biaya_transport'  			=> $i->post('biaya_transport'),
							'urutan'  					=> $i->post('urutan'));

			
			$this->transport_model->edit($data);
			$this->session->set_flashdata('sukses', 'data berhasil di edit');
			redirect(base_url('admin/transport'),'refresh');
		}
		//end masuk database
	}


		//delete transport
	public function delete ($id_transport)
	{
	$data = array ('id_transport'  => $id_transport);

	$this->transport_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/transport'),'refresh');
	}
}

/* End of file transport.php */
/* Location: ./application/controllers/admin/transport.php */