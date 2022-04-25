 <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('user/dashboard') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Maula Wedding</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/upload/logo.png" class="user-image" alt="Maula Wedding">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Admin image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/upload/logo.png" class="img-circle" alt="Maula Wedding">

                <p>
                 <?php echo $this->session->userdata('nama'); ?> - <?php echo $this->session->userdata('akses_level'); ?>
                  <small><?php echo date('d m y') ?></small>
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
              
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>