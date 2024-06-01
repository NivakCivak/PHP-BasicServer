<?php
require '../vendor/autoload.php' ;
// You can include in any dir you need
use Rest\Server\BasicServer;

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class RestPost {
    private $service;

    public function __construct(){
        $this->service = new BasicServer();
    }

    // Create how many functions you need for controlling your app
    public function findAll(){
        echo $this->service->findSomething();
    }

}


// ---*********************************---

// maybe 'act' could be the action you want to execute
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['act'])){
    //Just is an idea for POST requests, you could have better one
    $ini = new RestPost();

    switch($_POST['act']){
        case 'findall': $ini->findAll(); /* (new RestPost())->findAll(); */ break;
        default: echo json_encode('{"error":"Upsss... json or str error switch"}');
    }
}else{
	    echo json_encode('{"error":"Upsss... json or str error"}');
	}
?>