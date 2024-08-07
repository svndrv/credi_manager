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

    public function actualizar_usuario($id, $usuario, $contrasena, $nombres, $apellidos, $rol, $estado, $foto, $archivoFoto)
    {

        if (empty($usuario) ||empty($nombres) || empty($apellidos) || empty($rol) || empty($estado))
            return [
                "status" => "error",
                "message" => "Verfifique los campos vacios."
            ];

        if (empty($contrasena)) {
            $sql = "UPDATE usuario SET usuario = ?, nombres = ?, apellidos = ?, rol = ?, estado = ?, foto = ?, updated_at = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);

            if (empty($foto)) {
                $nombreFoto = $archivoFoto;
            } else {
                $nombreFoto = uniqid() . "-" . $_FILES["foto"]['name'];
                $ruta = "../img/fotos/" . $nombreFoto;
                move_uploaded_file($_FILES["foto"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $nombres);
            $sql->bindValue(3, $apellidos);
            $sql->bindValue(4, $rol);
            $sql->bindValue(5, $estado);
            $sql->bindValue(6, $nombreFoto);
            $sql->bindValue(7, $id);
            $sql->execute();

            return [
                "status" => "success",
                "message" => "Usuario editado correctamente."
            ];
        } else {
            $sql = "UPDATE usuario SET usuario = ?, contrasena = ?, nombres = ?, apellidos = ?, rol = ?, estado = ?, foto = ?, updated_at = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

            if (empty($foto)) {
                $nombreFoto = $archivoFoto;
            } else {
                $nombreFoto = uniqid() . "-" . $_FILES["foto"]['name'];
                $ruta = "../img/fotos/" . $nombreFoto;
                move_uploaded_file($_FILES["foto"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $contrasenaEncriptada);
            $sql->bindValue(3, $nombres);
            $sql->bindValue(4, $apellidos);
            $sql->bindValue(5, $rol);
            $sql->bindValue(6, $estado);
            $sql->bindValue(7, $nombreFoto);
            $sql->bindValue(8, $id);
            $sql->execute();
            
            return [
                "status" => "success",
                "message" => "Usuario editado correctamente."
            ];
        }
    }

}
?>