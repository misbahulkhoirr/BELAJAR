<br>
<?php 
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/transport/tambah'),' class="form-horizontal"');
 ?>

  <div class="form-group">
    <label class="col-md-2 control-label">Tujuan</label>
    <div class="col-md-5">
      <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" value="<?php echo set_value('tujuan') ?>" required>
    </div>
  </div>

   <div class="form-group">
    <label class="col-md-2 control-label">Biaya Transport</label>
    <div class="col-md-5">
      <input type="number" name="biaya_transport" class="form-control" placeholder="Harga Kirim" value="<?php echo set_value('biaya_transport') ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2 control-label">Urutan</label>
    <div class="col-md-5">
      <input type="number" name="urutan" class="form-control" placeholder="Urutan transport" value="<?php echo set_value('urutan') ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
     <button class="btn btn-success btn-lg" name="submit" type="submit">
     	<i class="fa fa-save"></i> Simpan
     </button>

     <button class="btn btn-info btn-lg" name="reset" type="reset">
     	<i class="fa fa-times"></i> Reset
     </button>
    </div>
  </div>

 <?php echo form_close();?>