<?php
//proteksi halaman admin dengan fungsi cek login (simple_login)
$this->login_admin->cek_login();

//gabungan layout jadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');