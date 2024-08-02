<?php
class Metasfv extends Conectar {
    private $db;
    private $metasfv;
    public function __construct(){
        $this->db = Conectar::conexion();
        $this->metasfv = array();
    }

    public function obtener_metasfv() {
        $sql = "SELECT * FROM metasfv";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}