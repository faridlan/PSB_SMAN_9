<?php

$user = query("SELECT * FROM users WHERE id_user = '" . $_SESSION['user_id'] . "'")[0];

if (isset($_POST['submit'])) {
  if (edit_user($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
      </script>
      ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<h1>Edit Profile</h1>
<form action="" method="POST" enctype="multipart/form-data">
  <ul>
    <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
    <li>
      <label for="username">username</label>
      <input type="text" id="username" name="username" value="<?= $user['username'] ?>">
    </li>
    <li>
      <label for="email">email</label>
      <input type="text" id="email" name="email" value="<?= $user['email'] ?>">
    </li>
    <li>
      <img src="../file/img/<?= $user['image'] ?>" width="100px">
      <input type="file" id="image" name="image">
      <input type="hidden" id="old_image" name="old_image">
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>