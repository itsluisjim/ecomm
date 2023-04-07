<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <link href="./styles/nav.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2735052018.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'connect.php'?>
  <?php include 'add-to-cart.php'?>

  <header class="header">
    <!-- logo -->
    <div class="logo-and-brand">
      <a href="./homepage.php" class="logo-link"><img class="logo" src="./images/logo.png" alt="a trailblazer logo" /></a>
      <p class="brand">JAG | TECH</p>
    </div>

    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <!-- menu -->
    <nav>
      <ul class="navbar">
        <li><a class="<?php if ($current_page == 'homepage.php') echo 'active'; ?>" href="./homepage.php">Home</a></li>
        <li><a class="<?php if ($current_page == 'product.php') echo 'active'; ?>" href="./product.php">Products</a></li>
        <li><a class="<?php if ($current_page == 'aboutUS.php') echo 'active'; ?>" href="./aboutUS.php">About Us</a></li>
      </ul>
    </nav>

    <!-- search bar-->
    <form class="search-form" action="">
      <input class="search-bar" type="text" placeholder="Search..." name="search" />
      <button class="search-icon-btn" type="submit">
        <i class="search-icon fa fa-search"></i>
      </button>
    </form>

    <!-- icons -->
    <div class="icons-container <?php if (isset($_SESSION['systemID'])) echo 'adj-icons-container'; ?>">

      <?php
      if (!(isset($_SESSION['systemID']))) {
      ?>
        <a href="#" class="tooltip icon fa-solid fa-cart-shopping disable">
          <span class="tooltipContent tooltip-bottom">
            <span>Please login<br /><i class="fa-solid fa-arrow-right"></i><span>
              </span>
        </a>
      <?php
      } else {
      ?>
        <?php
        if ($_SESSION['systemID'] == 10000000) {
        ?>
          <a href="./addProduct.php"><i class="icon fa-solid fa-toolbox"></i></a>
        <?php
        } else {
          if(count($_SESSION['cart']) > 0 && $current_page != 'cart.php'){          
        ?>
          <a href="./cart.php"><i class="icon fa-solid fa-cart-shopping"></i><span class="badge"><?php echo count($_SESSION["cart"])?></span></a>
        <?php
          }
          else {
        ?>
          <a href="./cart.php"><i class="icon fa-solid fa-cart-shopping"></i></a>
        <?php
          }
        }
      }

      ?>

      <?php
      if (isset($_SESSION['systemID'])) {
      ?>
        <a href="./account.php" class="account-name-link">
          <i class="icon fa-solid fa-user"></i>
          <p>Hi! <?php echo $_SESSION['firstName'] ?></p>

        </a>
      <?php
      } else {
      ?>
        <div class="tooltip icon fa-solid fa-user">
          <span class="tooltipContent tooltip-bottom">
            <a href="./login.php" class="tooltip-btns">Login</a>
            <a href="./create.php" class="tooltip-btns">Signup</a>
          </span>
        </div>
      <?php
      }
      ?>
    </div>

  </header>
</body>

</html>