<?php 

// form open
echo form_open(base_url('admin/transaksi/update_status/'.$pembayaran->kode_transaksi),' class="form-horizontal"');
 ?>
<p class="pull-right">
	<div class="btn-group pull-right">
		

		<button type="submit"><i class="fa fa-check"></i> TRANSAKSI SELESAI</button>
		
	</div>
</p>

<div class="clearfix"></div><hr>
	<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">NAMA PELANGGAN</th>
					<th><?php echo $pembayaran->nama_pelanggan ?></th>
				</tr>
				<tr>
					<th width="20%">KODE TRANSAKSI</th>
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
					<td>Jumlah total</td>
					<td>Rp. <?php echo number_format($pembayaran->subtotal) ?></td>
				</tr>
				<tr>
					<td>Jumlah Bayar</td>
					<td>Rp. <?php echo $pembayaran->jumlah_bayar ?>
					</td>
				</tr>
				<tr>
					<td>Status bayar</td>
					<td><?php echo $pembayaran->status_bayar ?></td>
				</tr>
				<tr>
					<td>Status pesanan</td>
					<td><textarea name="status_pesanan" class="form-control"></textarea></td>
				</tr>
			</tbody>
		</table><?php echo form_close(); ?>
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
		<td>Rp. <?php echo number_format($transaksi->biaya_transport) ?></td>
	</tr>
	<tr>
		<td colspan="5" align="right">Subtotal </td>
		<td>Rp. <?php echo number_format($transaksi->subtotal) ?></td>
	</tr>
</table>