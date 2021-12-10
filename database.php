<?php
class Database{
    public $db;
    public function getConnection(){
        $this->db = null;
        try{
            $this->db = new mysqli('localhost', 'root', '', 'bdbanco');
        }catch (Exception $e){
            echo "No hay conexión con la base de datos: " .$e->getMessage();
        }
        return $this->db;
    }
}