<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'home':
    include "../admin/views/home.php";
    break;
  case 'biodata':
    include "../admin/views/biodata.php";
    break;
  case 'pendaftaran':
    include "../admin/views/pendaftaran.php";
    break;
  case 'detail':
    include "../admin/views/detail_users.php";
    break;
  case 'update':
    include "../admin/views/ubah_status.php";
    break;
  case 'download':
    include "../admin/views/download_pdf.php";
    break;

  default:
    include "../admin/views/home.php";
    break;
}
