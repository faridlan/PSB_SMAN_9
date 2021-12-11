<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>
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
</body>

</html>