<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/upload/black.png') ?>">
<h2 class="l-text2 t-center">
	<?php echo $title ?>
</h2>
<p class="m-text13 t-center">
	<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text14 p-b-7">
					Kategori Produk
				</h4>

				<ul class="p-b-54">
					<?php foreach ($listing_kategori as $listing_kategori) { ?>
					<li class="p-t-4">
						<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
							<?php echo $listing_kategori->nama_kategori; ?>
						</a>
					</li>
				<?php } ?>
				
				</ul>
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

			<!-- Product -->
			<div class="row">
				<?php foreach($produk as $produk){ ?>
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>" widht="420" height="320">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
							<?php echo $produk->nama_produk ?>
							</a>

							<span class="block2-price m-text6 p-r-5">
								IDR <?php echo number_format($produk->harga,'0',',','.') ?>
							</span>
						</div>
						<table>
							<tr class="table-row">
							<td>
									<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="btn btn-info btn-xs">
									<i class="fa fa-eye"></i>  lihat Detail Produk</a>
							</td>
							</tr>
					</table>
					</div>
				</div>
			<?php } ?>
								
			</div>

			<!-- Pagination -->
			<div class="pagination flex-m flex-w p-t-26 text-center">
				<?php echo $pagin; ?>
			</div>
		</div>
	</div>
</div>
</section>
