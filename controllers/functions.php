<?php
$conn = mysqli_connect("localhost", "root", "", "psb_online_9");

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

function signup($data)
{
  global $conn;

  $username = strtolower(stripslashes($data['username']));
  $email = $data['email'];
  $password = mysqli_real_escape_string($conn, $data['password']);
  $confirm_password = mysqli_real_escape_string($conn, $data['confirm_password']);

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Username Tidak Tersedia');
    </script>
    ";
    return false;
  }

  if ($password !== $confirm_password) {
    echo "
    <script>
      alert('Confirm Password Tidak Sesuai');
    </script>
    ";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users(username,email,password) VALUES ('$username','$email', '$password')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
