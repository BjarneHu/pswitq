<?php

function get_materials($conn) {
    $sql = "SELECT * FROM Material";
    $result = $conn->query($sql);
    $response = [];
    while($row = $result->fetch_assoc()) {
        array_push($response, array("value" => $row['materialid'], "name" => $row['materialname']));
    }
    return $response; 
}
?>