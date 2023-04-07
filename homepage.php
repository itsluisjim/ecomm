<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <link href="./styles/homepage.css" rel="stylesheet" />
  <link href="./styles/nav.css" rel="stylesheet" />

  <!-- nav font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2735052018.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'nav.php' ?>

  <div class="banner--container">
    <h1 class="banner--title">JAGTECH</h1>
    <p class="banner--description">
      Welcome to JAGTECH! A new way for UNT Dallas students to shop. This company was started
      by students, for students. We partnered with UNT Dallas's own OIT office to bring the students
      of the University of North Texas at Dallas an affordable way to shop the necessary technology
      so that they can be successful inside and outside of the classroom. Our low prices on everything
      from HDMI cables to MacBook Airs, to gaming computers are made possible through our partnership
      and are only available to UNT Dallas students, both Undergraduates and Graduate students alike.
      We welcome you to browse our inventory and don't forget to blaze your trail!
    </p>
  </div>
  <section class="ft-prod--section">
    <h2>Featured Products</h2>
    <div class="prod--container">

      <?php
      $result = $conn->prepare('SELECT * FROM product ORDER BY RAND() LIMIT 8;');

      if (!$result->execute()) {
        $result = null;
        header("location: ../product.php?error=stmtfailed");
        exit();
      }

      while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($row as $key => $value) {
      ?>
        <a href="./item.php?serialNO=<?php echo $value['serialNO']; ?>">
          <div class="prod--card">
            <div>
              <img src="data:image/jpeg;base64,<?php echo $value['image']; ?>" alt="product" class="card--img"/>
            </div>
            <h4 style="margin-top: 0;"><?php echo $value['name'];?></h4>
            <p class="card--description">
              <?php echo substr($value['description'], 0, 150); ?>
            ...
            </p>
          </div>
        </a>
      <?php 
        }
      }
      ?>
    </div>
  </section>
</body>
<footer>
  <?php include 'footer.php' ?>
</footer>

</html>