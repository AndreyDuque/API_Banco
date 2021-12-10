<?php
class Cliente{
    private $db;
    private $db_table="cliente";

    public $id;
    public $cedula;
    public $nombre;
    public $telefono;

    public $result;

    public function __construct($db){
        $this->db = $db;
    }

    // Método para agregar un cliente
    function addCliente(){
        $sqlquery = "INSERT INTO " .$this->db_table. " (cedula, nombre, telefono) values ('$this->cedula', '$this->nombre', '$this->telefono')";
        $this->db->query($sqlquery);

        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // Método para consultar la tabla cliente
    function getClientes(){
        $sqlquery = "SELECT id, cedula, nombre, telefono FROM ".$this->db_table."";
        $this->result = $this->db->query($sqlquery);
        return $this->result;
    }

    // Método que devuelve un cliente por id
    function getClientexID(){
        $sqlquery = "SELECT id, cedula, nombre, telefono FROM ".$this->db_table." WHERE id = ".$this->id;
        $registro = $this->db->query($sqlquery);
        $datarow = $registro->fetch_assoc();
        if (isset($datarow['cedula'])){
            $this->cedula = $datarow['cedula'];
            $this->nombre = $datarow['nombre'];
            $this->telefono = $datarow['telefono'];
        }
    }

    // Método para actualizar cliente
    function updateCliente(){
        $sqlQuery = "UPDATE " . $this->db_table . " SET cedula = '" . $this->cedula . "',
        nombre = '" . $this->nombre. "',
        telefono = '" . $this->telefono. "'
        WHERE id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // Método para eliminar un cliente
    function deleteCliente(){
        $sqlQuery = "DELETE FROM " . $this->db_table . "
            WHERE id = " . $this->id;
            $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0){
                return true;
            }
            return false;
    }
}