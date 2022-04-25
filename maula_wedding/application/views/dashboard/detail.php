
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
								<th width="20%">KODE TRANSAKSI</th>
								<th><?php echo $pembayaran->kode_transaksi ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tanggal</td>
								<td>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi))?></td>
							</tr>
							<tr>
								<td>Jumlah total</td>
								<td><?php echo number_format($pembayaran->subtotal) ?></td>
							</tr>
							<tr>
								<td>Status bayar</td>
								<td><?php echo $pembayaran->status_bayar?></td>
							</tr>
							<tr>
								<td>Status pesanan</td>
								<td style="color: red;"><i><?php echo $pembayaran->status_pesanan?></i></td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>KODE</th>
								<th>NAMA PRODUK</th>
								<th>JUMLAH</th>
								<th>HARGA</th>
								<th>SUBTOTAL</th>
								
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($transaksi as $transaksi) { ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $transaksi->kode_produk ?></td>
								<td><?php echo ($transaksi->nama_produk) ?></td>
								<td><?php echo number_format($transaksi->jumlah) ?></td>
								<td>Rp. <?php echo number_format($transaksi->harga) ?></td>
								<td>Rp. <?php echo number_format($transaksi->total_harga) ?></td>
								
							</tr>
						</tbody>
						<?php $i++; } ?>
						<tr>
						<td colspan="5" style="text-align: right;">Biaya Transport</td>
						<td><?php echo 'Rp.  '.number_format($transaksi->biaya_transport) ?></td>
					</tr>
					<tr>
						<td colspan="5" style="text-align: right;">SUBTOTAL</td>
						<td><?php echo 'Rp.  '.number_format($transaksi->subtotal) ?></td>
					</tr>
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
