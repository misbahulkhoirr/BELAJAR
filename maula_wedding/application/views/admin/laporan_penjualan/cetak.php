<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	
</head>
<body onload="print()">
	<div class="cetak">
		<h1>LAPORAN TRANSAKSI PENJUALAN</h1>
		<h1><?php echo $site->namaweb ?></h1>
		<table class="table table-bordered">
	<!-- <thead>
		<tr>
			<th width="20%"></th>
			<th>: <?php echo $transaksi->nama_pelanggan ?></th>
		</tr>
		<tr>
			<th width="20%">KODE TRANSAKSI</th>
			<th>: <?php echo $transaksi->kode_transaksi ?></th>
		</tr>
	</thead> -->
	
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
			<th>JUMLAH</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $jumlah = 0;
		$i=1; foreach ($transaksi as $transaksi) { ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $transaksi->kode_produk ?></td>
			<td><?php echo ($transaksi->nama_produk) ?></td>
			<td><?php echo number_format($transaksi->jumlah) ?></td>
			<td><?php echo number_format($transaksi->harga) ?></td>
			<td><?php echo number_format($transaksi->total_harga) ?></td>
			
		</tr>
	</tbody>
	<?php $jumlah +=$transaksi->total_harga;
	 $i++; } ?>
</table>
<table class="table">
				<tr  class="table-row bg-info text-strong" style="font-weight: bold; color: black; !important;">
					<td width="87%">JUMLAH</td>
					<td><?php echo number_format($jumlah) ?></td>
				</tr>
		</table>
	</div>
	
</body>
</html>