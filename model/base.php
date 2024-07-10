<?php 

class Base extends Conectar{
    private $db;
    private $base;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->base = array();
    }

    public function verificar_dni_base($dni){
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

    // public function obtener_base(){
    //     $sql = "SELECT * FROM base";
    //     $sql = $this->db->prepare($sql);
    //     $sql->execute();
    //     return $sql->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function eliminar_base($id){
        $sql = "DELETE FROM base WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        echo 'ok';
    }

    public function obtener_base_x_dni($dni){
        $sql = "SELECT * FROM base WHERE dni = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $dni);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function obtener_base_x_dni($dni){
    //     $sql = "SELECT * FROM base WHERE 1=1";

    //     if ($dni) {
    //         $sql .= " AND dni = :dni";
    //     }

    //     $stmt = $this->db->prepare($sql);

    //     if ($dni) {
    //         $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    //     }

    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);

    // }


    public function obtener_registros_paginados($limit, $offset) {
        $sql = "SELECT * FROM base LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar_registros() {
        $sql = "SELECT COUNT(*) as total FROM base";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function obtener_base_x_id($id){
        $sql = "SELECT * FROM base WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


}

?>