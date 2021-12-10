<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../Transaccion.php';

$database = new Database();
$db = $database->getConnection();
$transacciones = new Transaccion($db);
$records = $transacciones->getTransaccion();
$countTransacciones = $records->num_rows;

if ($countTransacciones > 0){
    $arrayTransaccion = array();
    while ($row= $records->fetch_assoc()){
        // agregar cada registro al array arrayCliente
        array_push($arrayTransaccion, $row);
    }
    // convertir los datos del array en formato json
    echo json_encode($arrayTransaccion);
}
else{
    http_response_code(404);
    echo json_encode(
        array(
            "message" => "Transacciones no encontradas"
            )
        );
}