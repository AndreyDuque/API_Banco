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

if ($cliente->deleteCliente()) { // return true
    echo 'El Cliente se eliminó correctamente...';
} else { // return false
    echo 'El Cliente NO se eliminó ...';
}