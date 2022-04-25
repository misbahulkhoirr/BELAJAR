
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<?php include('menu.php') ?>
				
			</div>
		</div>

		<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
			
				<h2><?php echo $title ?></h2>
				<hr>			
				<p>Berikut adalah riwayat belanja anda</p>

					<?php 
						//kalau ada transaksi tampilkan tabel
						if($pembayaran){ 
					?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="30%">KODE TRANSAKSI</th>
								<th><?php echo $pembayaran->kode_transaksi ?></th>
							</tr>
							<tr>
								<th>Tanggal Pernikahan</th>
								<th> <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan))?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tanggal Transaksi</td>
								<td> <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi))?></td>
							</tr>
							<tr>
								<td>Tanggal Pernikahan</td>
								<td> <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan))?></td>
							</tr>
							<tr>
								<td>Jumlah total</td>
								<td><?php echo number_format($pembayaran->subtotal) ?></td>
							</tr>
							<tr>
								<td>Status bayar</td>
								<td><?php echo $pembayaran->status_bayar ?></td>
							</tr>
							<tr>
								<td>Status pesanan</td>
								<td><?php echo $pembayaran->status_pesanan ?></td>
							</tr>
							<tr>
								<td>Bukti bayar</td>
								<td><?php if($pembayaran->bukti_bayar !=""){ ?>
									<img src="<?php echo base_url('assets/upload/image/'.$pembayaran->bukti_bayar) ?>" class="img img-thumbnail" width="200">
								<?php }else{ echo 'Belum ada bukti bayar'; } ?>
								</td>
							</tr>
						</tbody>
					</table>
					
					<?php 
					//error upload
					if(isset($error)) {
						echo '<p class="alert alert-warning">'.$error.'</p>';
						}

						//Notifikasi error
						echo validation_errors('<p class="alert alert-warning">','</p>');

						//form open
						echo form_open_multipart(base_url('dashboard/konfirmasi/'.$pembayaran->kode_transaksi));
					 ?>
					
					 <table class="table">
					 	<tbody>
					 		<tr>
					 			<td width="30%">Pembayaran ke rekening</td>
					 			<td>
					 				<?php foreach($rekening as $rekening){ ?>
					 				<input type="checkbox" name="no_rekening" value="<?php echo $rekening->no_rekening ?>">

					 					
					 						 &nbsp; <img src="<?php echo base_url('assets/upload/image/'.$rekening->gambar) ?>" alt="<?php echo $rekening->nama_bank ?>" width="15%" highth="15%"> &nbsp; 
					 						(No. Rekening : <?php echo $rekening->no_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>) <br><br>
					 					
					 					<?php } ?>
					 				
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Tanggal Bayar</td>
					 			<td>	<input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($pembayaran->tanggal_bayar!="") { echo $pembayaran->tanggal_bayar; } else{ echo date('d-m-Y'); }  ?>">
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Jumlah Pembayaran</td>
					 			<td>
					 				<input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($pembayaran->jumlah_bayar!="") { echo $pembayaran->jumlah_bayar; }else{ echo $pembayaran->subtotal; } ?>">
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Dari Bank</td>
					 			<td>
					 				<input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $pembayaran->nama_bank?>">
					 				<small> contoh : BANK BCA</small>
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Dari No. Rekening</td>
					 			<td>
					 				<input type="text" name="rek_pembayaran" class="form-control" placeholder="No.Rekening" value="<?php echo $pembayaran->rek_pembayaran ?>">
					 				<small> contoh : 24242424</small>
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Nama Pemilik Rekening</td>
					 			<td>
					 				<input type="text" name="rek_pelanggan" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo $pembayaran->rek_pelanggan ?>">
					 				<small> contoh : Elma Maula Silva</small>
					 			</td>
					 		</tr>
					 		<tr>
					 			<td>Upload Bukti Pembayaran</td>
					 			<td>
					 				<input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Bukti Pembayaran">
					 			</td>
					 		</tr>
					 		<tr>
					 			<td></td>
					 			<td>
					 				<div class="btn-group">
					 					<button type="submit" class="btn btn-success btn-lg" name="submit"><i class="fa fa-upload"></i> Submit</button>
					 					<button type="reset" class="btn btn-info btn-lg" name="reset"><i class="fa fa-times"></i> Reset</button>
					 				</div>
					 			</td>
					 		</tr>
					 	</tbody>
					 </table>

					<?php 
						//form close
						echo form_close();

						//kalau tidak ada maka tampil notifikasi
						}else{ ?>
							<p class="alert alert-success"></p>
							<i class="fa fa-warning"></i> Belum ada data transaksi</p>
					<?php } ?>
			
		</div>
	</div>
</div>
</section>
