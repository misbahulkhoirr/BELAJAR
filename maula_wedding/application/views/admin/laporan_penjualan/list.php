<br>
	<?php echo form_open('admin/laporan_penjualan/filter');?>

			<div class="col-md-3">
			<h4><b>Pilih Tanggal</b></h4>
			</div>

<table class="table">
	<tbody>
		<tr>
			<th width="12%">Tanggal Awal :</th>
			<td width="10%"><input class="form-control" type="date" name="tanggal_awal" required></td>
			<th width="12%">Tanggal Akhir :</th>
			<td width="10%"><input class="form-control" type="date" name="tanggal_akhir" required></td>
		
			<td><button type="submit" value="submit" class="btn-info btn-sm"><i class="fa fa-search"></i> Lihat</button></td>

			<td><a href="<?php echo base_url('admin/laporan_penjualan/cetak')?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak</a></td>
		</tr>
		
	</tbody>
</table>
 
<br>
<div class="box">
    <div class="box-body">
		<table class="table table-bordered" width="100%">
			<thead>
				<tr class="bg-success">
					<th>NO</th>
					<th>TANGGAL TRANSAKSI</th>
					<th>KODE TRANSAKSI</th>
					<th>ID PRODUK</th>
					<th>PRODUK</th>
					<th>JUMLAH ITEM</th>
					<th>JUMLAH TOTAL</th>		
					
				</tr>
			</thead>
			<tbody>
				<?php
				$jumlah = 0;
					$i=1; foreach ($transaksi as $row){ ?>
				<tr>
					<th><?php echo $i ?></th>
					<td><?php echo date('d-m-Y',strtotime($row->tanggal_transaksi)) ?></td>
					<td><?php echo $row->kode_transaksi ?></td>
					<td><?php echo $row->kode_produk ?></td>
					<td><?php echo $row->nama_produk ?></td>
					<td><?php echo $row->jumlah ?></td>
					<td><?php echo 'Rp. ',number_format($row->total_harga) ?></td>
				</tr>
			</tbody>

			<?php $jumlah +=$row->total_harga;

				$i++;} ?>
		</table>
		<table class="table">
				<tr  class="table-row bg-info text-strong" style="font-weight: bold; color: black; !important;">
					<th width="87%">JUMLAH</th>
					<td><?php echo 'Rp. ',number_format($jumlah) ?></td>
				</tr>
		</table>
	</div>
</div>
<br>
 <?php form_close(); ?>