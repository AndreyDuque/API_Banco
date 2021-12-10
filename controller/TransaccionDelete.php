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

$transa = new Transaccion($db);
$transa->nrotrans = isset($_GET['nrotrans']) ? $_GET['nrotrans'] : die();

if ($transa->deleteTransa()) { // return true
    echo 'La Transacción se eliminó correctamente...';
} else { // return false
    echo 'La Transacción NO se eliminó ...';
}