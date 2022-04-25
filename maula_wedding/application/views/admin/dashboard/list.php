    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>TRANSAKSI</h3><h4>MASUK</h4>
              
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?php echo base_url ('admin/pembayaran/terkonfirmasi')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>LAPORAN</h3><h4>PENJUALAN</h4>

            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url ('admin/laporan_penjualan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>DATA</h3><h4>PRODUK</h4>
              
            </div>
            <div class="icon">
              <i class="fa fa-sitemap"></i>
            </div>
            <a href="<?php echo base_url ('admin/produk')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>BIAYA</h3><h4>TRANSPORT</h4>
              
            </div>
            <div class="icon">
              <i class="fa fa-bus"></i>
            </div>
             <a href="<?php echo base_url ('admin/transport')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
  </div>
     </section>
     
<div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr class="bg-info">
            <th>NO</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>KODE TRANSAKSI</th>
            <th>PELANGGAN</th>   
            <th>JUMLAH ITEM</th>  
            <th>SUBTOTAL</th>
            <th>NAMA PENGANTIN</th>  
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1; foreach ($pembayaran as $pembayaran){ 
      
            ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo date('d-m-Y',strtotime($pembayaran->tanggal_transaksi)) ?></td>
             <td><?php echo $pembayaran->kode_transaksi ?></td>
            <td><?php echo $pembayaran->nama_pelanggan ?>
              <br><small>
                No.Telp  : <?php echo $pembayaran->telepon ?> <br>
                Email    : <?php echo $pembayaran->email ?>
              </small>
            </td>
            <td><?php echo $pembayaran->total_item ?></td>
            <td><?php echo $pembayaran->subtotal ?></td>
            <td><?php echo $pembayaran->nama_pengantin?></td>
            
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url('admin/transaksi/detail/'.$pembayaran->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                    <?php  
                     $days           = date('Y-m-d');
                     $tglpesan       =date('Y-m-d',strtotime('-3 days',strtotime($days)));

                     if($pembayaran->tanggal_transaksi<$tglpesan){
           
                       ?>
                           
                  <a href="base_url('admin/transaksi/hapus/'.$pembayaran->kode_transaksi)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Hapus</a>
                 <?php }
                ?> 
               
              </div>
              <div class="clearfix"></div>
            </td>
          </tr>
        </tbody>
        <?php $i++;} ?>
      
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->