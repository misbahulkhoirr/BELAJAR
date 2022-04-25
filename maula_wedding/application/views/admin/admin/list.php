<br>
<div class="col-md-3">
<p>
	<a href="<?php echo base_url('admin/admin/tambah')?>" class="btn btn-success btn-lg">
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
					<th>NAMA</th>
					<th>EMAIL</th>
					<th>USERNAME</th><!-- 
					<th>LEVEL</th> -->
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($admin as $admin) {?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $admin->nama ?></td>
					<td><?php echo $admin->email ?></td>
					<td><?php echo $admin->username ?></td>
					<!-- <td><?php echo $admin->akses_level ?></td> -->
					<td>
						<a href="<?php echo base_url('admin/admin/edit/'.$admin->id_admin)?>"class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

						<a href="<?php echo base_url('admin/admin/delete/'.$admin->id_admin)?>"class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
					</td>
				</tr>
			<?php $no++;} ?>
			</tbody>
		</table>
	</div>
</div>