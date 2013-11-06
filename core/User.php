<?php
class User{
    protected $login;
    protected $id;
    protected $ip;
    
   
            
    public function __construct() {
        if (isset($_SESSION['login']) && isset($_SESSION['is_login']) && !empty($_SESSION['login']) && !empty($_SESSION['is_login']))
        {
            $this->login = $_SESSION['login'];
            $this->id = $_SESSION['is_login'];
            $this->ip = GetRealIp();  
        }
    }
    public function isLogged()
    {
        if (!empty($this->login) && !empty($this->id))
        {
            return true;
        }
    }
    
    public function getLogin()
    { 
        if (!empty($this->login) && !empty($this->id))
        {
            return $this->login;
        }
        else
        {
            return 'Guest';
        }
    }
}
