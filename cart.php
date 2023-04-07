<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="./styles/cart.css" rel="stylesheet" />
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="cart-root-container">
        <h1 class="shopping-cart-header">Shopping Cart</h1>

        <div class="cart-left-col">
            <div class="cart">
                <div class="products">

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
                        $_SESSION['total'] = 0;
                        $total = 0;


                        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
                            foreach ($row as $key => $value) {
                                $total = $total + $value['price'];
                        ?>
                                <div class="product-card">
                                    <img src="data:image/jpeg;base64,<?php echo $value['image'] ?>" class="card-img" alt="">
                                    <div class="product-info">
                                        <h3 class="product-name"><?php echo $value['name']; ?></h3>
                                        <p class="product-description"><?php echo $value['description']; ?></p>
                                        <div class="price-quantity-remove">
                                            <p class="product-price">$<?php echo $value['price']; ?></p>
                                            <button class="delete-btn" data-index="<?php echo $key; ?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    $_SESSION['total'] = $total;
                    ?>



                </div>
                <a href="./product.php" class="return-shopping-button">Return to Shopping</a>
            </div>

            <div class="cart-right-col">
                <div class="price-checkout">
                    <h2 class="total-price">Total Price: $<?php echo ($_SESSION['total'] == 0) ? '0.00' : $_SESSION['total'] ?></h2>
                    <a href="./checkout.php" class="checkout-button">Checkout</a>
                </div>
            </div>
        </div>
        <script>

            
            var btns = document.getElementsByClassName('delete-btn');

            for (var i = 0; i < btns.length; i++) {
                // Add a click event listener to the delete button
                btns[i].addEventListener('click', function() {

                    // Get the the container that surrounds an individual item
                    var item = this.closest('.product-card');

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
                    req.open('POST', 'cart-item-remove.php', true);

                    // The Content-Type representation header is used to indicate the original 
                    // media type of the resource (prior to any content encoding applied for sending)
                    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    // define a function to be executed when the request receives an answer.
                    req.onreadystatechange = function() {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            // Remove the list item from the DOM
                            item.parentNode.removeChild(item);
                        }
                    };

                    //send our index of the item that was clicked on
                    req.send('index=' + index);
                })
            };
        </script>
</body>

</html>