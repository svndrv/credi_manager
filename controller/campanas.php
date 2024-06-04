<?php 

require "../config/conexion.php";
require "../model/campanas.php";

$campanas = new Campanas();

$option = '';
$id = '';
$dni = '';
$celular = '';
$campana = '';

if(isset($_POST['option'])){ $option = $_POST['option']; }else{ $option = "";};
if(isset($_POST['id'])){ $id = $_POST['id']; }else{ $id = "";};
if(isset($_POST['dni'])){ $dni = $_POST['dni']; }else{ $dni = "";};
if(isset($_POST['celular'])){ $celular = $_POST['celular']; }else{ $celular = "";};
if(isset($_POST['campana'])){ $campana = $_POST['campana']; }else{ $campana = "";};

switch($option){
    case "crear_campanas":
        $campanas->crear_campanas($dni,$celular,$campana);
    break;
    case "verificar_dni":
        $campanas->verificar_dni($dni);
    break;
    case "verificar_campana":
        $campanas->verificar_campana($dni);
    break;
    case "eliminar_campana":
        $campanas->eliminar_campana($id);
    break;
    default:
        echo json_encode($campanas->obtener_campanas());
    break;
}


   

?>