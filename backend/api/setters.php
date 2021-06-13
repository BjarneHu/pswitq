<?php

function set_order($conn, $data) {
    $date = new DateTime('NOW');
    $order_sql = sprintf("Insert into Bestellung (Bestelldatum, Customer_customerid, Gesamtpreis) 
    VALUES ('%s', %d, %f)", 
    $date->format('c'), 
    $data['customer_id'],
    $data['total_price'],
    );
    $conn->query($order_sql);
    $order_id = $conn->insert_id;
    foreach($data['warencorb'] as $model) {
        //var_dump($model);
        //die();
        $model_sql = sprintf("Insert into Bestellmodell (name, material_id,  post_process_id, unit_price, quantity,
        volume, size,  color,  order_id)  VALUES ('%s', %d, %d, %f, %d, %f, %f, '%s', %d)", 
        $model['name'], 
        $model['material'], 
        $model['post_process'], 
        $model['preis'], 
        $model['menge'], 
        $model['volume'], 
        $model['size'], 
        $model['color'], 
        $order_id
        );
        $conn->query($model_sql);
    }
    echo 'ok';
    die(); 
}
?>