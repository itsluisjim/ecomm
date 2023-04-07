<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account</title>
  <link href="./styles/account.css" rel="stylesheet" />
</head>

<body>
  <?php include 'nav.php' ?>
  <h1 class="banner-title">Account</h1>

  <div class="root-container-account">
    <div class="card">
      <div class="card--icon-container">
        <i class="profile-icon fa-solid fa-user"></i>
      </div>
      <div class="card--info">
        <div>
          <p class="labels">First:</p>
          <div class="label-info-container">
            <?php echo $_SESSION['firstName'] ?>
          </div>
        </div>
        <div>
          <p class="labels">Last:</p>
          <div class="label-info-container">
            <?php echo $_SESSION['lastName'] ?>
          </div>
        </div>
        <div>
          <p class="labels">Email:</p>
          <div class="label-info-container">
            <?php echo $_SESSION['email'] ?>
          </div>
        </div>
      </div>
    </div>
    <a href="./includes/logout.inc.php" class="logout-btn">
      Logout
    </a>
  </div>

</body>

</html>