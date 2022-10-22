<?php
/**
* Session class

**/

class Session
{
    private $user;
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }

    }

    /*
   * @return bool
   */

    public function isLoggedIn()
    {
        if ($this->user) {
            return $this->user;
        } else {
            return false;
        }
    }

    public function getUSer()
    {
        return $this->user;
    }

    /**
     * Registers a logged in user object
     * @param $userObj
     */

    public function login($userObj)
    {
        $this->user = $userObj;
        $_SESSION['user'] = $userObj;
    }

    /*       $this->user = false;
        $_SESSION[] = [];*/

    public function logout()
    {
        $user=false;
        $SESSION = array();
        session_destroy();

    }

}

//End of Session Class

?>
