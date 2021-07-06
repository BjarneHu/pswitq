<?php

function create_order($conn, $data){
    $date = new DateTime('NOW');
    $order_sql = sprintf("Insert into Bestellung (Bestelldatum, Gesamtpreis) 
    VALUES ('%s', %f)", 
    $date->format('c'), 
    $data['total_price'],
    );

    $conn->query($order_sql);
    return $conn->insert_id;
}

function insert_customer($conn, $order_id, $customer_data){
    // insert customer
    $customer_sql = sprintf("Insert into Customer (nachname, vorname, adresse, plz, stadt, emailadresse, handynummer, tq_mitarbeiter, bestellnummer, note, unternehmen) 
    VALUES ('%s', '%s', '%s','%d', '%s', '%s', '%s', %d, %d, '%s', '%s')", 
    $customer_data["name"],
    $customer_data["vorname"],
    $customer_data["address"],
    $customer_data["zip"],
    $customer_data["city"],
    $customer_data["email"],
    $customer_data["tel"],
    array_key_exists("tq_mitarbeiter", $customer_data) ? 1 : 0,
    $order_id,
    $customer_data["note"],
    $customer_data["unternehmen"],
    );
    $conn->query($customer_sql);
    return $conn->insert_id;
}

function set_order_models($conn, $order_id, $data) {
   

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