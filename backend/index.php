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
            //send_mail($_POST['data']);
            $order_id = create_order($conn, $_POST['data']);
            insert_customer($conn,  $order_id , $_POST['data']['customer']);

            send_email($_POST['data'], $_POST['data']['customer']['email'] ,get_content_for_customer($_POST['data']), $order_id);
            send_email($_POST['data'], "TQ4090000@gmail.com" ,get_content_for_tq($_POST['data']), $order_id);
            //send_email($_POST['data'], "aymenbaklouti01@gmail.com" , get_content_for_tq($_POST['data']), $order_id);
            //send_email($_POST['data'], "aymenbaklouti01@gmail.com" ,get_content_for_tq($_POST['data']), $order_id);
            echo json_encode (set_order_models($conn, $order_id, $_POST['data']));
            die();
        }   
    }
 }

?>