<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('pembayaran_model');
		$this->load->model('transaksi_model');
		$this->load->model('transport_model');
		// load helper random string
		$this->load->helper('string');
	}

	//halaman belanja
	public function index()
	{
		$keranjang  =$this->cart->contents();

		$data  = array ( 'title'     =>'Keranjang Belanja',
						 'keranjang' =>$keranjang,
						 'isi'		 =>'belanja/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Sukses belanja
	public function sukses()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->pembayaran_model->pelanggan($id_pelanggan);
		$data  = array ( 'title'    		 =>'Belanja Berhasil',
						'pembayaran'	 =>$pembayaran,
						 'isi'				 =>'belanja/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//check out
	public function checkout(){
		//check login pelanggan , mengececk dengan session email

		//kondisi sudah login
		if($this->session->userdata('email')){
			$email 				=$this->session->userdata('email');
			$nama_pelanggan		=$this->session->userdata('nama_pelanggan');
			$pelanggan 			=$this->pelanggan_model->sudah_login($email,$nama_pelanggan);
			$transport 	    	=$this->transport_model->listing();
			$jsArray 			= "var biaya_transport = new Array();"; 

			$keranjang  =$this->cart->contents();
			
				// validasi input
			$valid = $this ->form_validation;

			$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			 array( 'required'  =>'%s harus diisi'));
			

			$valid->set_rules('telepon','Nomor telepon','required',
			 array( 'required'  =>'%s harus diisi'));

			$valid->set_rules('alamat',' Alamat','required',
			 array( 'required'  =>'%s harus diisi'));

			$valid->set_rules('email','Email','required|valid_email',
			 array( 'required'  =>'%s harus diisi',
					'valid_email'  =>'%s tidak valid'));

			$valid->set_rules('tanggal_pernikahan','tanggal_pernikahan','required',
			 array( 'required'  =>'%s harus diisi'));

			$valid->set_rules('biaya_transport','Biaya Transport','required',
			 array( 'required'  =>'%s harus diisi'));

			

			if($valid->run()===FALSE){
			
			//end validasi

			$data  = array ( 'title'     =>'Checkout',
							 'keranjang' =>$keranjang,
							 'transport' =>$transport,
							 'pelanggan' =>$pelanggan,
							 'jsArray'	 =>$jsArray,
							 'isi'		 =>'belanja/checkout'
							);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masuk databes
			}else{
				
				$i=$this->input;
				$sub_total          =$this->cart->total()+$i->post('biaya_transport');
				$tanggal_pernikahan =$i->post('tanggal_pernikahan');
				$tglpesan		    =date('Y-m-d',strtotime('-14 days',strtotime($tanggal_pernikahan)));

					if($tglpesan<$i->post('tanggal_transaksi')){
						$this->session->set_flashdata('warning', 'tanggal pernikahan kurang dari 14 hari');
						redirect(base_url('belanja/checkout'),'refresh');
			
					}else{
				$data = array ( 'id_pelanggan'		 	 => $pelanggan->id_pelanggan,
								'kode_pembayaran'  		=> $i->post('kode_pembayaran'),
								'nama_pelanggan'         => $i->post('nama_pelanggan'),
								'email'       			 => $i->post('email'),
								'telepon'  				 => $i->post('telepon'),
								'alamat'  				 => $i->post('alamat'),
								'nama_pengantin'  		 => $i->post('nama_pengantin'),
								'kode_transaksi'  		 => $i->post('kode_transaksi'),
								'subtotal' 			 	 =>  $sub_total,
								'status_bayar'  		 => 'Belum',
								'tanggal_transaksi'  	 => $i->post('tanggal_transaksi'),
								'status_pesanan'  		 => 'Segera lakukan pembayaran transaksi anda, jika dalam waktu 3 hari tidak melakukan konfirmasi pembayaran, maka transaksi akan terhapus',
							
							);
 
				//proses masuk ke pmbayaran transaksi
				$this->pembayaran_model->tambah($data);
				//proses masuk ke tabel transaksi
				foreach ($keranjang as $keranjang) {
						$total_harga = $keranjang['price']*$keranjang['qty'];
						$sub_total =$this->cart->total()+$i->post('biaya_transport');

					$data = array ( 'id_pelanggan'		 	=> $pelanggan->id_pelanggan,
									'kode_transaksi'  		=> $i->post('kode_transaksi'),
									'kode_produk'		  	=> $keranjang['id'],
									'harga'  				=> $keranjang['price'],
									'jumlah'		  		=> $keranjang['qty'],
									'total_harga'			=> $total_harga,
									'id_transport'		 	=> $i->post('id_transport'),
									'biaya_transport'  		=> $i->post('biaya_transport'),
									'subtotal'		  		=> $sub_total,
									'tanggal_pernikahan'  	 => $tglpesan,
									'tanggal_transaksi'  	 => $i->post('tanggal_transaksi'),
								//	'status_bayar'  		 => 'Belum',
								);
					$this->transaksi_model->tambah($data);
				}
			}
				//end proses masuk ketabel transaksi
				$this->cart->destroy();
				//setelah masuk ketabel transaksi, maka keranjang dikosongkan

				//end pengosongan keranjang
				$this->session->set_flashdata('sukses', 'Checkout berhasil');
				redirect(base_url('belanja/sukses'),'refresh');
		}
			//end masuk database
		}else{
			//jika blom login maka registrasi
			$this->session->set_flashdata('sukses', 'Silahkan login atau Registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}
	}
	

	//tambah ke keranjang belanja 
	public function add()
	{
		//ambil data dari form
		$id               =$this->input->post('id');
		$qty   			  =$this->input->post('qty');
		$price  		  =$this->input->post('price');
		$name   		  =$this->input->post('name');
		$redirect_page    =$this->input->post('redirect_page');

		//proses masuk kekeranjang belanja
		$data = array (	'id'		=>$id,
						'qty'		=>$qty,
						'price'		=>$price,
						'name'		=>$name
						);
		$this->cart->insert($data);
		//redirect page 
		redirect($redirect_page,'refresh');
	}

	//update jumlah belanja list
	public function update_list($rowid)
	{
		if($rowid) {
			$data  = array(    'rowid'		=> $rowid,
							   'qty'		=> $this->input->post('qty'),
							);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Keranjang telah di update');
			redirect(base_url('belanja'),'refresh');
		}else{
			redirect(base_url('belanja'),'refresh');
		}
	}


	//update jumlah belanja checkout
	public function update_cart($rowid)
	{
		if($rowid) {
			$data  = array(    'rowid'		=> $rowid,
							   'qty'		=> $this->input->post('qty'),
							);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Keranjang telah di update');
			redirect(base_url('belanja/checkout'),'refresh');
		}else{
			redirect(base_url('belanja/checkout'),'refresh');
		}
	}

	//hapus isi keranjang belanja 
	public function hapus($rowid='')
	{
		if($rowid){
			// hapus peritem
		$this->cart->remove($rowid);
		$this->session->set_flashdata('sukses', 'Data Keranjang Belanja telah dihapus');
		redirect(base_url('belanja'),'refresh');
		}else{
			//hapus semua
		$this->cart->destroy();
		$this->session->set_flashdata('sukses', 'Data Keranjang Belanja telah dihapus');
		redirect(base_url('belanja'),'refresh');
		}
	}

	//hapus isi keranjang belanja dashboard pelanggan 
	public function delete($rowid='')
	{
		if($rowid){
			// hapus peritem
		$this->cart->remove($rowid);
		$this->session->set_flashdata('sukses', 'Data Keranjang Belanja telah dihapus');
		redirect(base_url('dashboard/keranjang_belanja'),'refresh');
		}else{
			//hapus semua
		$this->cart->destroy();
		$this->session->set_flashdata('sukses', 'Data Keranjang Belanja telah dihapus');
		redirect(base_url('dashboard/keranjang_belanja'),'refresh');
		}
	}
}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */