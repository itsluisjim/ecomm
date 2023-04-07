<?php

class AddProduct extends Dbh
{

    protected function addItem($productName, $serialNo,  $assetTag, $price, $year, $category, $brand, $description, $image)
    {
        //This line of code prepares the SQL query. The "?" is a placeholder.
        $stmt = $this->connect()->prepare('INSERT INTO product (serialNo, assetTag, `name`, price, years, `image`, `availability`, categoryID, brandID, `description`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $availability = "available";
        // exectutes the prepared statement and report is there are any errors.
        // the ? in the prapared statement will be replaced with our data.
        if (!$stmt->execute(array($serialNo, $assetTag, $productName, $price, $year, $image, $availability, $category, $brand, $description))) {
            $stmt = null;
            header("location: ../create.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
