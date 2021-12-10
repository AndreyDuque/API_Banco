<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../Cuenta.php';

$database = new Database();
$db = $database->getConnection();

$cuentas = new Cuenta($db);
$records = $cuentas->getCuenta();
$countCuentas = $records->num_rows;

if ($countCuentas > 0){
    $arrayCuenta = array();
    while ($row= $records->fetch_assoc()){
        // agregar cada registro al array arrayCliente
        array_push($arrayCuenta, $row);
    }
    // convertir los datos del array en formato json
    echo json_encode($arrayCuenta);
}
else{
    http_response_code(404);
    echo json_encode(
        array(
            "message" => "Clientes no encontrados"
            )
        );
}