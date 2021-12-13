<?php

if (isset($_POST['submit'])) {
  if (update_pendaftaran($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Ubah');
      document.location.href = 'index.php?page=view_pendaftaran';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

$pendaftaran = query("SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'")[0];

?>

<h1>UPDATE PENDAFTARAN</h1>

<form action="" method="POST" enctype="multipart/form-data">
  <ul>
    <li>
      <label for="jurusan_id">jurusan</label>
      <select id="jurusan_id" name="jurusan_id">
        <option value="1" <?php if ($pendaftaran['jurusan_id'] == 1) echo 'selected="selected"'; ?>>IPA</option>
        <option value="2" <?php if ($pendaftaran['jurusan_id'] == 2) echo 'selected="selected"'; ?>>IPS</option>
      </select>
    </li>
    <li>
      <label for="nilai_mtk">nilai mtk</label>
      <input type="text" id="nilai_mtk" name="nilai_mtk" value="<?= $pendaftaran['nilai_mtk'] ?>">
    </li>
    <li>
      <label for="nilai_ipa">nilai ipa</label>
      <input type="text" id="nilai_ipa" name="nilai_ipa" value="<?= $pendaftaran['nilai_ipa'] ?>">
    </li>
    <li>
      <label for="nilai_ing">nilai ing</label>
      <input type="text" id="nilai_ing" name="nilai_ing" value="<?= $pendaftaran['nilai_ing'] ?>">
    </li>
    <li>
      <label for="nilai_ind">nilai ind</label>
      <input type="text" id="nilai_ind" name="nilai_ind" value="<?= $pendaftaran['nilai_ind'] ?>">
    </li>
    <li>
      <label for="ijazah">ijazah</label>
      <input type="file" id="ijazah" name="ijazah">
      <input type="hidden" id="ijazah_lama" name="ijazah_lama" value="<?= $pendaftaran['ijazah'] ?>">
    </li>
    <li>
      <input type="text" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>