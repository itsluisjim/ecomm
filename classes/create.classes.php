<?php

class Create extends Dbh
{
    // This function sets the user into the database, it receives our data. It uses a prepared statement to
    // avoid SQL injection.
    protected function setUser($firstName, $lastName, $email, $systemID, $password)
    {
        //This line of code prepares the SQL query. The "?" is a placeholder.
        $stmt = $this->connect()->prepare('INSERT INTO users (userID, firstName, lastName, email, pwd) VALUES(?, ?, ?, ?, ?);');

        // hashes the password
        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        // exectutes the prepared statement and report is there are any errors.
        // the ? in the prapared statement will be replaced with our data.
        if (!$stmt->execute(array($systemID, $firstName, $lastName, $email, $hashPwd))) {
            $stmt = null;
            header("location: ../create.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    // This function is in charged quering the database for existing emails/systemIDs
    protected function checkUser($systemID, $email)
    {
        $stmt = $this->connect()->prepare('SELECT userID FROM users WHERE userID = ? OR email = ?;');

        if (!$stmt->execute(array($systemID, $email))) {
            $stmt = null;
            header("location: ../create.php?error=stmtfailed");
            exit();
        }

        $resultCheck = '';
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
