<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./styles/checkout.css" rel="stylesheet" />
  <title>Checkout</title>
</head>

<body>
  <?php include 'nav.php' ?>
  <div class="checkout-root-container">
    <div class="top-bar">
      <div class="empty-div"></div>
      <h1 class="checkout-header">Checkout</h1>
      <div class="return-button-container">
        <a href="./product.php" class="return-button">Return to shopping</a>
      </div>
    </div>
    <div class="checkout-container">

      <div class="card-information">
        <h2>order summary</h2>
        <div class="items-listed">

          <?php
          if (empty($_SESSION['cart'])) {
          ?>
            <h1>Your cart is empty</h1>
            <?php
          } else {

            $sql = 'SELECT * from Product where';

            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
              if (count($_SESSION['cart']) == 1 || $i == count($_SESSION['cart']) - 1) {
                $sql .= ' serialNO = ?';
                break;
              }
              $sql .= ' serialNO = ? ||';
            }

            $sql .= ";";

            $params = $_SESSION['cart'];

            $result = $conn->prepare($sql);

            if (!$result->execute($params)) {
              $result = null;
              header("location: ../product.php?error=stmtfailed");
              exit();
            }

            while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
              foreach ($row as $key => $value) {
                $total = $total + $value['price'];
            ?>
                <div class="item-info">
                  <p><?php echo $value['name']; ?></p>
                  <p><?php echo $value['price']; ?></p>
                </div>
          <?php
              }
            }
          }
          ?>
        </div>
        <div class="order-total">
          <p>Order total:</p>
          <p>$ <?php echo $_SESSION['total']; ?></p>
        </div>
      </div>
    </div>


    <div class="buttons-container">
      <a href="./cart.php" class="btn btn-link">Back to Cart</a>
      <button class="btn" onclick="alert('Payment processing is yet to be implemented')">Process payment</button>
    </div>
  </div>
</body>

</html>