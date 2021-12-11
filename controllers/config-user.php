<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
  case 'home':
    include '../user/views/home.php';
    break;
  case 'biodata':
    include '../user/views/tambah_biodata.php';
    break;
  case 'pendaftaran':
    include '../user/views/tambah_pendaftaran.php';
    break;
  case 'cetak':
    include '../user/views/cetak_kartu.php';
    break;
  case 'profile':
    include '../user/views/edit_user.php';
    break;
  default:
    include '../user/views/home.php';
    break;
}
