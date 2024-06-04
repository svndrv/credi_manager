<?php 

class Campanas extends Conectar{
    private $db;
    private $campanas;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->campanas = array();
    }

    public function obtener_campanas(){
        $sql = "SELECT * FROM futuras_campanas";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_campanas($dni,$celular,$campana){
        $sql = "INSERT INTO futuras_campanas(dni,celular,campana,created_at,updated_at) VALUES(?,?,?,now(),now())";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$dni);
        $sql->bindValue(2,$celular);
        $sql->bindValue(3,$campana);
        $sql->execute();
        echo 'ok';
    }

    public function eliminar_campana($id){
        $sql = "DELETE FROM futuras_campanas WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        echo 'ok';
    }

    public function verificar_dni($dni){
        $sql = "SELECT * FROM base WHERE dni = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$dni);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if($result){
            echo "1";
        }else{
            echo "2";
        }

    }

    public function verificar_campana($dni){
        $sql = "SELECT * FROM base WHERE dni = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$dni);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if($result){
            echo "1";
        }else{
            echo "2";
        }

    }


}

?>