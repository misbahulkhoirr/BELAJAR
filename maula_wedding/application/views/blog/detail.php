<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/'.$blog->gambar) ?>" alt="php echo $blog->judul_blog">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $blog->judul_blog ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										<?php echo $blog->nama ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo date('d-m-Y',strtotime($blog->tanggal_post ))?>
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

								<p class="p-b-25">
									<?php echo $blog->deskripsi ?>
								</p>

								<p class="p-b-25">
									<?php echo $blog->keterangan ?>
								</p>
							</div>
						</div>

										
			
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
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
<section class="blog bgwhite p-t-94 p-b-65">
				<div class="container">
					<div class="sec-title p-b-52">
						<h3 class="m-text5 t-center">
							Related Blog
						</h3>
					</div>

					<div class="row">
						<?php foreach ($blog_related as $blog_related) {
							?>
						<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
							<!-- Block3 -->
							<div class="block3">
								<a href="<?php echo base_url('blog/detail/'.$blog_related->slug_blog) ?>" class="block3-img dis-block hov-img-zoom">
							<img src="<?php echo base_url('assets/upload/image/'.$blog_related->gambar) ?>" alt="<?php echo $blog_related->judul_blog ?>" widht="420" height="320">
						</a>

								<div class="block3-txt p-t-14">
									<h4 class="p-b-7">
										<a href="<?php echo base_url('blog/detail/'.$blog_related->slug_blog) ?>" class="m-text11">
											<?php echo $blog_related->judul_blog ?>
										</a>
									</h4>

									<span class="s-text6">By</span> <span class="s-text7"><?php echo $blog_related->nama ?></span>
									<span class="s-text6">on</span> <span class="s-text7"><?php echo date('d-m-Y',strtotime($blog_related->tanggal_post ))?></span>

									<p class="s-text8 p-t-16">
										<?php echo $blog_related->deskripsi ?>
									</p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</section>