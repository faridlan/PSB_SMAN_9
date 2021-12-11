<?php

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  $x = mysqli_num_rows($result);

  if ($x > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      if ($row['level_id'] == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = 'Admin';

        header("location: admin/index.php");
      } else if ($row['level_id'] == 2) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['level'] = 'Admin';

        header("location: user/index.php");
      }
    }
  }
  $error = true;
}

?>


<body>
  <h1>Login</h1>
  <?php if (isset($error)) : ?>
    <h3 style="color: red;"></h3>
  <?php endif; ?>
  <form action="" method="POST">
    <ul>
      <li>
        <label for="username">username</label>
        <input type="text" id="username" name="username">
      </li>
      <li>
        <label for="password">password</label>
        <input type="text" id="password" name="password">
      </li>
      <li>
        <p>Don't have an account?
          <a href="index.php?page=signup">Sign Up</a>
        </p>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>
  </form>