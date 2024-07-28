<?php 
class Bono extends Conectar {
    private $db;
    private $bono;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->bono = array();
    }
    public function obtener_bono(){
        $sql = "SELECT * FROM bono";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>