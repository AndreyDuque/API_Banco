<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../Cliente.php';
$database = new Database();
$db = $database->getConnection();
$cliente = new Cliente($db);
$cliente->id = isset($_GET['id']) ? $_GET['id'] : die();
$cliente->getClientexID();
if ($cliente->cedula != null) {

    // create array
    $cliente_arr = array(
        "id" => $cliente->id,
        "cedula" => $cliente->cedula,
        "nombre" => $cliente->nombre,
        "telefono" => $cliente->telefono

    );

    http_response_code(200);
    echo json_encode($cliente_arr);
} else {
    http_response_code(404);
    echo json_encode("Cliente NO encontrado.");
}