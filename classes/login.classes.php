<?php

class Login extends Dbh
{

    // retrieves user from database
    protected function getUser($systemID, $password)
    {
        // sql call to retrive the password from the Database
        $stmt = $this->connect()->prepare('SELECT pwd FROM users WHERE userID = ?;');

        if (!$stmt->execute(array($systemID))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        // fetch data as assosicative array
        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // checks how many rows were returned
        if (count($loginData) == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }


        // Password that is stored in DB is hashed so we must 
        // verify that the password inputed equals the hashed password in the DB
        $pwdHashed = $loginData;
        $checkPwd = password_verify($password, $pwdHashed[0]["pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        } else if ($checkPwd == true) {

            // query the database for a userID and pwd that match
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userID = ? AND pwd = ?;');

            if (!$stmt->execute(array($systemID, $pwdHashed[0]["pwd"]))) {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            // checks how many rows were returned
            if (count($loginData) == 0) {
                $stmt = null;
                header("location: ../login.php?error=userNotFound");
                exit();
            }

            // fetch data as assosicative array
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['cart'] = array();
            $_SESSION["systemID"] = $user[0]["userID"];
            $_SESSION["firstName"] = $user[0]["firstName"];
            $_SESSION["lastName"] = $user[0]["lastName"];
            $_SESSION["email"] = $user[0]["email"];
            $stmt = null;
        }

        $stmt = null;
    }
}