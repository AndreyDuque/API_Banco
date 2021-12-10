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
$cliente->cedula = $_GET['cedula'];
$cliente->nombre = $_GET['nombre'];
$cliente->telefono = $_GET['telefono'];

if ($cliente->updateCliente()) { // return true
    echo 'Cliente actualizado correctamente...';
} else { // return false
    echo 'El cliente NO se actualizó ...';
}