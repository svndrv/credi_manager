<?php 

class Usuario extends Conectar {
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->usuarios = array();
    }

    public function login($usuario, $contrasena)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->execute();

        if ($sql->rowCount() === 0)
            return ["status" => "error", "message" => "El usuario no existe."];

        $data = $sql->fetch(PDO::FETCH_ASSOC);
        $contrasenaEncriptada = $data['contrasena'];

        if($data['estado'] === 'inactivo' || $data['estado'] === 'eliminado') return ["status" => "error", "message" => "El usuario esta inactivo."];

        if (password_verify($contrasena, $contrasenaEncriptada) == false)
            return ["status" => "error", "message" => "Contraseña incorrecta."];

        $_SESSION['id'] = $data['id'];
        $_SESSION['usuario'] = $data['usuario'];
        $_SESSION['rol'] = $data['rol'];
        $_SESSION['nombres'] = $data['nombres'];
        $_SESSION['apellidos'] = $data['apellidos'];
        $_SESSION['estado'] = $data['estado'];


        return [
            "status" => "success",
            //"url" => "index?view=campanas"
            "url" => "dashboard.php"
        ];

    }

    public function obtener_usuarios(){
        $sql = "SELECT * FROM usuario";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_asesor_admin(){
        $sql = "SELECT * FROM usuario where rol != 2";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_x_rol_estado($rol, $estado){
        $sql = "SELECT * FROM usuario WHERE 1=1";

        // Agregar condiciones según los parámetros recibidos
        if ($rol) {
            $sql .= " AND rol = :rol";
        }
        if ($estado) {
            $sql .= " AND estado = :estado";
        }

        // Preparar la consulta
        $stmt = $this->db->prepare($sql);

        // Asignar valores a los parámetros según estén definidos
        if ($rol) {
            $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        }
        if ($estado) {
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        }

        // Ejecutar la consulta
        $stmt->execute();

        // Devolver todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtener_usuario_x_id($id){
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar_usuario($id){
        $sql = "DELETE FROM usuario WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        echo 'ok';
    }

    public function actualizar_usuario($id, $usuario, $contrasena, $nombres, $apellidos, $rol, $estado){
        $sql = "UPDATE usuario SET usuario = ?, contrasena = ?, nombres = ?, apellidos = ?, rol = ?, estado = ?, updated_at = now() WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $contrasena);
        $sql->bindValue(3, $nombres);
        $sql->bindValue(4, $apellidos);
        $sql->bindValue(5, $rol);
        $sql->bindValue(6, $estado);
        $sql->bindValue(7, $id);
        $sql->execute();
        echo "ok";

    }

    public function agregar_usuario($usuario, $contrasena, $nombres, $apellidos, $rol, $estado){
        $sql = "INSERT INTO usuario (usuario, contrasena, nombres, apellidos, rol, estado, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, now(), now())";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $usuario);
        $sql->bindValue(2, $contrasena);
        $sql->bindValue(3, $nombres);
        $sql->bindValue(4, $apellidos);
        $sql->bindValue(5, $rol);
        $sql->bindValue(6, $estado);
        $sql->execute();
        echo 'ok';
    }

}



?>