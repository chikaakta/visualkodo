<?php

    define("SERVER", "xxxxxxxxxxx");
    define("USER", "xxxxxxxxxx");
    define("PASSWORD", "xxxxxxxxxx");
    define("DB", "xxxxxxxxxxxxxxxx");

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Headers: X-Requested-With');
    header('Access-Control-Allow-Methods: GET,PUT,POST');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        $responce["MESSAGE"] = "UNSUPORTED METHOD";
        $responce["STATUS"] = 405;
        echo json_encode($responce);
        return;
    }

    $responce = array();
    $mysql = new mysqli(SERVER,USER,PASSWORD,DB);


    if($mysql->connect_error){
        $responce["MESSAGE"] = "INTERNAL SERVER ERROR";
        $responce["STATUS"] = 500;
        echo json_encode($responce);
        return;
    }

    $jsonData = file_get_contents('php://input'); //input from client
    $jsonDecode = json_decode($jsonData,true);

    if(is_array($jsonDecode)){

        foreach ($jsonDecode as $key => $value){
            $_POST[$key] = $value; //set to global variable
        }
    }

?>
