<?php
class Transaccion{
    private $db;
    private $db_table="transaccion";

    public $nrotrans;
    public $cedula;
    public $nrocuenta;
    public $fecha;
    public $hora;
    public $tipo;
    public $valor;

    public $result;

    public function __construct($db){
        $this->db = $db;
    }

    // Método para agregar un transacción
    function addTransaccion(){
        $sqlquery = "INSERT INTO " .$this->db_table. " (cedula, nrocuenta, fecha, hora, tipo, valor) values ('$this->cedula', '$this->nrocuenta', '$this->fecha', '$this->hora', '$this->tipo', '$this->valor')";
        $this->db->query($sqlquery);

        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // Método para consultar la tabla transacción
    function getTransaccion(){
        $sqlquery = "SELECT nrotrans, cedula, nrocuenta, fecha, hora, tipo, valor FROM ".$this->db_table."";
        $this->result = $this->db->query($sqlquery);
        return $this->result;
    }

    // Método que devuelve una transacción por numero de transacción
    function getTransaxNro(){
        $sqlquery = "SELECT nrotrans, cedula, nrocuenta, fecha, hora, tipo, valor FROM ".$this->db_table." WHERE nrotrans = ".$this->nrotrans;
        $registro = $this->db->query($sqlquery);
        $datarow = $registro->fetch_assoc();
        if (isset($datarow['nrocuenta'])){
            $this->nrocuenta = $datarow['nrocuenta'];
            $this->nrocuenta = $datarow['cedula'];
            $this->fecha = $datarow['fecha'];
            $this->hora = $datarow['hora'];
            $this->tipo = $datarow['tipo'];
            $this->valor = $datarow['valor'];
        }
    }

    // Método para actualizar transacción
    function updateTransa(){
        $sqlQuery = "UPDATE " . $this->db_table . " SET nrocuenta = '" . $this->nrocuenta . "',
        fecha = '" . $this->fecha. "',
        hora = '" . $this->hora. "',
        tipo = '" . $this->tipo. "',
        valor = '" . $this->valor. "'
        WHERE nrotrans = " . $this->nrotrans;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // Método para eliminar una transacción
    function deleteTransa(){
        $sqlQuery = "DELETE FROM " . $this->db_table . "
            WHERE nrotrans = " . $this->nrotrans;
            $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0){
                return true;
            }
            return false;
    }
}