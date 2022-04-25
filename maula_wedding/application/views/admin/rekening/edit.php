
<br>
<?php 
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/rekening/edit/'.$rekening->no_rekening),' class="form-horizontal"');
 ?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Bank</label>
       <div class="col-md-5">
          <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $rekening->nama_bank ?>" required>
       </div>
  </div>

   <div class="form-group">
    <label class="col-md-2 control-label">No. Rekening</label>
    <div class="col-md-5">
      <input type="number" name="no_rekening" class="form-control" placeholder="No. Rekening" value="<?php echo $rekening->no_rekening?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2 control-label">Nama Pemilik </label>
    <div class="col-md-5">
      <input type="text" name="nama_pemilik" class="form-control" placeholder="Atas Nama" value="<?php echo $rekening->nama_pemilik ?>" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2 control-label">Logo BANK</label>
    <div class="col-md-10">
       <input type="file" name="gambar" class="form-control" placeholder="Upload gambar" >
      <br> <img src="<?php echo base_url('assets/upload/image/'.$rekening->gambar)?>" class="img img-responsive img-thumbnail" width="200">
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