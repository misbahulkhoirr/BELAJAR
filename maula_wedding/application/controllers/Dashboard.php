<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('pelanggan_model');
			$this->load->model('pembayaran_model');
			$this->load->model('transaksi_model');
			$this->load->model('rekening_model');
			//Halaman ini di proteksi dengan Login_pelanggan =>check login
			$this->login_pelanggan->cek_login();
		}

	//halaman dasboard
	public function index()
	{
		//ambil data login id_pelanggan dai session
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->pembayaran_model->pelanggan($id_pelanggan);

		$data = array(	'title'				=>'Halaman Dashboard Pelanggan',
						'pembayaran'  =>$pembayaran,
						'isi'				=>'dashboard/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	//belanja
	public function belanja()
	{
		//ambil data login id_pelanggan dari session
		$id_pelanggan     = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->pembayaran_model->pelanggan($id_pelanggan);

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran'  =>$pembayaran,
						'isi'				=>'dashboard/belanja'
					);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	public function keranjang_belanja()
	{
		$keranjang  =$this->cart->contents();

		$data  = array ( 'title'     =>'Keranjang Belanja',
						 'keranjang' =>$keranjang,
						 'isi'		 =>'dashboard/keranjang_belanja'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($kode_transaksi)
	{
		//ambil data login id_pelanggan dai session
		$id_pelanggan     = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);

		//memastikan bahwa pelanggan hanya mengakses data transaksinya
		if($pembayaran->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect(base_url('masuk'));
		}

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran'  =>$pembayaran,
						'transaksi'			=>$transaksi,
						'isi'				=>'dashboard/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	//profil
	public function profil()
	{
		//ambil data login id_pelanggan dai session
		$id_pelanggan       = $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);

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

		$data = array(	'title'				=>'Profil Saya',
						'pelanggan'			=>$pelanggan,
						'isi'				=>'dashboard/profil'
					);
		$this->load->view('layout/wrapper', $data, FALSE);


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
			$this->session->set_flashdata('sukses', 'Update profil berhasil');
			redirect(base_url('dashboard/profil'),'refresh');
		}
		//end masuk database	
	}

//konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$pembayaran 	= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();
		

		// validasi input
		$valid = $this ->form_validation;

		$valid->set_rules('nama_bank','Nama Bank','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('rek_pembayaran','No. Rekening','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('rek_pelanggan','Nama Pemilik Rekening','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('tanggal_bayar','Tanggal Pembayaran','required',
		 array( 'required'  =>'%s harus diisi'));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()){
			//check jika gambar di ganti
			if(! empty($_FILES['bukti_bayar']['name'])){
			$config['upload_path']	 	= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size'] 	 	= '2400'; // dalam kb
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
							
		//end validasi

		$data 	= array(	'title'				=>'Konfirmasi Pembayaran',
							'pembayaran'		=> $pembayaran,
							'rekening'			=> $rekening,
							'error'				=>$this->upload->display_errors(),
							'isi'				=> 'dashboard/konfirmasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

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
			
			$data = array ( 'kode_pembayaran'		=>$pembayaran->kode_pembayaran,
							'status_bayar'				=>'Konfirmasi',
							'jumlah_bayar'  			=> $i->post('jumlah_bayar'),
							'rek_pembayaran'  			=> $i->post('rek_pembayaran'),
							'rek_pelanggan'   			=> $i->post('rek_pelanggan'),
							'bukti_bayar'		 		=> $upload_gambar['upload_data']['file_name'],
							'no_rekening' 				=> $i->post('no_rekening'),
							'nama_bank' 				=> $i->post('nama_bank'),
							'status_pesanan'  			=> 'Terima kasih, Barang pesanan anda akan segera diproses',
							);
			
			$this->pembayaran_model->edit($data);

			//Status bayar tabel transaksi
			// $data = array ( 'kode_transaksi'				=> $pembayaran->kode_transaksi,
			// 				'status_bayar'		      		=>'Konfirmasi',
			// 				);
			// $this->transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('dashboard'),'refresh');
		}}else{
			//edit produk tanpa ganti gambar
			$i=$this->input;
			
			$data = array ( 'kode_pembayaran'				=>$pembayaran->kode_pembayaran,
							'status_bayar'				=>'Konfirmasi',
							'jumlah_bayar'  			=> $i->post('jumlah_bayar'),
							'rek_pembayaran'  			=> $i->post('rek_pembayaran'),
							'rek_pelanggan'   			=> $i->post('rek_pelanggan'),
				//			'bukti_bayar'		 		=> $upload_gambar['upload_data']['file_name'],
							'no_rekening' 				=> $i->post('no_rekening'),
							'tanggal_bayar' 			=> $i->post('tanggal_bayar'),
							'nama_bank' 				=> $i->post('nama_bank'),
							'status_pesanan'  			=> 'Terima kasih, Barang pesanan anda akan segera diproses',
							);
			
			$this->pembayaran_model->edit($data);
			
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('dashboard'),'refresh');
		}
	}
	//end masuk database

			$data 	= array(	'title'				=>'Konfirmasi Pembayaran',
								'pembayaran'	=> $pembayaran,
								'rekening'			=> $rekening,
								'isi'				=> 'dashboard/konfirmasi'
							);
			$this->load->view('layout/wrapper', $data, FALSE);
	}

		//Cetak
	public function cetak($kode_transaksi)
	{
		$pembayaran = $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			  = $this->konfigurasi_model->listing();

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran' 		=>$pembayaran,
						'transaksi'			=>$transaksi,
						'site'				=>$site
					);
		$html 	=$this->load->view('dashboard/cetak', $data, true);
		$mpdf 	= new \Mpdf\Mpdf();
		// write some html code
		$mpdf->WriteHTML($html);
		//output a pdf file 
		$mpdf->Output();
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */