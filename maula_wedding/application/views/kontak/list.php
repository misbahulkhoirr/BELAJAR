<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/upload/black.png') ?>)">
	<h2 class="l-text2 t-center">
		<?php echo $title ?>
	</h2>
	<p class="m-text13 t-center">
		<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
	</p>
</section>
	
	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="<?php echo base_url('assets/upload/maulawedding.jpg') ?>" alt="<?php echo $site->namaweb ?>">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h1 class="m-text26 p-t-15 p-b-16">
						<b><?php echo $site->namaweb ?>
					</h1>
		
					<p class="p-b-28">
						<?php echo $site->deskripsi ?>
					</p>
					
					<h1 class="m-text26 p-t-15 p-b-16">
						<b>Kontak Kami :
					</h1>
						<table class="table">
						
						<tbody>
							<tr>
								<td width="30%">Email</td>
								<td><?php echo $site->email ?></td>
							</tr>
							
							<tr>
								<td>Telepon</td>
								<td><?php echo $site->telepon ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?php echo $site->alamat ?></td>
							</tr>
							<tr>
								<td>Sosial Media</td>
								<td><a href="<?php echo $site->whatsapp ?>" class="fs-18 color1 p-r-20 fa fa-whatsapp"></a>
									<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
									<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
									<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
								</td>
							</tr>
							
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</section>