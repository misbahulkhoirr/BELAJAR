
<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">
<div class="sec-title p-b-60">
	<h3 class="m-text5 t-center">
		Produk Terbaru
	</h3><br>
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach($kategori as $kategori) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>" role="tab"><?php echo $kategori->nama_kategori ?></a>
				</li>
				<?php } ?>
			</ul>
		</div>
</div>

<!-- Slide2 -->
<div class="wrap-slick2">
	<div class="slick2">
		<?php foreach ($produk as $produk) {
		?>

		<div class="item-slick2 p-l-15 p-r-15">
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
					<img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>" widht="420" height="320">

					<div class="block2-overlay trans-0-4">
						<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
							<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
							<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
						</a>

						<div class="block2-btn-addcart w-size1 trans-0-4">
							<!-- Button Belanja -->							
						</div>
					</div>
				</div>

				<div class="block2-txt p-t-20">
					<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
						<?php echo $produk->nama_produk ?>
					</a>

					<span class="block2-price m-text6 p-r-5">
						Rp. <?php echo number_format($produk->harga,'0',',','.') ?>
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
</div>

</div>
</section>