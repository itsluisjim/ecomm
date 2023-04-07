<?php
session_start();


if (isset($_POST['index'])) {

    //retrieve index of item
    $index = $_POST['index'];

    if(in_array($index, $_SESSION['cart']) === false){
        array_push($_SESSION['cart'] , $index);
      }
}
?>