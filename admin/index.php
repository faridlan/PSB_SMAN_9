<?php

session_start();
require "../controllers/functions.php";

if ($_SESSION['level'] == '') {
  # code...
  header("location:../index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>

<body>
  <div class="navbar" style="float: right; margin-right: 50px">
    <ul>
      <li>
        <a href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
  <div class="sidebar" style="float: left; margin-right: 30px ; height: 100vh;">
    <ul>
      <li>
        <a href="index.php?page=home">home</a>
      </li>
      <li>
        <a href="index.php?page=biodata">Biodata</a>
      </li>
      <li>
        <a href="index.php?page=pendaftaran">Pendaftaran</a>
      </li>
      <li>
        <a href="index.php?page=detail">Detail Users</a>
      </li>
    </ul>
  </div>
  <div class="content">
    <?php include "../controllers/config-admin.php" ?>
  </div>
</body>

</html>