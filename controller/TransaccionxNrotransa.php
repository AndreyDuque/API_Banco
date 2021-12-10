<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../Transaccion.php';

$database = new Database();
$db = $database->getConnection();

$transaccion = new Transaccion($db);
$transaccion->nrotrans = isset($_GET['nrotrans']) ? $_GET['nrotrans'] : die();

$transaccion->getTransaxNro();
if ($transaccion->nrocuenta != null) {

    // create array
    $transa_arr = array(
        "nrotrans" => $transaccion->nrotrans,
        "nrocuenta" => $transaccion->nrocuenta,
        "fecha" => $transaccion->fecha,
        "hora" => $transaccion->hora,
        "tipo" => $transaccion->tipo,
        "valor" => $transaccion->valor

    );

    http_response_code(200);
    echo json_encode($transa_arr);
} else {
    http_response_code(404);
    echo json_encode("Transacción NO encontrada.");
}