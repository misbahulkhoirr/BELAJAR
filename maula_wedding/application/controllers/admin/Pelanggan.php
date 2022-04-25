<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->login_admin->cek_login();

	}
	//data pelanggan
	public function index()
	{
		$pelanggan=$this->pelanggan_model->listing();
		$data=array('title' 		=>'Data Pelanggan',
					'pelanggan'     =>$pelanggan,
					'isi'    		=>'admin/pelanggan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

		

	//edit pelanggan
	public function edit($id_pelanggan)
	{
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);
			// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('alamat','Alamat lengkap','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('telepon','No. telepon','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()===FALSE){
		
		//end validasi

		$data = array(	'title'				=>'Edit Pelanggan',
						'pelanggan'			=> $pelanggan,
						'isi'				=>'admin/pelanggan/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


		//masuk database
		}else{
			$i=$this->input;
			//jika password lebih dari 6 karakter maka password diganti
			if(strlen($i->post('password')) >=6){
			$data = array ( 'id_pelanggan'		 	 => $id_pelanggan,
							'nama_pelanggan'         => $i->post('nama_pelanggan'),
							'password'     			 => SHA1($i->post('password')),
							'telepon'  				 => $i->post('telepon'),
							'alamat'  				 => $i->post('alamat'),
						);
		}else{
			//jika password kurang dari 6 maka password gagal diganti
			$data = array ( 'id_pelanggan'		 	 => $id_pelanggan,
							'nama_pelanggan'         => $i->post('nama_pelanggan'),
							'telepon'  				 => $i->post('telepon'),
							'alamat'  				 => $i->post('alamat'),
						);
		}
		// end data update	
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/pelanggan'),'refresh');
		}
		//end masuk database	
	}

		//delete pelanggan
	public function delete ($id_pelanggan)
	{
	$data = array ('id_pelanggan'  => $id_pelanggan);

	$this->pelanggan_model->delete($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/pelanggan'),'refresh');
	}

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/admin/pelanggan.php */