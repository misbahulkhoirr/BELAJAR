	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/upload/black.png') ?>);">
	<h2 class="l-text2 t-center">
		<?php echo $title ?>
	</h2>
	<p class="m-text13 t-center">
		<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
	</p>
</section>
	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
						<div class="item-blog p-b-80">
							<?php 	
									foreach($blog as $blog)
										{ ?>
							<a href="<?php echo base_url('blog/detail/'.$blog->slug_blog) ?>"class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="<?php echo base_url('assets/upload/image/'.$blog->gambar) ?>" alt="<?php echo $blog->judul_blog ?>" widht="420" height="520">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									<?php echo date('d-m-Y',strtotime($blog->tanggal_post ))?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="<?php echo base_url('blog/detail/'.$blog->slug_blog) ?>" class="m-text24">
										<?php echo $blog->judul_blog ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $blog->nama ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $blog->nama_kategori ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-12">
									<?php echo $blog->deskripsi ?>
								</p>

								<a href="<?php echo base_url('blog/detail/'.$blog->slug_blog) ?>" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
							<?php 	} ?>
						</div>
							
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
							<?php echo $pagin; ?>
					</div>
				</div>
			</div>
				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Kategori Blog
						</h4>

						<ul class="p-b-54">
							<?php foreach ($listing_kategori as $listing_kategori) { ?>
							<li class="p-t-4">
								<a href="<?php echo base_url('blog/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
									<?php echo $listing_kategori->nama_kategori; ?>
								</a>
							</li>
							<?php } ?>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Produk Kami
						</h4>

							<ul class="bgwhite">
							<?php foreach ($produk as $produk) { ?>
							<li class="flex-w p-b-20">
								<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
								</a>

								<div class="w-size23 p-t-5">
									<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="s-text20">
										<?php echo $produk->nama_produk ?>
									</a>
									<span class="dis-block s-text17 p-t-6">
										Rp. <?php echo $produk->harga ?>
									</span>
								</div>
							</li>
							<?php } ?>
						</ul>

						
						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							Tags
						</h4>
						<?php foreach ($tag_kategori as $tag_kategori) { ?>
						<div class="wrap-tags flex-w">
							
							<a href="<?php echo base_url('blog/kategori/'.$tag_kategori->slug_kategori) ?>" class="tag-item">
								<?php echo $tag_kategori->nama_kategori ?>
							</a>
							
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>