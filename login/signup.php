<?php

if (isset($_POST['submit'])) {
  if (signup($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Tambahkan');
      document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<style>
  label {
    display: block;
  }
</style>
<h1>Sign UP</h1>
<form action="" method="POST">
  <ul>
    <li>
      <label for="username">username</label>
      <input type="text" id="username" name="username">
    </li>
    <li>
      <label for="email">email</label>
      <input type="text" id="email" name="email">
    </li>
    <li>
      <label for="password">password</label>
      <input type="text" id="password" name="password">
    </li>
    <li>
      <label for="confirm_password">confirm_password</label>
      <input type="text" id="confirm_password" name="confirm_password">
    </li>
    <li>
      <p>
        Have an account?
        <a href="index.php?page=login">Login</a>
      </p>
    </li>
    <li>
      <button type="submit" name="submit">Sign Up</button>
    </li>
  </ul>
</form>