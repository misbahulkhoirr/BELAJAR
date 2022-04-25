<!-- Cart -->
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

			<h1><?php echo $title ?></h1><hr>
			<div class="clearfix"></div><br>

			<?php if($this->session->flashdata('sukses')){
				echo '<div class="alert alert-success">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
				}
			 ?>
			

				<table class="table table-bordered">
					<tr class="bg-info">
						<th class="column-1">GAMBAR</th>
						<th class="column-2">PRODUK</th>
						<th class="column-3">HARGA</th>
						<th class="column-4 p-l-70">JUMLAH</th>
						<th class="column-5" width="15%">SUBTOTAL</th>
						<th class="column-6" width="20%">ACTION</th>
					</tr>

					<?php 
					
					//looping data keranjang belanja
					foreach ($keranjang as $keranjang) {
		
						//Ambil data produk
						$kode_produk    =$keranjang['id'];
						$produk  	  =$this->produk_model->detail($kode_produk);

						//form update jumlah list
						echo form_open(base_url('belanja/update_list/'.$keranjang['rowid']));
					 ?>

					<tr class="table-row">
						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
							</div>
						</td>
						<td class="column-2"><?php echo $keranjang['name'] ?></td>
						<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
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
						<td class="column-5">Rp. 
						<?php  
							$total_harga = $keranjang['price']*$keranjang['qty'];
							echo number_format($total_harga,'0',',','.');
						?></td>
						<td>
								<button class="btn btn-success btn-xs" type="submit">
								<i class="fa fa-edit" ></i>  Update
								</button>

								<a href="<?php echo base_url('belanja/delete/'.$keranjang['rowid']) ?>" class="btn btn-warning btn-xs">
								<i class="fa fa-trash-o"></i>  Hapus</a>
						</td>

					</tr>
					<?php 
					//form close
					echo form_close();

					// end looping keranjang belanja 
					}
					
					 ?>

					 <tr class="table-row bg-info text-strong" style="font-weight: bold; color: white !important;">
					 	<td colspan="4" class="column-1">Total Belanja</td>
					 	<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.')?></td>
					 </tr>

				</table>
			<p class="pull-right"><br>
				<a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-lg">
					<i class="fa fa-shopping-cart"></i> Checkout
				</a>
				<a href="<?php echo base_url('belanja/delete') ?>" class="btn btn-danger btn-lg">
					<i class="fa fa-trash-o"></i> Bersihkan Keranjang Belanja
				</a>

			</p>
		</div>
	</div>
</div>
	
</section>


