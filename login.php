<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/login.css">
</head>
<body>
  <form action="includes/signin.php" method="post">
    <img class="logo" src="images/logo.png">
    <div class="wrapper">
      <div class="input-data">
        <input type="email" name="mail" required placeholder= "Username" onfocus="this.placeholder=''" onblur="this.placeholder='Username'" required>
      </div>
    </div>
    <div class="wrapper">
      <div class="input-data">
        <input type="password" name="pwd" required placeholder= "Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" required>
      </div>
    </div>
    <center>
      <div class="login-btn">
        <input type="submit" name="login-submit" value="Login">
      </div>
    </center>
  </form>
</body>
</html>
