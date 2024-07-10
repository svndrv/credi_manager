<?php 

class Ventas extends Conectar {
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->usuarios = array();
    }
    public function obtener_ventas_x_usuario($id_usuario, $mes){
        $sql = "SELECT ld_cantidad, tc_cantidaSd, ld_monto FROM ventas_por_usuario WHERE id_usuario = ? AND mes = ?;";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id_usuario);
        $sql->bindValue(2,$mes);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtener_ventas(){
        $sql = "SELECT * FROM ventas";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtener_ventas_inner(){
        $sql = "SELECT v.id, v.nombres, v.dni, v.celular, v.credito, v.linea, v.plazo, v.tem, u.usuario, v.tipo_producto, v.estado, v.created_at, v.updated_at FROM ventas v INNER JOIN usuario u ON v.id_usuario = u.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function agregar_ventas($nombres, $dni, $celular, $credito, $linea, $plazo, $tem, $id_usuario, $tipo_producto, $estado){

        if(empty($nombres) || empty($dni) || empty($celular) || empty($credito) || empty($linea) || empty($plazo) || empty($tem) || empty($id_usuario) || empty($tipo_producto) || empty($estado))
            return [
                "status" => "error",
                "message" => "Verifique los espacios vacios."
            ];

        $sql = "INSERT INTO ventas (nombres, dni, celular, credito, linea,plazo, tem, id_usuario, tipo_producto, estado, created_at, updated_at) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $nombres);
        $sql->bindValue(2, $dni);
        $sql->bindValue(3, $celular);
        $sql->bindValue(4, $credito);
        $sql->bindValue(5, $linea);
        $sql->bindValue(6, $plazo);
        $sql->bindValue(7, $tem);
        $sql->bindValue(8, $id_usuario);
        $sql->bindValue(9, $tipo_producto);
        $sql->bindValue(10, $estado);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Se ha creado con exito."
        ];

        return $response;
    }
    public function contar_ld(){
        $sql = "SELECT COUNT(*) AS cantidad_ld FROM ventas WHERE tipo_producto IN ('LD', 'LD/TC')";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar_tc(){
        $sql = "SELECT COUNT(*) AS cantidad_tc FROM ventas WHERE tipo_producto IN ('TC', 'LD/TC')";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar_ld_monto(){
        $sql = "SELECT SUM(credito) AS ld_monto FROM ventas";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>