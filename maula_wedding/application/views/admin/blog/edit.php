<br>
<?php 
//error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
//notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/blog/edit/'.$blog->id_blog),' class="form-horizontal"');
 ?>

<div class="form-group">
    <label class="col-md-2 control-label">Kategori Blog</label>
    <div class="col-md-5">
      <select name="id_kategori" class="form-control" >
        <?php foreach ($kategori as $kategori){ ?>
    <option value="<?php echo $kategori->id_kategori ?>" 
      <?php if($blog->id_kategori==$kategori->id_kategori){ echo"selected";} ?>>
      <?php echo $kategori->nama_kategori ?> 
    </option>
     <?php } ?>
 </select>
    </div>
  </div>

<div class="form-group from-group-lg">
    <label class="col-md-2 control-label">Judul Blog</label>
    <div class="col-md-5">
      <input type="text" name="judul_blog" class="form-control" placeholder="Judul Blog" value="<?php echo $blog->judul_blog ?>" required>
    </div>
  </div>

<div class="form-group from-group-lg">
    <label class="col-md-2 control-label">Deskripsi</label>
    <div class="col-md-5">
      <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $blog->deskripsi ?>" required>
    </div>
  </div>

 <div class="form-group">
    <label class="col-md-2 control-label">Keteragan</label>
    <div class="col-md-10">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo $blog->keterangan ?></textarea>
    </div>
  </div> 

 <div class="form-group">
    <label class="col-md-2 control-label">Keywords</label>
    <div class="col-md-10">
      <textarea name="keywords" class="form-control" placeholder="Keywords untuk SEO google"><?php echo $blog->keywords ?></textarea>
    </div>
  </div> 

  <div class="form-group">
    <label class="col-md-2 control-label">Gambar Blog</label>
    <div class="col-md-10">
     <input type="file" name="gambar" class="form-control" >
    </div>
  </div> 

<div class="form-group">
    <label class="col-md-2 control-label">Status Blog</label>
    <div class="col-md-5">
    <select name="status_blog" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft" <?php if($blog->status_blog=="Draft"){echo "selected";} ?>>Simpan sebagai draft</option>
    </select>
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