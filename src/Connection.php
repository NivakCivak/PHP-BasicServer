<?php
namespace Rest\Server;

use mysqli;

class Connection
{
	  // global attributes, credentials
    private $conn;
    private $host="1207.0.0.1";
    private $user="root";
    private $pw="";
    private $db="myDB";

    // maybe you would like to do somenthing before
    public function __construct(){
        // echo 'Connected';
    }

    // main connection fuction
    public function connect()
    {
       $this->conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
       $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error: " . mysqli_connect_error());
        }
    return $this->conn;
    }
}

?>