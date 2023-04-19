<?php

if (isset($_POST["submit"])) {

    // grabbing data submitted by form
    $productName = $_POST['productName'];
    $serialNo = $_POST['serialNumber'];
    $assetTag = $_POST["assetTag"];
    $price = $_POST["price"];
    $year = $_POST["year"];
    $category = $_POST["category"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $image = $_FILES["productImg"];

    // Get the temporary location
    $tmpName = $image['tmp_name'];

    // Read the file data into a string
    $fileData = file_get_contents($tmpName);

    // Encode the file data as a base64 string
    $base64Image = base64_encode($fileData);

    // echo $image;
    settype($price, 'double');
    settype($year, 'integer');


    include "../classes/dbh.classes.php";
    include "../classes/addProduct.classes.php";
    include "../classes/addProduct-contr.classes.php";

    // Instantiate addProduct controller class and pass grabbed data
    $item = new AddProductContr($productName, $serialNo, $assetTag, $price, $year, $category, $brand, $description, $base64Image);

    // add item into DB
    $item->addProduct();

    // after adding, reroute to add product page
    header("location: ../addProduct.php?error=none");
}
