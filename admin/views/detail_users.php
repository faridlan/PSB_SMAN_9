<?php

$users = query("SELECT u.id_user, u.username, u.email, u.password, u.image, l.nama_level
                FROM users as u
                INNER JOIN level as l ON u.level_id = l.id_level;");

?>

<h1>DETAIL USERS</h1>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <td>ID User</td>
    <td>Username</td>
    <td>Email</td>
    <td>Password</td>
    <td>Image</td>
    <td>Level</td>
  </tr>
  <?php foreach ($users as $row) : ?>
    <tr>
      <td><?= $row['id_user'] ?></td>
      <td><?= $row['username'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['password'] ?></td>
      <td> <img src="../file/img/<?= $row['image'] ?>" width="50px"></td>
      <td><?= $row['nama_level'] ?></td>
    </tr>
  <?php endforeach ?>
</table>