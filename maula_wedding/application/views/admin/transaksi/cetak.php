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
			width: 20cm;
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
		<div style="text-align: center;">
			<img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" width="40%">
				<p><?php echo $site->alamat; echo " ".$site->telepon ?></p>
		</div>
		
	<br>
		<h1>BUKTI TRANSAKSI PENJUALAN</h1>
		<table class="table table-bordered">
	<thead>
		<tr>
			<th width="20%">KODE TRANSAKSI</th>
			<th width="30%">: <?php echo $pembayaran->kode_transaksi ?></th>
			<th>TANGGAL PERNIKAHAN</th>
			<th>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan)) ?></th>
		</tr>
		<tr>
			<th>NAMA PELANGGAN</th>
			<th>: <?php echo $pembayaran->nama_pelanggan ?></th>
			<th>TANGGAL TRANSAKSI</th>
			<th>: <?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi))?></th>
		</tr>
		
	</thead>
	<tbody>
		<tr>
			<td width="20%">Total Belanja</td>
			<td>Rp. <?php echo number_format($pembayaran->subtotal,'0',',','.') ?></td>
			<td>Status bayar</td>
			<td><?php echo $pembayaran->status_bayar?></td>
		</tr>
		
		<tr>
			<td>Jumlah bayar</td>
			<td>Rp. <?php echo number_format($pembayaran->jumlah_bayar,'0',',','.')?></td>
			<td>Tanggal bayar</td>
			<td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_bayar))?></td>
		</tr>
		<tr>
			<td>Pembayaran dari rekening</td>
			<td><?php echo $pembayaran->nama_bank?> No.Rekening <?php echo $pembayaran->rek_pembayaran ?> a.n <?php echo $pembayaran->rek_pelanggan ?></td>
		</tr>
		<tr>
			<td>Pembayaran ke rekening</td>
			<td><?php echo $pembayaran->bank?> No.Rekening <?php echo $pembayaran->no_rekening ?> a.n <?php echo $pembayaran->nama_pemilik ?></td>
		</tr>
		<tr>
			<td>Bukti bayar</td>
			<td><?php if($pembayaran->bukti_bayar =="") {echo 'Belum ada'; }else{ ?>
				<img src="<?php echo base_url('assets/upload/image/'.$pembayaran->bukti_bayar) ?>" class="img img-thumbnail" width="100">
			<?php } ?>
			</td>
		</tr>
		
	</tbody>
</table>
<hr>
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
						<td colspan="5" style="text-align: right;">Biaya Transport</td>
						<td><?php echo 'Rp.  '.number_format($transaksi->biaya_transport) ?></td>
					</tr>
					<tr style="background-color: grey; font-weight: bold;" class="form-control">
						<td colspan="5" style="text-align: right;">SUBTOTAL</td>
						<td><?php echo 'Rp.  '.number_format($transaksi->subtotal) ?></td>
					</tr>
			</table>

	</div>
	
</body>
</html>