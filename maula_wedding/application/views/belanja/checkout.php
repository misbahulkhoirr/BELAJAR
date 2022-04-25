
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
	<!-- Cart item -->
	<div class="container-table-cart pos-relative">
		<div class="wrap-table-shopping-cart bgwhite">

			<h1><?php echo $title ?></h1><hr>
			<div class="clearfix"></div><br>

			<?php if($this->session->flashdata('warning')){
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('warning');
				echo '</div>';
				}
			 ?>
			

		<table class="table-shopping-cart">
			<thead>
			<tr class="table bg-info text-strong" style="font-weight: bold; color: white; !important;">
				<th class="column-1">GAMBAR</th>
				<th class="column-2">PRODUK</th>
				<th class="column-3">HARGA</th>
				<th class="column-4" style="text-align: center;">JUMLAH</th>
				<th class="column-5" width="15%">SUBTOTAL</th>
				<th class="column-6" width="15%">ACTION</th>
			</tr>
			</thead>
			<?php 
			//looping data keranjang belanja
			foreach ($keranjang as $keranjang) {

				//Ambil data produk
				$kode_produk    =$keranjang['id'];
				$produk  	  =$this->produk_model->detail($kode_produk);

				//update jumlah checkout
				 echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));

			 ?>

			<tr class="table-row">
				<td class="column-1">
					<div class="cart-img-product b-rad-4 o-f-hidden">
						<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
					</div>
				</td>
				<td class="column-2"><?php echo $keranjang['name'] ?></td>
				<td class="column-3"><?php echo number_format($keranjang['price'],'0',',','.') ?></td>
				<td class="column-4" align="center">
					<div class="flex-w bo5 of-hidden w-size17">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>

						<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

						<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>
					</div>
				</td>
				<td class="column-5"> 
				<?php  
					$total_harga = $keranjang['price']*$keranjang['qty'];
					echo number_format($total_harga,'0',',','.');
				?></td>
				<td>
					    <button type="submit" name="update" class="btn btn-success btn-sm">
						<i class="fa fa-edit"></i> Update</button>

						<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-trash-o"></i>  Hapus</a>
				</td>

			</tr>
			<?php echo form_close();
		} ?>


			 <tr style="font-weight: bold; ">
			 	<td colspan="4" class="column-1">Total Belanja</td>
			 	
			 	<td colspan="2" class="column-2" ><?php echo $this->cart->total() ?></td>
			 </tr>

		</table><br>
			
			<?php echo form_open(base_url('belanja/checkout')); 
			$kode_transaksi = date('dmY').strtoupper(random_string('alnum', 8));
			

			$kode_pembayaran = date('dmY').strtoupper(random_string('alnum', 4));
			?>

			<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
			<input type="hidden" name="kode_produk" value="<?php echo $produk->kode_produk; ?>">
			<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">

		<table class="table">	
				<tr>
					<th width="25%">TUJUAN</th>
					<td width="20%">
						<select name="id_transport" id="id_transport" onchange="changeValue(this.value)" class="form-control" required>
				            <option></option>
				           <?php  
				           foreach($transport as $transport){ ?>

				                    <option value="<?php echo $transport->id_transport?>"> <?php echo $transport->tujuan ?> </option>
							     <?php 
							     		$jsArray .= "biaya_transport['" . $transport->id_transport. "'] = {biaya_transport:' " . addslashes($transport->biaya_transport) . "'};"; 
							     	} ?>
				        </select>
				    </td>
					 <td></td>
					 <th class="column-1">BIAYA TRANSPORT</th>

					 <?php if($transport->id_transport==true) {?>
					<td class="column-2">
						<input name="biaya_transport"id="biaya_transport" readonly></td>
							<?php } ?>
				</tr>
				<tr class="table bg-info text-strong" style="font-weight: bold; color: white; !important;">
					
			 	<td colspan="4" class="column-1">SUBTOTAL</td>	
			 	<td colspan="2" class="column-2"><input name="subtotal"id="subtotal" class="form-control" readonly></td>

			 </tr>

			
		</table>

		<table class="table">
					<tr>
						<th width="25%">Kode Transaksi</th>
						<th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required>

						<input type="hidden" name="kode_pembayaran" class="form-control" value="<?php echo $kode_pembayaran ?>"></th>
					</th>
					</tr>
					<tr>
						<th width="25%">Nama Penerima</th>
						<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Email Penerima</td>
						<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required></td>
					</tr>
					
					<tr>
						<td>Telepon Penerima</td>
						<td><input type="text" name="telepon" class="form-control" placeholder="telepon" value="<?php echo $pelanggan->telepon ?>" required></td>
					</tr>
					<tr>
						<td>Alamat Pengiriman</td>
						<td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
					</tr>

					<tr>
						<td>Tanggal Pernikahan</td>
						<td><input type="text" name="tanggal_pernikahan" id="datepicker" class="form-control" placeholder="bulan/tanggal/tahun"required></td>
					</tr>
					
					<tr>
						<td>Nama Pengantin</td>
						<td><textarea name="nama_pengantin" class="form-control" placeholder="contoh : andi & anna"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button class="btn btn-success btn-lg" type="submit">
								<i class="fa fa-save" ></i>  Chekout Sekarang
							</button>

							<button class="btn btn-default btn-lg" type="reset">
								<i class="fa fa-times" ></i>  Reset
							</button>
						</td>
					</tr>
					
				</tbody>
			</table>

			<?php echo form_close(); ?>
			
		</div>
	</div>

	<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
		<div class="flex-w flex-m w-full-sm">
			
		</div>

		<div class="size10 trans-0-4 m-t-10 m-b-10">
			<!-- Button -->
			
		</div>
	</div>

             

</div>
</section>

<!-- Tampilkan biaya transport berdasarkan tujuan -->
 <script type="text/javascript">
    <?php 
    echo $jsArray; ?>
    
    function changeValue(id_transport) {
    var biaya = document.getElementById("biaya_transport").value = biaya_transport[id_transport].biaya_transport;
 
         subtotal.value = parseInt(<?=$this->cart->total()?>)+ parseInt(biaya);
    }
</script>
