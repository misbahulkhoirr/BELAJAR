<br>
<div class="col-md-2">
	<p>
		<a href="<?php echo base_url('admin/rekening/tambah')?>" class="btn btn-success btn-lg">
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
					<th>NAMA BANK</th>
					<th>NO. REKENING</th>
					<th>PEMILIK</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($rekening as $rekening) {?>
				<tr>
					<td><?php echo $no ?></td>
					<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$rekening->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
					<td><?php echo $rekening->nama_bank?></td>
					<td><?php echo $rekening->no_rekening?></td>
					<td><?php echo $rekening->nama_pemilik ?></td>
					<td>
						<a href="<?php echo base_url('admin/rekening/edit/'.$rekening->no_rekening)?>"class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

						<a href="<?php echo base_url('admin/rekening/delete/'.$rekening->no_rekening)?>"class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
					</td>
				</tr>
			<?php $no++;} ?>
			</tbody>
		</table>
	</div>
</div>