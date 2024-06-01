<?php

namespace Rest\Server;
use Rest\Server\Connection;


class BasicServer {
    private $conn;

    // instantiate connection object
    public function __construct(){
        $this->conn = new Connection();
    }


    /*
        You can create how many methods / functions you want
        to get data from server, before configure credentials in Connection.php
    */
    public function findSomething(){

        $this->conn = $this->conn->connect();
        $json = array();

        $sql = "SELECT * FROM MyTable;";
        $result = $this->conn->query($sql);
        
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            $json[] = $row;
            }
        }else{
            arrar_push($json, array("error"=>"I didn't find something"));
        }

        $this->conn->close();

        return json_encode($json);
    }

}


?>