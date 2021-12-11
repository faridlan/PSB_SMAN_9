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

  default:
    include "../admin/views/home.php";
    break;
}
