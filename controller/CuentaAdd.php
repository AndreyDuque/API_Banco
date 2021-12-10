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

$cuenta->cedula = $_GET['cedula'];
$cuenta->fechaapertura = $_GET['fechaapertura'];
$cuenta->saldo = $_GET['saldo'];

if ($cuenta->addCuenta()) { // return true
    echo 'Cuenta creada correctamente...';
} else { // return false
    echo 'La cuenta NO se creó, el usuario no esta registrado ...';
}