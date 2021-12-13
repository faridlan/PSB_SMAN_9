<?php
$conn = mysqli_connect("localhost", "root", "", "psb_online_9");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
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

function tambah_pendaftaran($data)
{
  global $conn;

  $queryRes = "SELECT max(id_pendaftaran) as maxKode From pendaftaran";
  $result = mysqli_query($conn, $queryRes);
  $row = mysqli_fetch_assoc($result);

  $maxKode = $row['maxKode'];
  $i = (int) substr($maxKode, 4, 3);
  $i++;
  $char = '2021';
  $resKode = $char . sprintf('%03s', $i);

  $jurusan_id = $data['jurusan_id'];
  $nilai_mtk = $data['nilai_mtk'];
  $nilai_ipa = $data['nilai_ipa'];
  $nilai_ing = $data['nilai_ing'];
  $nilai_ind = $data['nilai_ind'];
  $user_id = $data['user_id'];

  $ijazah = upload_pdf();
  if (!$ijazah) {
    return false;
  }

  $query = "INSERT INTO pendaftaran (id_pendaftaran,jurusan_id, nilai_mtk, nilai_ipa, nilai_ing, nilai_ind, ijazah, user_id) VALUES
            ('$resKode','$jurusan_id', '$nilai_mtk', '$nilai_ipa', '$nilai_ing', '$nilai_ind',
            '$ijazah', '$user_id')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function update_status($data)
{
  global $conn;

  $id_pendaftaran = $data['id_pendaftaran'];
  $status = $data['status'];

  $query = "UPDATE pendaftaran SET status_id = '$status' WHERE id_pendaftaran = '$id_pendaftaran'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload_pdf()
{
  $nameFile = $_FILES['ijazah']['name'];
  $sizeFile = $_FILES['ijazah']['size'];
  $error = $_FILES['ijazah']['error'];
  $tmpName = $_FILES['ijazah']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
      alert('Pilih File Terlebih Dahulu');
    </script>
    ";
    return false;
  }

  $ektensiFileValid = ['pdf'];
  $ektensiFile = explode('.', $nameFile);
  $ektensiFile = strtolower(end($ektensiFile));
  if (!in_array($ektensiFile, $ektensiFileValid)) {
    echo "
    <script>
      alert('Yang Anda Upload Bukan PDF!!');
    </script>
    ";
  }

  if ($sizeFile > 1000000) {
    echo "
    <script>
      alert('File Terlalu Besar');
    </script>
    ";
  }

  // $newNameFile = uniqid();
  // $newNameFile .= '.';
  // $newNameFile .= $ektensiFile;

  $destination_path = getcwd() . DIRECTORY_SEPARATOR . '../file/pdf/';
  $target_path = $destination_path . basename($nameFile);

  move_uploaded_file($tmpName, $target_path);

  return $nameFile;
}
