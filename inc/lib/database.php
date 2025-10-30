<?php

require_once('/xampp/htdocs/arms/inc/config.php');

class DB
{
    private $host_name = host_name;
    private $user_name = user_name;
    private $password = password;
    private $db = db_name;

    public $con;
    public $error;



    public function __construct()
    {

        if (!isset($this->con)) {
            $this->con = new mysqli($this->host_name, $this->user_name, $this->password, $this->db);
            if (!$this->con) {
                echo 'Database connection failed';
                exit;
            }
        }
    }

    public function getuser_name()
    {
        return $this->user_name;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function getdb()
    {
        return $this->db;
    }

    public function gethost_name()
    {
        return $this->host_name;
    }

    public function __destruct()
    {
        $this->con->close();
    }
}
