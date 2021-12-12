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

function tambah_biodata($data)
{
  global $conn;

  $fullname = $data['fullname'];
  $nisn = $data['nisn'];
  $alamat = $data['alamat'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $agama = $data['agama'];
  $tempat_lahir = $data['tempat_lahir'];
  $tgl_lahir = $data['tgl_lahir'];
  $asal_sekolah = $data['asal_sekolah'];
  $no_telp = $data['no_telp'];
  $nama_ortu = $data['nama_ortu'];
  $user_id = $data['user_id'];

  $query = "INSERT INTO biodata VALUES ('','$fullname', '$nisn', '$alamat', '$jenis_kelamin', '$agama', '$tempat_lahir', 
            '$tgl_lahir', '$asal_sekolah', '$no_telp',
            '$nama_ortu', '$user_id')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
