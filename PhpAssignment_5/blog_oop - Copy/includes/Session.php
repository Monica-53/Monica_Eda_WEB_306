<?php
/**
* Session class

**/

class Session
{

    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }

    }


    public function isLoggedIn()
    {
        if ($this->user) {
            return $this->user;
        } else {
            return false;
        }

    }

    public function login($userObj) {
        $this->user = $userObj;
        $_SESSION['user'] = $userObj;
    }
}

//End of Session Class
$session = new Session();
