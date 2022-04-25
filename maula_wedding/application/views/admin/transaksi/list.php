<br>
  <?php echo form_open('admin/transaksi/filter_transaksi');?>

      <div class="col-md-3">
      <h4><b>Cari Tanggal Pernikahan</b></h4>
      </div>
<table class="table">
  <tbody>
    <tr>
      <th width="12%">Tanggal Awal :</th>
      <td width="10%"><input class="form-control" type="date" name="tanggal_awal" required></td>
      <th width="12%">Tanggal Akhir :</th>
      <td width="10%"><input class="form-control" type="date" name="tanggal_akhir" required></td>

      <td><button type="submit" value="submit" class="btn btn-primary">Cari</button></td>
      
    </tr>
    
  </tbody>
</table>
 <?php form_close(); ?>
<br>
<div class="box">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="bg-success">
          <th>NO</th>
          <th>TANGGAL TRANSAKSI</th>
          <th>TANGGAL PERNIKAHAN</th>
          <th>PELANGGAN</th>
          <th>KODE TRANSAKSI</th>
          <th>JUMLAH ITEM</th>
           <th>JUMLAH TOTAL</th>
          <th>STATUS BAYAR</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i=1; foreach ($pembayaran as $pembayaran){ ?>
        <tr>
          <td><?php echo $i ?></td>
           <td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
          <td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_pernikahan)) ?></td>
          <td><?php echo $pembayaran->nama_pelanggan ?>
            <br><small>
              No.Telp  : <?php echo $pembayaran->telepon ?>
              <br>Email    : <?php echo $pembayaran->email ?>
              <br>Alamat Kirim : <br><?php echo nl2br($pembayaran->alamat) ?>
            </small>
          </td>
          <td><?php echo $pembayaran->kode_transaksi ?></td>
          <td><?php echo $pembayaran->total_item ?></td>
          <td><?php echo number_format($pembayaran->subtotal) ?></td>
          <td><?php echo $pembayaran->status_bayar?></td>
          
          
          <td>
            <div class="btn-group">
              <a href="<?php echo base_url('admin/transaksi/detail/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>

              <a href="<?php echo base_url('admin/transaksi/cetak/'.$pembayaran->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>

              <a href="<?php echo base_url('admin/transaksi/update_status/'.$pembayaran->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update status</a>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="btn-group">
              <a href="<?php echo base_url('admin/transaksi/pdf/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh Pdf</a>

              <a href="<?php echo base_url('admin/transaksi/kirim/'.$pembayaran->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Pengiriman</a>

            </div>
          </td>
        </tr>
      </tbody>
      <?php $i++;} ?>
    </table>
  </div>
</div>
