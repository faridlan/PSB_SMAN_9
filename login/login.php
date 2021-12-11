<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Login</h1>
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
        <button type="submit" name="submit">Login</button>
      </li>
    </ul>
  </form>
</body>

</html>