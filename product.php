<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products</title>
  <link href="./styles/product.css" rel="stylesheet" />
</head>

<body>

  <?php include 'nav.php' ?>
  <div class="root-container-products">
    <div class="grid">
      <div class="filter-menu">
        <form class="filter-options" method="get">

          <div class="filter-type">
            <h3 class="filter-type-title">Category</h3>
            <label for=""><input type="radio" name="category" id="" value="all" checked />
              All</label>
            <label for=""><input type="radio" name="category" id="" value="1" <?php if(isset($_GET['category']) && $_GET['category'] == 1) echo 'checked' ?>/>
              Laptop</label>
            <label for=""><input type="radio" name="category" id="" value="2" <?php if(isset($_GET['category']) && $_GET['category'] == 2) echo 'checked' ?>/>
              Desktops</label>
            <label for=""><input type="radio" name="category" id="" value="3" <?php if(isset($_GET['category']) && $_GET['category'] == 3) echo 'checked' ?>/>
              Accessories</label>
          </div>

          <div class="filter-type">
            <h3 class="filter-type-title">Brand</h3>
            <label for="all"><input type="radio" name="brand" id="all" value="all" checked />
              All</label>
            <label for="apple"><input type="radio" name="brand" id="apple" value="1" <?php if(isset($_GET['brand']) && $_GET['brand'] == 1) echo 'checked' ?> />
              Apple</label>
            <label for="hp"><input type="radio" name="brand" id="hp" value="3" <?php if(isset($_GET['brand']) && $_GET['brand'] == 3) echo 'checked' ?> />
              HP</label>
            <label for="dell"><input type="radio" name="brand" id="dell" value="2" <?php if(isset($_GET['brand']) && $_GET['brand'] == 2) echo 'checked' ?>/>
              Dell</label>
              <label for="insignia"><input type="radio" name="brand" id="insignia" value="4" <?php if(isset($_GET['brand']) && $_GET['brand'] == 4) echo 'checked' ?>/>
              Insignia</label>
          </div>

          <div class="filter-type">
            <h3 class="filter-type-title">Price</h3>
            <label for=""><input type="radio" name="price" id="" value="all" checked /> All</label>
            <label for=""><input type="radio" name="price" id="" value="0-50" <?php if(isset($_GET['price']) && $_GET['price'] == '0-50') echo 'checked' ?>/> $0 - $50</label>
            <label for=""><input type="radio" name="price" id="" value="50-100" <?php if(isset($_GET['price']) && $_GET['price'] == '50-100') echo 'checked' ?>/> $50 - $100</label>
            <label for=""><input type="radio" name="price" id="" value="100-200" <?php if(isset($_GET['price']) && $_GET['price'] == '100-200') echo 'checked' ?>/> $100 - $200</label>
            <label for=""><input type="radio" name="price" id="" value="200-300" <?php if(isset($_GET['price']) && $_GET['price'] == '200-300') echo 'checked' ?>/> $200 - $300</label>
            <label for=""><input type="radio" name="price" id="" value="300-400" <?php if(isset($_GET['price']) && $_GET['price'] == '300-400') echo 'checked' ?>/> $300 - $400</label>
            <label for=""><input type="radio" name="price" id="" value="400-500" <?php if(isset($_GET['price']) && $_GET['price'] == '400-500') echo 'checked' ?>/> $400 - $500</label>
          </div>
          <input type="submit" value="Apply filter" class="filter-btn">
        </form>

      </div>

      <div class="products-container">
        <?php

        $sql = 'SELECT * from Product where `availability` = "available"';
        $params = array();

        if ($_GET['category'] != 'all') {

          $sql .= ' AND categoryID = ?';
          $params[] = $_GET['category'];
        }

        if($_GET['brand'] != 'all'){

          $sql .= ' AND brandID = ?';
          $params[] = $_GET['brand'];
        }

        if($_GET['price'] != 'all'){
          $range = explode('-', $_GET['price']);
          $sql .= ' AND price >= ? AND price <= ?';
          $params[] = $range[0];
          $params[] = $range[1];
        }

        $result = $conn->prepare($sql);

        if (!$result->execute($params)) {
          $result = null;
          header("location: ../product.php?error=stmtfailed");
          exit();
        }
        if($result->rowCount() <= 0){
          echo '<h1>No results found matching your filter constraints</h1>';
        }

        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
          foreach ($row as $key => $value) {
        ?>
            <a href="./item.php?serialNO=<?php echo $value['serialNO']; ?>" class="card-link">
              <div class="product-card">
                <img src="data:image/jpeg;base64,<?php echo $value['image']?>" alt="product" class="product-img" />
                <div class="product-info">
                  <h3><?php echo $value['name']; ?></h3><br/>
                  <p><strong>Price: </strong>$<?php echo $value['price']; ?></p>
                  <p><strong>Year: </strong><?php echo $value['years']; ?></p>
                  <p><strong>Availability: </strong><?php echo $value['availability']; ?></p>
                  <p><strong>Description: </strong><?php echo substr($value['description'], 0, 150); ?>...</p>
                </div>
              </div>
            </a>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  if (!isset($_GET['category']) && !isset($_GET['brand']) && !isset($_GET['price']) ) { // not submitted yet
  ?>
    <script>
      document.querySelector(".filter-options").submit();
    </script>
  <?php
  }
  ?>
</body>

</html>