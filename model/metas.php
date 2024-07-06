<?php
class Metas extends Conectar {
    private $db;
    private $metas;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->metas = array();
    }
    public function obtener_metas(){
        $sql = "SELECT * FROM metas_por_usuario";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtener_metas_por_usuario($id_usuario, $mes , $cumplido) {
        $sql = "SELECT * FROM metas_por_usuario WHERE 1=1";
    
        // Agregar condiciones según los parámetros recibidos
        if ($id_usuario) {
            $sql .= " AND id_usuario = :id_usuario";
        }
        if ($mes) {
            $sql .= " AND mes = :mes";
        }
        if ($cumplido) {
            $sql .= " AND cumplido = :cumplido";
        }
    
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);
    
        // Asignar valores a los parámetros según estén definidos
        if ($id_usuario) {
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        }
        if ($mes) {
            $stmt->bindParam(':mes', $mes, PDO::PARAM_STR);
        }
        if ($cumplido) {
            $stmt->bindParam(':cumplido', $cumplido, PDO::PARAM_STR);
        }
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Devolver todos los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminar_meta($id){
        $sql = "DELETE FROM metas_por_usuario WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        echo 'ok';
    }
    public function actualizar_meta($id, $ld_cantidad, $ld_monto, $tc_cantidad, $id_usuario, $mes, $cumplido) {
        $sql = "UPDATE metas_por_usuario 
                SET ld_cantidad = ?, ld_monto = ?, tc_cantidad = ?, id_usuario = ?, mes = ?, cumplido = ?, updated_at = now() 
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $ld_cantidad, PDO::PARAM_INT);
        $stmt->bindValue(2, $ld_monto, PDO::PARAM_STR);
        $stmt->bindValue(3, $tc_cantidad, PDO::PARAM_INT);
        $stmt->bindValue(4, $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(5, $mes, PDO::PARAM_STR);
        $stmt->bindValue(6, $cumplido, PDO::PARAM_STR);
        $stmt->bindValue(7, $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "ok";
    }
    public function obtener_meta_x_id($id){
        $sql = "SELECT * FROM metas_por_usuario WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>