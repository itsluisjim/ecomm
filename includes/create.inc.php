<?php
//checks if form has been submitted
if(isset($_POST["submit"])){

    // grabbing data submitted by form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST["email"];
    $systemID = $_POST["systemID"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    include "../classes/dbh.classes.php";
    include "../classes/create.classes.php";
    include "../classes/create-contr.classes.php";

    // Instantiate Create controller class and pass grabbed data
    $create = new CreateContr($firstName, $lastName, $email, $systemID, $password, $passwordConfirm);

    // create user
    $create->createUser();

    session_start();
    $_SESSION["systemID"] = $systemID;
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["email"] = $email;
    $_SESSION['cart'] = array();

    // after creation, reroute to homepage
    header("location: ../homepage.php?error=none");
}