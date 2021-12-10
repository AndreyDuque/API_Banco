<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../Transaccion.php';
include_once '../Cuenta.php';

$database = new Database();
$db = $database->getConnection();
$transaccion = new Transaccion($db);
$cuenta = new Cuenta($db);

if (
    isset($_GET['nrocuenta'])
    && isset($_GET['cedula'])
    && isset($_GET['fecha'])
    && isset($_GET['hora'])
    && isset($_GET['tipo'])
    && isset($_GET['valor'])
) {
    if (
        $_GET['nrocuenta'] != ""
        && $_GET['cedula'] != ""
        && $_GET['fecha'] != ""
        && $_GET['hora'] != ""
        && $_GET['tipo'] != ""
        && $_GET['valor'] != ""
    ) {
        $cuenta->nrocuenta = $_GET['nrocuenta'];
        $cuenta->getCuentaxNro();
        if ($cuenta->nrocuenta != null && $cuenta->cedula == (int) $_GET['cedula']) {
            $transaccion->nrocuenta = $_GET['nrocuenta'];
            $transaccion->cedula = $_GET['cedula'];
            $transaccion->fecha = $_GET['fecha'];
            $transaccion->hora = $_GET['hora'];
            $transaccion->tipo = $_GET['tipo'];
            $transaccion->valor = $_GET['valor'];
            if ($transaccion->addTransaccion()) { // return true
                echo 'Transacción realizada correctamente...';
            } else { // return false
                echo 'La Transacción NO se realizó ...';
            }
        }else{
            echo "Numero de cedula no asociado a la cuenta...";
        }
    } else {
        echo "Falta información... !";
    }
} else {
    echo "Falta parametro... !";
}
