<?php

function get_materials($conn) {
    $sql = "SELECT * FROM Materialien";
    $result = $conn->query($sql);
    $response = [];
    while($row = $result->fetch_assoc()) {
        array_push($response, array("value" => $row['Material_id'], "name" => $row['Material_name'], "price" => $row["preisprocm"]));
    }
    return $response; 
}

function get_post_processing($conn) {
    $material_id = $_GET['material_id'];
    $sql = "SELECT * FROM Nachbearbeitungsmoeglichkeiten WHERE material_id = ". $material_id . ';';
    $result = $conn->query($sql);
    $response = [];
    while($row = $result->fetch_assoc()) {
        array_push($response, array("value" => $row['id'], "name" => $row['name']));
    }
    return $response; 
}
?>