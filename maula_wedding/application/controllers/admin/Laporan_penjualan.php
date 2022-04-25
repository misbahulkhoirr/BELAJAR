<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

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

	//load data transaksi status bayar selesai
	public function index()
	{
		$transaksi 		 		= $this->transaksi_model->laporan();

		$data 	= array(	'title'					=>'Data Laporan_penjualan',
							'transaksi'			    =>$transaksi,
							'isi'					=>'admin/laporan_penjualan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


		//Cetak
	public function cetak()
	{
	//	$header = $this->pembayaran_model->laporan();
		$transaksi 		  = $this->transaksi_model->laporan();
		$site 			  = $this->konfigurasi_model->listing();

		$data = array(	'title'				=>'Laporan Penjualan',
				//		'pembayaran'  =>$pembayaran,
						'transaksi'			=>$transaksi,
						'site'				=>$site
					);
		$this->load->view('admin/laporan_penjualan/cetak', $data, FALSE);

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

		public function filter(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$transaksi 	=$this->transaksi_model->filter_laporan(array($tanggal_awal,$tanggal_akhir));

		$data 	= array(	'title'					=>'Data Transaksi',
							'tanggal_awal'			=>$tanggal_awal,
							'tanggal_akhir'			=>$tanggal_akhir,
							'transaksi'				=> $transaksi,
							'isi'					=>'admin/laporan_penjualan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		

	}
}

/* End of file Laporan_penjualan.php */
/* Location: ./application/controllers/admin/Laporan_penjualan.php */