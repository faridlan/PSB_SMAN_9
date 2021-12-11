<?php

require "../controllers/functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>
  <div class="navbar" style="float: right; margin-right: 50px">
    <ul>
      <li>
        <a href="index.php?page=profile">Edit Profile</a>
      </li>
      <li>
        <a href="">Logout</a>
      </li>
    </ul>
  </div>
  <div class="sidebar" style="float: left; margin-right: 30px ; height: 100vh;">
    <ul>
      <li><a href="index.php?page=home">home</a> </li>
      <li><a href="index.php?page=biodata">tambah biodata</a> </li>
      <li><a href="index.php?page=pendaftaran">tambah pendaftaran </a> </li>
      <li><a href="index.php?page=cetak">cetak kartu</a> </li>
    </ul>
  </div>
  <div class="content">
    <?php include "../controllers/config-user.php" ?>
  </div>
</body>

</html>