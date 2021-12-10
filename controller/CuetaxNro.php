<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../Cuenta.php';

$database = new Database();
$db = $database->getConnection();

$cuenta = new Cuenta($db);
$cuenta->nrocuenta = isset($_GET['nrocuenta']) ? $_GET['nrocuenta'] : die();

$cuenta->getCuentaxNro();
if ($cuenta->cedula != null) {

    // create array
    $cuenta_arr = array(
        "nrocuenta" => $cuenta->nrocuenta,
        "cedula" => $cuenta->cedula,
        "fechaapertura" => $cuenta->fechaapertura,
        "saldo" => $cuenta->saldo

    );

    http_response_code(200);
    echo json_encode($cuenta_arr);
} else {
    http_response_code(404);
    echo json_encode("Cuenta NO encontrada.");
}