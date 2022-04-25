
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<?php include('menu.php') ?>
				
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
		
			<div class="alert alert-success">
				<h1>Selamat datang <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h1>
			</div>		
			<?php 
						//kalau ada transaksi tampilkan tabel
						if($pembayaran){ 
					?>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>KODE</th>
								<th>TANGGAL PERNIKAHAN</th>
								<th>ITEM</th>
								<th>TOTAL</th>
								<th>STATUS BAYAR</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($pembayaran as $pembayaran) { ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $pembayaran->kode_transaksi ?></td>
								<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan)) ?></td>
								<td><?php echo $pembayaran->total_item ?></td>
								<td><?php echo number_format($pembayaran->subtotal) ?></td>
								<td style="color: blue;"><?php echo $pembayaran->status_bayar?></td>
								<td>
									<div class="btn-group">

										<a href="<?php echo base_url('dashboard/konfirmasi/'.$pembayaran->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi Bayar</a>

									</div>
									<div class="clearfix"></div>
						            <br>
						            <div class="btn-group">
						            	<a href="<?php echo base_url('dashboard/detail/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
										<a href="<?php echo base_url('dashboard/cetak/'.$pembayaran->kode_transaksi) ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>

									
										
									</div>	
								</td>
							</tr>
						</tbody>
						<?php $i++; } ?>
					</table>
					<?php 
						//kalau tidak ada maka tampil notifikasi
						}else{ ?>
							<p class="alert alert-success"></p>
							<i class="fa fa-warning"></i> Belum ada data transaksi</p>
					<?php } ?>
		</div>
	</div>
</div>
</section>
