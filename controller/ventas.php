<?php 

require "../config/conexion.php";
require "../model/ventas.php";

$ventas = new Ventas();

$option = '';
$id = '';
$nombres = '';
$dni = '';
$celular = '';
$credito = '';
$linea = '';
$plazo = '';
$tem = '';
$id_usuario = '';
$tipo_producto = '';
$estado = '';
$cantidad_ld = '';

if(isset($_POST['option'])){ $option = $_POST['option']; }else{ $option = "";};
if(isset($_POST['cantidad_ld'])){ $cantidad_ld = $_POST['cantidad_ld']; }else{ $cantidad_ld = "";};
if(isset($_POST['id'])){ $id = $_POST['id']; }else{ $id = "";};
if(isset($_POST['nombres'])){ $nombres = $_POST['nombres']; }else{ $nombres = "";};
if(isset($_POST['dni'])){ $dni = $_POST['dni']; }else{ $dni = "";};
if(isset($_POST['celular'])){ $celular = $_POST['celular']; }else{ $celular = "";};
if(isset($_POST['credito'])){ $credito = $_POST['credito']; }else{ $credito = "";};
if(isset($_POST['linea'])){ $linea = $_POST['linea']; }else{ $linea = "";};
if(isset($_POST['plazo'])){ $plazo = $_POST['plazo']; }else{ $plazo = "";};
if(isset($_POST['tem'])){ $tem = $_POST['tem']; }else{ $tem = "";};
if(isset($_POST['id_usuario'])){ $id_usuario = $_POST['id_usuario']; }else{ $id_usuario = "";};
if(isset($_POST['tipo_producto'])){ $tipo_producto = $_POST['tipo_producto']; }else{ $tipo_producto = "";};
if(isset($_POST['estado'])){ $estado = $_POST['estado']; }else{ $estado = "";};

switch ($option) {
    case 'agregar_ventas':
        echo json_encode($ventas->agregar_ventas($nombres, $dni, $celular,$credito, $linea, $plazo,$tem,$id_usuario,$tipo_producto,$estado));
    break;
    case 'contar_filas_ld':
        echo json_encode($ventas->contar_ld());
    break;
    case 'contar_filas_tc':
        echo json_encode($ventas->contar_tc());
    break;
    case 'ld_monto':
        echo json_encode($ventas->contar_ld_monto());
    break;
    default:
        echo json_encode($ventas->obtener_ventas_inner());
    break;
}


?>