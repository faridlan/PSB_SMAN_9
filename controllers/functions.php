<?php
$conn = mysqli_connect("localhost", "root", "", "psb_online_9");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

function query($query)
{
  global $conn;
  $reuslt = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($reuslt)) {
    $rows = $row;
  }
  return  $rows;
}
