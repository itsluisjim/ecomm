<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="./styles/login.css" rel="stylesheet" />

  <title>Website Log In</title>
</head>

<body class="root-container-login">
  <div class="top-bar">
    <div class="empty-div"></div>
    <h1 class="header-title">Login</h1>
    <div class="return-button-container">
      <a href="./homepage.php" class="return-button">Return to homepage</a>
    </div>
  </div>

  <div class="card-container">
    <div class="card">
      <h2 class="card-title">Sign in</h2>
      <form action="./includes/login.inc.php" method="post">
        <label for="systemID" class="login-labels">System ID</label><br />
        <input type="text" maxlength="8" id="systemID" name="systemID" /><br />
        <label for="password" class="login-labels">Password</label><br />
        <input type="password" id="password" name="password" /><br />
        <?php if(isset($_GET['error']) && $_GET['error']=='usernotfound') {?><p style="font-size: 15px; color: red; text-align: center; margin: 10px;">USER NOT FOUND</p><?php }?>
        <button type="submit" name="submit" id='submitBtn' class="loginButton" disabled>LOGIN</button>
        <div class="link-container">
          <a href="#" id='forgotPassword'>Forgot Password?</a>
          <a href="./create.php">Create an Account</a>
        </div>
      </form>
    </div>
  </div>
  <script src="./errorHandlerLogin.js"></script>
</body>

</html>