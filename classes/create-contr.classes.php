<?php

class CreateContr extends Create
{

    // private variables that hold our data
    private $firstName;
    private $lastName;
    private $email;
    private $systemID;
    private $password;
    private $passwordConfirm;


    // constructor used to set our data into our private variables
    public function __construct($firstName, $lastName,  $email, $systemID, $password, $passwordConfirm)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->systemID = $systemID;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    // This function runs several functions that checks for empty inputs, validates systemID's,
    // valid emails, checks if the password meets our requirements, checks if password and password
    // confirmation match, and makes sure the system ID or email is not already stored in the
    // database. If any condition is true an error message will be displayed on the URL.
    public function createUser()
    {
        if ($this->emptyInputHandler() === false) {
            header("location: ../create.php?error=emptyinput");
            exit();
        }
        if ($this->systemIDorEmailTakenCheck() === false) {
            header("location: ../create.php?error=SystemIdTakenOREmailTaken");
            exit();
        }

        // If info is provided correctly it will create a user by calling the function setUser
        // and passing our data to be stored in the database.
        $this->setUser($this->firstName, $this->lastName, $this->email, $this->systemID, $this->password);
    }

    // Checks for empty inputs
    private function emptyInputHandler()
    {
        $result = '';

        //empty() return true if variable is empty
        if (empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->systemID) || empty($this->password) || empty($this->passwordConfirm)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Queries the database to see if the email exists or systemID exists
    private function systemIDorEmailTakenCheck()
    {
        $result = '';

        // checkUser is a method in the Create class. The create controller extends the Create class.
        if (!$this->checkUser($this->systemID, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
