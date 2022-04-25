<br>
<div class="col-md-4">
<p>
	<a href="<?php echo base_url('admin/blog/tambah')?>" class="btn btn-success btn-lg">
     <i class="fa fa-plus"></i> Tambah Baru </a>
</p>
</div>
<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
<br><br><br><br>
<div class="box">
    <div class="box-body">
		<table class="table table-bordered" id="example1">	
			<thead>
				<tr>
					<th>NO</th>
					<th>GAMBAR</th>
					<th>KATEGORI</th>
					<th>JUDUL</th>
					<th>DESKRIPSI</th>
					<th>STATUS</th>
					<th>POST</th>
					<th>ACTION</th>
				</tr>
			</thead>

			<tbody>
				<?php $no=1; foreach ($blog as $blog) {?>
				<tr>
					<td><?php echo $no ?></td>
					<td>
						<img src="<?php echo base_url('assets/upload/image/thumbs/'.$blog->gambar)?>" class="img img-responsive img-thumbnail" width="60">
					</td>
					<td><?php echo $blog->nama_kategori ?></td>
					<td><?php echo $blog->judul_blog?></td>
					<td><?php echo $blog->deskripsi?></td>
					<td><?php echo $blog->status_blog?></td>
					<td><?php echo date('d-m-Y',strtotime($blog->tanggal_post)) ?></td>
					<td>


						<a href="<?php echo base_url('admin/blog/edit/'.$blog->id_blog)?>"class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<a href="<?php echo base_url('blog/detail/'.$blog->slug_blog)?>"class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

						<?php include('delete.php') ?>
					</td>
				</tr>
			<?php $no++; } ?>
			</tbody>
		</table>
	</div>
</div>