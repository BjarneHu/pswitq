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
        $model_sql = sprintf("Insert into Bestellmodell (name, material_id, %s unit_price, quantity,
        volume, size,  color,  order_id)  VALUES ('%s', %d, %s %f, %d, %f, '%s', '%s', %d)", 
        $model['post_process'] ? 'post_process_id,' : '',
        $model['file_name'], 
        $model['material'], 
        $model['post_process'] ? $model['post_process'].',' : '', 
        $model['preis'], 
        $model['menge'], 
        $model['volumen'], 
        $model['xsize'].'x'.$model['ysize'].'x'.$model['zsize'], 
        $model['color'], 
        $order_id
        );
        $conn->query($model_sql);
    }
    echo 'ok';
    die(); 
}
?>