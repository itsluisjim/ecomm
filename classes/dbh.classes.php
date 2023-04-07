<?php

class Dbh
{   
    // reuseble function that establishes a Database connection
    function connect(){
        try {
            $username = 'root';
            $password = '';

            $dbh = new PDO('mysql:host=127.0.0.1;dbname=eCommerce', $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $dbh;

        } catch (PDOException $e) {
            print "Errorsssss: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
