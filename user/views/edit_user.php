<?php

$user = query("SELECT * FROM users WHERE id_user = '" . $_SESSION['user_id'] . "'")[0];

if (isset($_POST['submit'])) {

  $name = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];
  $newImage = date('dmYHis') . $name;
  $path = "../file/img/" . $newImage;

  if (move_uploaded_file($tmpName, $path)) {
    $query = "SELECT * FROM users WHERE id_user = '" . $_SESSION['user_id'] . "'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);

    if (is_file("../file/img/" . $data['image'])) {
      unlink("../file/img/" . $data['image']);
    }

    $query = "UPDATE users SET image = '$newImage' WHERE id_user = '" . $_SESSION['user_id'] . "'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
      echo "
      <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
      </script>
      ";
      header("location: index.php?page=home");
    } else {
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='index.php?page=profile'>Kembali Ke Form</a>";
    }
  } else {
    echo   "<script> alert('Maaf, Gambar gagal untuk diupload'); 
              location = 'index.php?page=profile'; 
              </script>";
  }
}



?>

<h1>Edit Profile</h1>
<form action="" method="POST" enctype="multipart/form-data">
  <ul>
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
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>