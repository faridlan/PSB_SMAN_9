<?php

$pendaftaran = query("SELECT * FROM pendaftaran");

?>

<h1>PENDAFTARAN</h1>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <td>id_pendaftaran</td>
    <td>jurusan_id</td>
    <td>nilai_mtk</td>
    <td>nilai_ipa</td>
    <td>nilai_ing</td>
    <td>nilai_ind</td>
    <td>ijazah</td>
    <td>status_id</td>
    <td>user_id</td>
    <td>Action</td>
  </tr>
  <?php foreach ($pendaftaran as $row) : ?>
    <tr>
      <td><?= $row['id_pendaftaran'] ?></td>
      <td><?= $row['jurusan_id'] ?></td>
      <td><?= $row['nilai_mtk'] ?></td>
      <td><?= $row['nilai_ipa'] ?></td>
      <td><?= $row['nilai_ing'] ?></td>
      <td><?= $row['nilai_ind'] ?></td>
      <td><?= $row['ijazah'] ?></td>
      <td><?= $row['status_id'] ?></td>
      <td><?= $row['user_id'] ?></td>
      <td><a href="index.php?page=update&id=<?= $row['id_pendaftaran'] ?>">Ubah Status</a></td>
    </tr>
  <?php endforeach ?>
</table>