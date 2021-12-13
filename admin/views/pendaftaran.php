<?php

$pendaftaran = query("SELECT p.id_pendaftaran, j.nama_jurusan, p.nilai_mtk, p.nilai_ipa, p.nilai_ing, p.nilai_ind, 
                      p.ijazah, s.nama_status, u.username
                      FROM pendaftaran as p
                      INNER JOIN jurusan as j ON p.jurusan_id = j.id_jurusan
                      INNER JOIN status as s ON p.status_id = s.id_status
                      INNER JOIN users as u ON p.user_id = u.id_user");

?>

<h1>PENDAFTARAN</h1>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <td>id_pendaftaran</td>
    <td>jurusan</td>
    <td>nilai_mtk</td>
    <td>nilai_ipa</td>
    <td>nilai_ing</td>
    <td>nilai_ind</td>
    <td>ijazah</td>
    <td>status</td>
    <td>user</td>
    <td>Action</td>
  </tr>
  <?php foreach ($pendaftaran as $row) : ?>
    <tr>
      <td><?= $row['id_pendaftaran'] ?></td>
      <td><?= $row['nama_jurusan'] ?></td>
      <td><?= $row['nilai_mtk'] ?></td>
      <td><?= $row['nilai_ipa'] ?></td>
      <td><?= $row['nilai_ing'] ?></td>
      <td><?= $row['nilai_ind'] ?></td>
      <td><?= $row['ijazah'] ?></td>
      <td><?= $row['nama_status'] ?></td>
      <td><?= $row['username'] ?></td>
      <td><a href="index.php?page=update&id=<?= $row['id_pendaftaran'] ?>">Ubah Status</a></td>
    </tr>
  <?php endforeach ?>
</table>