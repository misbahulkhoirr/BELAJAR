  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/upload/logo.png" style=" width: 70px; height: 50px;" class="img-circle" alt="Maula Wedding">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      
       <!-- MENU DASHBOARD -->
          <li <?=$this->uri->segment(2)=='dashboard' || $this->uri->segment(2)=='' ? 'class="active" ':''?>>
            <a href="<?php echo base_url ('admin/dashboard')?>">
                <i class="fa fa-dashboard"></i>
                  <span>DASHBOARD</span>
              </a>
          </li>

           <!-- MENU TRANSAKSI -->
            <li class="treeview <?=$this->uri->segment(2)=='transaksi'|| $this->uri->segment(3)=='terkonfirmasi' || $this->uri->segment(3)=='selesai'? 'active':''?>">
            <a href="<?php echo base_url('admin/transaksi')?>">
              <i class="fa fa-shopping-cart"></i>
              <span>
                TRANSAKSI
              </span>
               <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
              <li <?=$this->uri->segment(3)=='index' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/transaksi/index')?>"><i class="fa fa-home"></i>
                   Transaksi Masuk
                </a>
              </li>

                <li <?=$this->uri->segment(3)=='transaksi_selesai' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/transaksi/transaksi_selesai')?>"><i class="fa fa-home"></i>
                  Transaksi Selesai
                </a></li>
            </ul>
           </li>

          <!-- MENU KAS MASUK -->
          <li <?=$this->uri->segment(2)=='laporan_penjualan' || $this->uri->segment(2)=='' ? 'class="active" ':''?>><a href="<?php echo base_url ('admin/laporan_penjualan')?>">
                <i class="fa fa-book"></i>
                  <span>LAPORAN PENJUALAN</span>
              </a>
          </li>

            <!-- MENU PRODUK  -->
          <li class="treeview <?=$this->uri->segment(2)=='produk'|| $this->uri->segment(2)=='kategori' ? 'active':''?>">
            
            <a href="<?php echo base_url('admin/produk') ?>">
              <i class="fa fa-sitemap"></i><span> PRODUK</span>
               <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
              <li <?=$this->uri->segment(2)=='produk' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/produk')?>"><i class="fa fa-table"></i>Data Produk</a>
              </li>


              <li <?=$this->uri->segment(2)=='kategori' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/kategori')?>"><i class="fa fa-tags"></i>
                  Kategori
                </a>
              </li>
            </ul>
          </li>

          <!-- MENU ONGKOS PENGIRIMAN -->
           <li <?=$this->uri->segment(2)=='transport' ? 'class="active" ':''?>>
            <a href="<?php echo base_url ('admin/transport')?>">
                <i class="fa fa-bus"></i>
                  <span>TRANSPORTASI</span>
              </a>
          </li>

            <!-- MENU REKENING  -->
               <li <?=$this->uri->segment(2)=='rekening' ? 'class="active" ':''?>>
                <a href="<?php echo base_url ('admin/rekening')?>">
                    <i class="fa fa-bank"></i>
                     <span>DATA REKENING</span>
                  </a>
              </li>

          <!-- MENU USER -->
          <li class="treeview <?=$this->uri->segment(2)=='admin'||$this->uri->segment(2)=='pelanggan' ? 'active':''?>">
            <a href="<?php echo base_url('admin/admin') ?>">
              <i class="fa fa-user"></i>
              <span>
                PENGGUNA
              </span>
               <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
             <ul class="treeview-menu">
              <li <?=$this->uri->segment(2)=='pelanggan' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/pelanggan')?>"><i class="fa fa-table"></i>
                  Data Pelanggan
                </a>
              </li>

              <li <?=$this->uri->segment(2)=='admin' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/admin')?>"><i class="fa fa-table"></i>
                  Data Admin
                </a>
              </li>

            </ul>
           </li>

            <li class="header">LABELS</li>

              <!-- MENU BLOG  -->
               <li <?=$this->uri->segment(2)=='blog' ? 'class="active" ':''?>>
                <a href="<?php echo base_url ('admin/blog')?>">
                    <i class="fa fa-newspaper-o"></i>
                     <span> BERITA/BLOG</span>
                  </a>
              </li>

           <!-- MENU KONFIGURASI -->
          <li class="treeview <?=$this->uri->segment(3)=='index'|| $this->uri->segment(3)=='logo' || $this->uri->segment(3)=='icon'? 'active':''?>">
            <a href="<?php echo base_url('admin/konfigurasi')?>">
              <i class="fa fa-gears"></i>
              <span>
                KONFIGURASI
              </span>
               <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li <?=$this->uri->segment(3)=='index' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/konfigurasi/index')?>"><i class="fa fa-home"></i>
                  Konfigurasi Umum
                </a>
              </li>
              <li <?=$this->uri->segment(3)=='logo' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/konfigurasi/logo')?>"><i class="fa fa-image"></i>
                  Konfigurasi Logo
                </a></li>
                 <li <?=$this->uri->segment(3)=='icon' ? 'class="active" ':''?>>
                <a href="<?php echo base_url('admin/konfigurasi/icon')?>"><i class="fa fa-home"></i>
                  Konfigurasi Icon
                </a></li>
            </ul>
           </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url ('user/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

   