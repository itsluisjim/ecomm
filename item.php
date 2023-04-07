<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./styles/item.css" rel="stylesheet" />
  <title>Item</title>
</head>

<body>
  <?php include 'nav.php' ?>

  <div class="root-container-item">

    <?php
    $serialNO = (isset($_GET['serialNO'])) ? $_GET['serialNO'] : null;

    if ($serialNO == null) exit();

    $result = $conn->prepare('SELECT * from Product where serialNO = ?');

    if (!$result->execute(array($serialNO))) {
      $result = null;
      header("location: ../product.php?error=stmtfailed");
      exit();
    }

    $data = $result->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="item-card">
      <div class="item">
        <div class="left-column">
          <img class="itempic" src="data:image/jpeg;base64,<?php echo $data['image'] ?>" alt="item item" />
          <h3 class="available">Availability: <?php echo $data['availability']; ?></h3>
        </div>
        <div class="right-column">
          <h2 class="item-name"><?php echo $data['name']; ?></h2>
          <p class="description"><?php echo $data['description']; ?></p>
          <div class="price_button">
            <p class="price">Price: $<?php echo $data['price']; ?></p>
            <?php
            if (isset($_SESSION['systemID'])) {
            ?>
              <button class="button-atc" data-index="<?php echo $data['serialNO'] ?>">Add to Cart</button>
            <?php } else {
            ?>
              <button class="button-atc-disabled" disabled>Add to Cart</button>
            <?php
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var btn = document.querySelector('.button-atc');
    // Add a click event listener to the delete button
    btn.addEventListener('click', function() {

      // get the data-index that of the item that was clicked on
      var index = this.getAttribute('data-index');

      // The XMLHttpRequest object can be used to request data from a web server.
      // With a XMLHttpRequest object you can:

      // - Update a web page without reloading the page
      // - Request data from a server - after the page has loaded
      // - Receive data from a server - after the page has loaded
      // - Send data to a server - in the background

      // create an XMLHttpRequest object
      var req = new XMLHttpRequest();


      // method: the type of request: GET or POST
      // url: the server(file) location
      // async: true(asynchronous) or false(synchronous)
      req.open('POST', 'add-to-cart.php', true);

      // The Content-Type representation header is used to indicate the original 
      // media type of the resource (prior to any content encoding applied for sending)
      req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // define a function to be executed when the request receives an answer.
      req.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          console.log("Item added to cart")
        }
      };

      //send our index of the item that was clicked on
      req.send('index=' + index);
      window.location.reload();
    });
  </script>
</body>
<footer>
  <?php include 'footer.php' ?>
</footer>

</html>