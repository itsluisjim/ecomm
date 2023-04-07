<?php

if(isset($_POST["submit"]))
{

    //grabs data
    $systemID = $_POST["systemID"];
    $passsword = $_POST["password"];

    //instantiate loginContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new loginContr($systemID, $passsword);

    //running error handlers and user login
    $login->loginUser();

    //goes back to front page
    header("location: ../homepage.php?error=none");
}