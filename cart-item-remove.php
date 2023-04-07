<?php
session_start();


if (isset($_POST['index'])) {

    //retrieve index of item
    $index = $_POST['index'];

    // Remove the item from the session variable
    unset($_SESSION['cart'][$index]);
}

?>
