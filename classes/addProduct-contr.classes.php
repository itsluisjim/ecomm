<?php

class AddProductContr extends AddProduct
{

    // private variables that hold our data
    private $productName;
    private $serialNo;
    private $assetTag;
    private $price;
    private $year;
    private $category;
    private $brand;
    private $description;
    private $image;


    // constructor used to set our data into our private variables
    public function __construct($productName, $serialNo,  $assetTag, $price, $year, $category, $brand, $description, $image)
    {
        $this->productName = $productName;
        $this->serialNo = $serialNo;
        $this->assetTag = $assetTag;
        $this->price = $price;
        $this->year = $year;
        $this->category = $category;
        $this->brand = $brand;
        $this->description = $description;
        $this->image = $image;
    }

    // add an item by calling the function addItem
    // and passing out data to be stored in the database.
    public function addProduct()
    {
        if ($this->emptyInputHandler() == false) {
            header("locaton: ../addProduct.php?error=emptyinput");
            exit();
        }
        $this->addItem($this->productName, $this->serialNo, $this->assetTag, $this->price, $this->year, $this->category, $this->brand, $this->description, $this->image);
    }

    // Checks for empty inputs
    private function emptyInputHandler()
    {
        $result = '';

        //empty() return true if variable is empty
        if (empty($this->productName) || empty($this->serialNo) || empty($this->assetTag) || empty($this->price) || empty($this->year) || empty($this->category) || empty($this->brand) || empty($this->description) || empty($this->image)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
