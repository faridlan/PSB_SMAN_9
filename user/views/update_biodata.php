<?php

if (isset($_POST['submit'])) {
  if (update_biodata($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Ubah');
      document.location.href = 'index.php?page=view_biodata';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

$biodata = query("SELECT * FROM biodata WHERE user_id= '" . $_SESSION['user_id'] . "'")[0];

?>

<h1>Update Biodata</h1>

<form action="" method="POST">
  <ul>
    <li>
      <label for="fullname">fullname</label>
      <input type="text" id="fullname" name="fullname" value="<?= $biodata['fullname'] ?>">
    </li>
    <li>
      <label for="nisn">nisn</label>
      <input type="text" id="nisn" name="nisn" value="<?= $biodata['nisn'] ?>">
    </li>
    <li>
      <label for="alamat">alamat</label>
      <input type="text" id="alamat" name="alamat" value="<?= $biodata['alamat'] ?>">
    </li>
    <li>
      <label for="jenis_kelamin">jenis_kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin">
        <option value="Laki-Laki" <?php if ($biodata['jenis_kelamin'] == "Laki-Laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
        <option value="Perempuan" <?php if ($biodata['jenis_kelamin'] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
      </select>
    </li>
    <li>
      <label for="agama">Agama</label>
      <select id="agama" name="agama">
        <option value="Islam" <?php if ($biodata['agama'] == "Islam") echo 'selected="selected"'; ?>>Islam</option>
        <option value="Kristen" <?php if ($biodata['agama'] == "Kristen") echo 'selected="selected"'; ?>>Kristen</option>
        <option value="Katholik" <?php if ($biodata['agama'] == "Katholik") echo 'selected="selected"'; ?>>Katholik</option>
        <option value="Hindu" <?php if ($biodata['agama'] == "Hindu") echo 'selected="selected"'; ?>>Hindu</option>
        <option value="Budha" <?php if ($biodata['agama'] == "Budha") echo 'selected="selected"'; ?>>Budha</option>
        <option value="Konghucu" <?php if ($biodata['agama'] == "Konghucu") echo 'selected="selected"'; ?>>Konghucu</option>
      </select>
    </li>
    <li>
      <label for="tempat_lahir">tempat_lahir</label>
      <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $biodata['tempat_lahir'] ?>">
    </li>
    <li>
      <label for="asal_sekolah">asal_sekolah</label>
      <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?= $biodata['asal_sekolah'] ?>">
    </li>
    <li>
      <label for="no_telp">no_telp</label>
      <input type="text" id="no_telp" name="no_telp" value="<?= $biodata['no_telp'] ?>">
    </li>
    <li>
      <label for="nama_ortu">nama_ortu</label>
      <input type="text" id="nama_ortu" name="nama_ortu" value="<?= $biodata['nama_ortu'] ?>">
    </li>
    <li>
      <input type="text" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>