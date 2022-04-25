<br>
<div class="col-md-2">
	<p>
		<a href="<?php echo base_url('admin/transport/tambah')?>" class="btn btn-success btn-lg">
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
					<th>TUJUAN PENGIRIMAN</th>
					<th>BIAYA TRANSPORT</th>
					<th>URUTAN</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($transport as $transport) {?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $transport->tujuan?></td>
					<td>Rp. <?php echo $transport->biaya_transport?></td>
					<td><?php echo $transport->urutan ?></td>
					<td>
						<a href="<?php echo base_url('admin/transport/edit/'.$transport->id_transport)?>"class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

						<a href="<?php echo base_url('admin/transport/delete/'.$transport->id_transport)?>"class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
					</td>
				</tr>
			<?php $no++;} ?>
			</tbody>
		</table>
	</div>
</div>