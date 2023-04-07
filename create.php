<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="./styles/create.css" rel="stylesheet" />
  <title>Website Create Account</title>
</head>

<body class="root-container-create">

  <div class="top-bar">
    <div class="empty-div"></div>
    <h1 class="create-header">Create Account</h1>
    <div class="return-button-container">
      <a href="./homepage.php" class="return-button">Return to homepage</a>
    </div>
  </div>

  <div class="card-container-create">
    <div class="card">
      <h2 class="card-title">Create an account</h2>
      <form action="./includes/create.inc.php" method="post">

        <label for="firstName" class="login-labels">First Name</label><br />
        <input type="text" id="firstName" name="firstName" /><br />

        <label for="lastName" class="login-labels">Last Name</label><br />
        <input type="text" id="lastName" name="lastName" /><br />

        <label for="email" class="login-labels">Email<?php if(isset($_GET['error']) && $_GET['error'] == 'SystemIdTakenOREmailTaken') echo '<span style="font-size: 12px; float: right; color: red; padding-top:4px;">Email/SystemID is taken</span>'?></label><br />
        <input type="text" id="email" name="email" /><br />

        <label for="systemID" class="login-labels">System ID<?php if(isset($_GET['error']) && $_GET['error']=='SystemIdTakenOREmailTaken') echo '<span style="font-size: 12px; float: right; color: red; padding-top:4px;">Email/SystemID is taken</span>'?></label><br />
        <input type="text" maxlength="8" id="systemID" name="systemID"/><br />

        <label for="Password" class="login-labels">Password</label><br />
        <input type="password" id="password" name="password" /><br />

        <label for="PasswordConfirm" class="login-labels">Confrim Password</label><br />
        <input type="password" id="passwordConfirm" name="passwordConfirm" /><br />

        <button  type="submit" name="submit" id="submitBtn" class="loginButton" disabled>
          Create Account
        </button>
        <div class="link-container-create">
          <a href="./login.php">Have an account? Log in.</a>
        </div>
      </form>
    </div>
  </div>
  <script src="./errorHandlerCreate.js"></script>
</body>

</html>