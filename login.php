<!DOCTYPE html>
<html>
<head>
  <title>
    Login to the IR432 Admin Site
  </title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <div class="container">
    <div class="login_box">
      <h1>ir432 Admin Login</h1>
      <form action="login_check.php" method="post">
        <input type="text" name="db_user" placeholder="username" /><br />
        <input type="password" name="db_pass" placeholder="******" /><br />
        <input type="submit" value="Login" />
        <!-- developer's note: the password is the same as the ...  -->
      </form>
    </div>
  </div>
</body>
</html>
