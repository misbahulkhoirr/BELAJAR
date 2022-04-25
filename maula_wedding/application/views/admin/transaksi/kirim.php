<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body{
			font-size: 12px;
			font-family: Arial;
		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 1cm;
		}
		td{
			padding: 6px 12px;
			border: solid thin #000;
			text-align: left;
		}
		.bg.success{
			background-color: #f5f5f5;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<br>
	<div>
		<p align="center">
			<br>
			<?php echo $site->alamat ?><br>
			Telepon: <?php echo $site->telepon ?>
		</p>
	</div>
		
		
		<table>
			<tr>
				<td>
					<strong>PENERIMA : </strong>
					<p>
						<?php echo $pembayaran->nama_pelanggan ?><br>
						<?php echo $pembayaran->alamat ?><br>
						Telepon: <?php echo $pembayaran->telepon ?>
					</p>
				</td>
				<td>
					<p>
						Kode Transaksi &emsp; &emsp; : <?php echo $pembayaran->kode_transaksi ?><br>
						Tanggal pernikahan &nbsp;: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan))?><br>
						Tanggal transaksi &emsp; : <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi))?><br>
					</p>
				</td>
			</tr>					
			</table>

			<h2 style="font-weight: bold; text-align: center;">DATA PEMBELIAN</h2>
			<table class="table table-bordered" width="100%">
				<thead>
					<tr style="background-color: grey">
						<td align="center">NO</td>
						<td align="center">KODE</td>
						<td align="center">NAMA PRODUK</td>
						<td align="center">HARGA</td>
						<td align="center">JUMLAH</td>
						<td align="center">TOTAL</td>
						
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach ($transaksi as $transaksi) { ?>
					<tr>
						<td align="center"><?php echo $i ?></td>
						<td align="center"><?php echo $transaksi->kode_produk ?></td>
						<td align="center"><?php echo ($transaksi->nama_produk) ?></td>
						<td align="left"><?php echo 'Rp.  '.number_format($transaksi->harga) ?></td>
						<td align="center"><?php echo number_format($transaksi->jumlah) ?></td>
						<td align="left"><?php echo 'Rp.  '.number_format($transaksi->total_harga) ?></td>	
					</tr>
				</tbody>
				<?php $i++; } ?>
					<tr>
						<td colspan="5" align="right">Biaya Transport</td>
						<td align="left"><?php echo 'Rp.  '.number_format($transaksi->biaya_transport) ?></td>
					</tr>
					<tr style="background-color: grey; font-weight: bold;" class="form-control">
						<td colspan="5" align="right">SUBTOTAL</td>
						<td align="left"><?php echo 'Rp.  '.number_format($transaksi->subtotal) ?></td>
					</tr>
			</table>
	<p><i>Terima Kasih, Sudah mempercayai jasa kami untuk pernikahan anda</i></p>
	</style>
	
</body>
</html>