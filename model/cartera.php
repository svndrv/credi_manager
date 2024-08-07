<?php 
class Cartera extends Conectar {
    private $db;
    private $cartera;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->cartera = array();
    }
    public function obtener_cartera(){
        $sql = "SELECT * FROM cartera";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtener_cartera_x_id($id){
        $sql = "SELECT * FROM cartera WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function agregar_cartera($nombres, $dni, $celular){

        if(empty($nombres) || empty($dni) || empty($celular)){
            return [
                "status" => "error",
                "message" => "Verifica los campos vacíos."
            ];
        }
        
        $sql = "INSERT INTO cartera (nombres, dni, celular, created_at ,updated_at) VALUES(?, ?, ?, now(), now())";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $nombres);
        $sql->bindValue(2, $dni);
        $sql->bindValue(3, $celular);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Cliente creado exitosamente."
        ];
        return $response;

    }
    public function eliminar_cartera($id){
        $sql = "DELETE FROM cartera WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Cliente eliminado exitosamente."
        ];
        return $response;
    }
    public function actualizar_cartera($id, $nombres, $dni, $celular){

       if(empty($nombres) || empty($dni) || empty($celular)){
        
        return [
            "status" => "error",
            "message" => "Verifique los campos vacíos."
        ];
       }
       
       $sql = "UPDATE cartera SET nombres = ?, dni = ?, celular = ?, updated_at = now() WHERE id = ?";
       $sql = $this->db->prepare($sql);
       $sql->bindValue(1, $nombres);
       $sql->bindValue(2, $dni);
       $sql->bindValue(3, $celular);
       $sql->bindValue(4, $id);
       $sql->execute();

       return [
        "status" => "success",
        "message" => "Cliente editado correctamente."
        ];
    }

    public function obtener_cartera_x_dni($dni){
        $sql = "SELECT * FROM cartera WHERE dni = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $dni);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    

}
?>