<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// LOAD MODEL
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('pembayaran_model');
		$this->load->model('konfigurasi_model');
		$this->login_admin->cek_login();
	}

	//load data transaksi
	public function index()
	{

		$pembayaran 		= $this->pembayaran_model->listing();

		$data 	= array(	'title'					=>'Data Transaksi',
							'pembayaran'			=> $pembayaran,
							'isi'					=>'admin/transaksi/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//load data transaksi
	public function transaksi_selesai()
	{

		$pembayaran 			= $this->pembayaran_model->transaksi_selesai();

		$data 	= array(	'title'					=>'Data Transaksi',
							'pembayaran'			=> $pembayaran,
							'isi'					=>'admin/transaksi/transaksi_selesai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	//detail
	public function detail($kode_transaksi)
	{
		$pembayaran 		= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran' 		 =>$pembayaran,
						'transaksi'			=>$transaksi,
						'isi'				=>'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

		//Cetak
	public function cetak($kode_transaksi)
	{
		$pembayaran = $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			  = $this->konfigurasi_model->listing();

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran'  =>$pembayaran,
						'transaksi'			=>$transaksi,
						'site'				=>$site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);

	}

	//Cetak PDF
	public function pdf($kode_transaksi)
	{
		$pembayaran = $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			  = $this->konfigurasi_model->listing();

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran'  =>$pembayaran,
						'transaksi'			=>$transaksi,
						'site'				=>$site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html 	=$this->load->view('admin/transaksi/cetak', $data, true);
		$mpdf 	= new \Mpdf\Mpdf();
		// write some html code
		$mpdf->WriteHTML($html);
		//output a pdf file 
		$mpdf->Output();

	}
	//Cetak pengiriman
	public function kirim($kode_transaksi)
	{
		$pembayaran = $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 			  = $this->konfigurasi_model->listing();

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran' 		 =>$pembayaran,
						'transaksi'			=>$transaksi,
						'site'				=>$site
					);
		// $this->load->view('admin/transaksi/kirim', $data, FALSE);
		$html 	=$this->load->view('admin/transaksi/kirim', $data, true);
		$mpdf 	= new \Mpdf\Mpdf();
		// write some html code
		$mpdf->setHTMLHeader('<div style="text-align: center; font-weight: bold;">
			<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 60px; width: auto;"></div>');

		$mpdf->setHTMLFooter('<div style="padding: 10px 20px; background-color:black; color:white; font-size: 12px;">
			Alamat  :'.$site->namaweb.' ('.$site->alamat.')<br>
			Telepon : '.$site->telepon.'
			</div>');


		$mpdf->WriteHTML($html);
		//output a pdf file 
		$mpdf->Output();

	}

	//filterberdasarkan tanggal_pernikahan
	public function filter_transaksi(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$pembayaran 	=$this->pembayaran_model->filter_transaksi(array($tanggal_awal,$tanggal_akhir));

		$data 	= array(	'title'					=>'Data Transaksi',
							'tanggal_awal'			=>$tanggal_awal,
							'tanggal_akhir'			=>$tanggal_akhir,
							'pembayaran'			=> $pembayaran,
							'isi'					=>'admin/transaksi/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		

	}

	public function filter(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$pembayaran 	=$this->pembayaran_model->filter_transaksi_selesai(array($tanggal_awal,$tanggal_akhir));

		$data 	= array(	'title'					=>'Data Transaksi',
							'tanggal_awal'			=>$tanggal_awal,
							'tanggal_akhir'			=>$tanggal_akhir,
							'pembayaran'			=> $pembayaran,
							'isi'					=>'admin/transaksi/transaksi_selesai'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		

	}

	public function hapus ($kode_transaksi)
	{
	$data = array ('kode_transaksi'  => $kode_transaksi);
	$this->transaksi_model->hapus($data);

	$data = array ('kode_transaksi'  => $kode_transaksi);
	$this->pembayaran_model->hapus($data);
	$this->session->set_flashdata('sukses', 'data telah dihapus');
	redirect(base_url('admin/dashboard'),'refresh');
	}

	//Update status
	public function update_status($kode_transaksi)
	{
		$pembayaran			= $this->pembayaran_model->kode_transaksi($kode_transaksi);
		$transaksi 		  = $this->transaksi_model->kode_transaksi($kode_transaksi);

		$valid = $this ->form_validation;

		$valid->set_rules('status_pesanan','Status pesanan','required',
		 array( 'required'  =>'%s harus diisi'));

		if($valid->run()===FALSE){

		$data = array(	'title'				=>'Riwayat Belanja',
						'pembayaran'  		=>$pembayaran,
						'transaksi'			=>$transaksi,
						'isi'				=>'admin/transaksi/update_status'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			
			$data = array ( 	'kode_pembayaran'		 	 => $pembayaran->kode_pembayaran,
								'status_pesanan'		=>$this->input->post('status_pesanan'),						
								'status_bayar'  		 => 'Selesai',	
							);
			$this->pembayaran_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/transaksi'),'refresh');
		}
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */