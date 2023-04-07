<?php

class loginContr extends Login
{
    // private variables that hold our data
    private $systemID;
    private $password;

    // constructor used to set our data into our private variables
    public function __construct($systemID, $password)
    {
        $this->systemID = $systemID;
        $this->password = $password;
    }
    // This function checks for empty inputs. IF the condition is true an error
    // message will be displayed on the URL.
    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("locaton: ../login.php?error=emptyinput");
            exit();
        }

        // If info is provided correctly it will create a user by calling the function setUser
        // and passing out data to be queried from the database.
        $this->getUser($this->systemID, $this->password);
    }

    // Checks for empty inputs
    private function emptyInput(){
        $result = '';

        if (empty($this->systemID) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
