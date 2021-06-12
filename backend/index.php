<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include_once  'api/gets.php';
include_once "connect.php";

if(isset($_GET['request'])){
    if($_GET['request'] == "get_materials"){
        echo json_encode (get_materials($conn));
        die();
    }

    if($_GET['request'] === "get_nachbearbeitung"){
        // call function
    }
}
?>