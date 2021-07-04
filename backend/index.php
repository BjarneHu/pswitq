<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");
//header('Access-Control-Allow-Credentials: true');

include_once  'api/getters.php';
include_once  'api/setters.php';
include_once  'api/mail.provider.php';
include_once "connect.php";

if(isset($_GET['request'])){
    if($_GET['request'] == "get_materials"){
        echo json_encode (get_materials($conn));
        die();
    }

    if($_GET['request'] === "get_post_processing"){
        echo json_encode (get_post_processing($conn, $_POST['get_post_processing']));
        die();
    }
}

if($_SERVER['REQUEST_METHOD']==='POST' && empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input'),true); 
    if(isset($_POST['request'])){
        if($_POST['request'] === "set_order"){
            send_mail($_POST['data']);
            echo json_encode (set_order($conn, $_POST['data']));
            die();
        }   
    }
 }

?>