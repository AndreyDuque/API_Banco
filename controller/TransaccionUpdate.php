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
$transa->nrocuenta = $_GET['nrocuenta'];
$transa->fecha = $_GET['fecha'];
$transa->hora = $_GET['hora'];
$transa->tipo = $_GET['tipo'];
$transa->valor = $_GET['valor'];

if ($transa->updateTransa()) { // return true
    echo 'Transaccion actualizada correctamente...';
} else { // return false
    echo 'La Transaccion NO se actualizó ...';
}