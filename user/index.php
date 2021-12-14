<?php

session_start();
require "../controllers/functions.php";

if ($_SESSION['level'] == '') {
  # code...
  header("location:../index.php");
  exit;
}

$biodata1 = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");
$pendaftaran1 = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");

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

    #cetak {
      display: none;
    }
  </style>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="navbar" style="float: right; margin-right: 50px">
    <ul>
      <li>
        <a href="index.php?page=profile">Edit Profile</a>
      </li>
      <li>
        <a href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
  <div class="sidebar" style="float: left; margin-right: 30px ; height: 100vh;">
    <ul>
      <li><a href="index.php?page=home">home</a> </li>
      <li><a href="index.php?page=biodata">tambah biodata</a> </li>
      <li><a href="index.php?page=pendaftaran">tambah pendaftaran </a> </li>
      <li><a href="index.php?page=view_biodata">biodata </a> </li>
      <li><a href="index.php?page=view_pendaftaran">pendaftaran </a> </li>
      <li id="cetak"><a href="index.php?page=cetak">cetak kartu</a> </li>
    </ul>
  </div>
  <div class="content">
    <?php include "../controllers/config-user.php" ?>
  </div>
</body>

<?php if (mysqli_num_rows($pendaftaran1) > 0 && mysqli_num_rows($biodata1) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#cetak').css('display', 'block');
    });
  </script>

<?php } ?>

</html>