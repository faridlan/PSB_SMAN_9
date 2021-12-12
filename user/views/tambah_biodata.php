<?php

if (isset($_POST['submit'])) {
  if (tambah_biodata($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Tambahkan');
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<h1>Tambah Biodata</h1>

<form action="" method="POST">
  <ul>
    <li>
      <label for="fullname">fullname</label>
      <input type="text" id="fullname" name="fullname">
    </li>
    <li>
      <label for="nisn">nisn</label>
      <input type="text" id="nisn" name="nisn">
    </li>
    <li>
      <label for="alamat">alamat</label>
      <input type="text" id="alamat" name="alamat">
    </li>
    <li>
      <label for="jenis_kelamin">jenis_kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </li>
    <li>
      <label for="agama">Agama</label>
      <select id="agama" name="agama">
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katholik">Katholik</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
        <option value="Konghucu">Konghucu</option>
      </select>
    </li>
    <li>
      <label for="tempat_lahir">tempat_lahir</label>
      <input type="text" id="tempat_lahir" name="tempat_lahir">
    </li>
    <li>
      <label for="tgl_lahir">tgl_lahir</label>
      <input type="date" id="tgl_lahir" name="tgl_lahir">
    </li>
    <li>
      <label for="asal_sekolah">asal_sekolah</label>
      <input type="text" id="asal_sekolah" name="asal_sekolah">
    </li>
    <li>
      <label for="no_telp">no_telp</label>
      <input type="text" id="no_telp" name="no_telp">
    </li>
    <li>
      <label for="nama_ortu">nama_ortu</label>
      <input type="text" id="nama_ortu" name="nama_ortu">
    </li>
    <li>
      <input type="text" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>