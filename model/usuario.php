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



}




?>