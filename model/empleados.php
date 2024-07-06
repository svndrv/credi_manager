<?php 

class Empleado extends Conectar {
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->usuarios = array();
    }

    public function obtener_ventas_por_emp(){
        $sql = "SELECT mu.ld_cantidad, mu.tc_cantidad, mu.ld_monto, u.nombres, u.apellidos FROM ventas_por_usuario mu INNER JOIN usuario u ON mu.id = u.id WHERE u.id = :id LIMIT 1";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>