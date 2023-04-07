<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="./styles/addProduct.css"rel="stylesheet" />
    <link href="./styles/create.css" rel="stylesheet" />

    <title>Insert Product</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <div class="root-container-create">
        <h1 class="banner-title">Add product</h1>

        <div class="card-container-create">
            <div class="card">
                <h2 class="card-title">Product Info</h2>
                <form action="./includes/addProduct.inc.php" method="post" enctype="multipart/form-data">

                    <label for="productName" class="login-labels">Product Name</label><br />
                    <input type="text" id="productName" name="productName" required /><br />

                    <label for="serialNumber" class="login-labels">Serial Number</label><br />
                    <input type="text" id="serialNumber" name="serialNumber" required /><br />

                    <label for="assetTag" class="login-labels">Asset Tag</label><br />
                    <input type="text" id="assetTag" name="assetTag" required /><br />

                    <label for="price" class="login-labels">Price</label><br />
                    <input type="number" min='0' id="price" name="price" step="0.01" required /><br />

                    <label for="year" class="login-labels">Year</label><br />
                    <input type="number" min='0' id="year" name="year" min="2000" max="<?php echo date("Y") ?>" step="1" required /><br />


                    <label for="category" class="login-labels">Category</label><br />
                    <select name="category" id="category" class="select-inputs">
                        <option value="1">Laptop</option>
                        <option value="2">Desktop</option>
                        <option value="3">Accessories</option>
                    </select><br /><br />

                    <label for="brand" class="login-labels">Brand</label><br />
                    <select name="brand" id="brand" class="select-inputs">
                        <option value="1">Apple</option>
                        <option value="2">Dell</option>
                        <option value="3">HP</option>
                        <option value="4">Insignia</option>
                    </select><br /><br />

                    <label for="description" class="login-labels">Description</label><br />
                    <textarea id="description" name="description" rows="8" required></textarea><br /><br />


                    <label for="productImg" class="login-labels">Chose image:</label><br />
                    <input type="file" name="productImg" id="productImg" accept="image/jpeg" required><br /><br />

                    <button class="insert-item-btn" type="submit" name="submit">
                        Insert Item
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>