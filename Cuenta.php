<?php
class Cuenta{
    private $db;
    private $db_table="cuenta";

    public $nrocuenta;
    public $cedula;
    public $fechaapertura;
    public $saldo;

    public $result;

    public function __construct($db){
        $this->db = $db;
    }

    // Método para agregar un cuenta
    function addCuenta(){
        $sqlquery = "INSERT INTO " .$this->db_table. " (cedula, fechaapertura, saldo) values ('$this->cedula', '$this->fechaapertura', '$this->saldo')";
        $this->db->query($sqlquery);

        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // Método para consultar la tabla Cuenta
    function getCuenta(){
        $sqlquery = "SELECT nrocuenta, cedula, fechaapertura, saldo FROM ".$this->db_table."";
        $this->result = $this->db->query($sqlquery);
        return $this->result;
    }

    // Método que devuelve un cuenta por numero de cuenta
    function getCuentaxNro(){
        $sqlquery = "SELECT nrocuenta, cedula, fechaapertura, saldo FROM ".$this->db_table." WHERE nrocuenta = ".$this->nrocuenta;
        $registro = $this->db->query($sqlquery);
        $datarow = $registro->fetch_assoc();
        if (isset($datarow['cedula'])){
            $this->cedula = $datarow['cedula'];
            $this->fechaapertura = $datarow['fechaapertura'];
            $this->saldo = $datarow['saldo'];
        }
    }

    // Método para actualizar cuenta
    function updateCuenta(){
        $sqlQuery = "UPDATE " . $this->db_table . " SET cedula = '" . $this->cedula . "',
        fechaapertura = '" . $this->fechaapertura. "',
        saldo = '" . $this->saldo. "'
        WHERE nrocuenta = " . $this->nrocuenta;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // Método para eliminar un cuenta
    function deleteCuenta(){
        $sqlQuery = "DELETE FROM " . $this->db_table . "
            WHERE nrocuenta = " . $this->nrocuenta;
            $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0){
                return true;
            }
            return false;
    }
}