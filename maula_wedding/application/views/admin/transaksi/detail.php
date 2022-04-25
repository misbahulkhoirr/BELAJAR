<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/transaksi') ?>"
			title="Kembali" class="btn btn-info btn-sm"><i class="fa fa-backward"></i> Kembali
		</a>

		<a href="<?php echo base_url('admin/transaksi/cetak/'.$pembayaran->kode_transaksi) ?>"
			target="_blank" title="Cetak" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak
		</a>
	</div>
</p>
<div class="clearfix"></div><hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th width="20%">NAMA PELANGGAN</th>
			<th>: <?php echo $pembayaran->nama_pelanggan ?></th>
		</tr>
		<tr>
			<th width="20%">KODE TRANSAKSI</th>
			<th>: <?php echo $pembayaran->kode_transaksi ?></th>
		</tr>
		<tr>
			<th>Tanggal Pernikahan</th>
			<th>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan))?></th>
		</tr>
		
	</thead>
	<tbody>
		<tr>
			<td>Tanggal Transaksi</td>
			<td>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi))?></td>
		</tr>
		<tr>
			<td>Jumlah total</td>
			<td>: <?php echo number_format($pembayaran->subtotal) ?></td>
		</tr>
		<tr>
			<td>Status bayar</td>
			<td>: <?php echo $pembayaran->status_bayar?></td>
		</tr>
		<tr>
			<td>Bukti bayar</td>
			<td>: <?php if($pembayaran->bukti_bayar =="") {echo 'Belum ada'; }else{ ?>
				<img src="<?php echo base_url('assets/upload/image/'.$pembayaran->bukti_bayar) ?>" class="img img-thumbnail" width="200">
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td>Tanggal bayar</td>
			<td>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_bayar))?></td>
		</tr>
		<tr>
			<td>Jumlah bayar</td>
			<td>: Rp. <?php echo number_format($pembayaran->jumlah_bayar,'0',',','.')?></td>
		</tr>
		<tr>
			<td>Pembayaran dari</td>
			<td>: <?php echo $pembayaran->nama_bank?> No.Rekening <?php echo $pembayaran->rek_pembayaran ?> a.n <?php echo $pembayaran->rek_pelanggan ?></td>
		</tr>
		<tr>
			<td>Pembayaran ke rekening</td>
			<td>: <?php echo $pembayaran->bank?> No.Rekening <?php echo $pembayaran->no_rekening ?> a.n <?php echo $pembayaran->nama_pemilik ?></td>
		</tr>
		<tr>
			<th>Keterangan</th>
			<th>: <?php echo $pembayaran->nama_pengantin ?></th>
		</tr>
	</tbody>
</table>
<hr>
<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-success">
			<th>NO</th>
			<th>KODE</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH</th>
			<th>HARGA</th>
			<th>TOTAL</th>
			
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
				<td colspan="5" align="right">Biaya Transport</td>
				<td align="left"><?php echo 'Rp.  '.number_format($transaksi->biaya_transport) ?></td>
			</tr>
			<tr style="font-weight: bold;">
				<td colspan="5" align="right">SUBTOTAL</td>
				<td align="left"><?php echo 'Rp.  '.number_format($transaksi->subtotal) ?></td>
			</tr>
			<tr>
</table>