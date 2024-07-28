<?php 

require "../config/conexion.php";
require "../model/bono.php";

$bonos = new Bono();

$option = '';
$id = '';
$descripcion = '';
$estado = '';


if(isset($_POST['option'])){ $option = $_POST['option']; }else{ $option = "";};
if(isset($_POST['id'])){ $id = $_POST['id']; }else{ $id = "";};
if(isset($_POST['descripcion'])){ $descripcion = $_POST['descripcion']; }else{ $descripcion = "";};
if(isset($_POST['estado'])){ $estado = $_POST['estado']; }else{ $estado = "";};

switch($option){
    default:
        echo json_encode($bonos->obtener_bono());
    break; 
}
?>
