<?php 

require "../config/conexion.php";
require "../model/metasfv.php";

$metasfv = new Metasfv();

$option = '';
$id = '';
$ld_cantidad = '';
$ld_monto = '';
$tc_cantidad = '';
$sede = '';
$mes = '';
$cumplido = '';

if(isset($_POST['option'])){ $option = $_POST['option']; }else{ $option = "";};
if(isset($_POST['id'])){ $id = $_POST['id']; }else{ $id = "";};
if(isset($_POST['ld_cantidad'])){ $ld_cantidad = $_POST['ld_cantidad']; }else{ $ld_cantidad = "";};
if(isset($_POST['ld_monto'])){ $ld_monto = $_POST['ld_monto']; }else{ $ld_monto = "";};
if(isset($_POST['tc_cantidad'])){ $tc_cantidad = $_POST['tc_cantidad']; }else{ $tc_cantidad = "";};
if(isset($_POST['sede'])){ $sede = $_POST['sede']; }else{ $sede = "";};
if(isset($_POST['mes'])){ $mes = $_POST['mes']; }else{ $mes = "";};
if(isset($_POST['cumplido'])){ $cumplido = $_POST['cumplido']; }else{ $cumplido = "";};

switch($option){
    default:
        echo json_encode($metasfv->obtener_metasfv());
    break;
    
   
}
?>