<?php

function set_order($conn, $data) {
    $date = new DateTime('NOW');
    $order_sql = sprintf("Insert into Bestellung (Bestelldatum, Gesamtpreis) 
    VALUES ('%s', %f)", 
    $date->format('c'), 
    $data['total_price'],
    );

    $conn->query($order_sql);
    $order_id = $conn->insert_id;
    
    // insert customer
    $customer_sql = sprintf("Insert into Customer (nachname, vorname, adresse, plz, stadt, emailadresse, handynummer, tq_mitarbeiter, bestellnummer, note, unternehmen) 
    VALUES ('%s', '%s', '%s','%d', '%s', '%s', '%s', %d, %d, '%s', '%s')", 
    $data["customer"]["name"],
    $data["customer"]["vorname"],
    $data["customer"]["address"],
    $data["customer"]["zip"],
    $data["customer"]["city"],
    $data["customer"]["email"],
    $data["customer"]["tel"],
    array_key_exists("tq_mitarbeiter", $data["customer"]) ? 1 : 0,
    $order_id,
    $data["customer"]["note"],
    $data["customer"]["unternehemn"],
    );
    $conn->query($customer_sql);

    // insert bestellungsmodels
    foreach($data['warencorb'] as $model) {
        //$fileData = addslashes(file_get_contents($model['model_file']));
        $fileProperties = pathinfo($model['file_name']);
        $model_sql = sprintf("Insert into Bestellmodell 
        (name, material_id, %s unit_price, quantity, volume, size,  color,  order_id, model_file, file_type)  
        VALUES ('%s', %d, %s %f, %d, %f, '%s', '%s', %d, '%s', '%s')", 
        !empty($model['post_process']) ? 'post_process_id,' : '',
        $model['file_name'], 
        $model['material'], 
        !empty($model['post_process']) ? $model['post_process'].',' : '', 
        $model['preis'], 
        $model['menge'], 
        $model['volumen'], 
        $model['xsize'].'x'.$model['ysize'].'x'.$model['zsize'], 
        $model['color'], 
        $order_id,
        $model['model_file'],
        $model['file_type']
        );
        $conn->query($model_sql);
    }
    echo $conn->error;
    echo 'ok';
    die(); 
}
?>