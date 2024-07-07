<?php

session_start();

require "../config/conexion.php";
require "../model/usuario.php";

$usuarios = new Usuario();

$opcion = '';
$id = '';
$usuario = '';
$contrasena = '';
$nombres = '';
$apellidos = '';
$estado = '';
$rol = '';
$foto = '';
$archivoFoto = '';


if (isset($_POST['opcion']))
    $opcion = $_POST['opcion'];
if (isset($_POST['id']))
    $id = $_POST['id'];
if (isset($_POST['usuario']))
    $usuario = $_POST['usuario'];
if (isset($_POST['contrasena']))
    $contrasena = $_POST['contrasena'];
if (isset($_POST['nombres']))
    $nombres = $_POST['nombres'];
if (isset($_POST['apellidos']))
    $apellidos = $_POST['apellidos'];
if (isset($_POST['rol']))
    $rol = $_POST['rol'];
if (isset($_POST['estado']))
    $estado = $_POST['estado'];
if (isset($_POST['foto']))
    $foto = $_POST['foto'];
if (isset($_POST['archivoFoto']))
    $archivoFoto = $_POST['archivoFoto'];


switch ($opcion) {
    case 'login':
        echo json_encode($usuarios->login($usuario, $contrasena));
    break;
    case 'filtro_empleados':
        echo json_encode($usuarios->obtener_x_rol_estado($rol, $estado));
    break;
    case 'eliminar_usuario':
        $usuarios->eliminar_usuario($id);
    break;
    case 'obtener_x_id_usuario':
        echo json_encode($usuarios->obtener_usuario_x_id($id));
    break;
    case 'actualizar_usuarios':
        $usuarios->actualizar_usuario($id,$usuario,$contrasena,$nombres,$apellidos,$rol,$estado);
    break;
    case 'agregar_usuario':
        echo json_encode($usuarios->agregar_usuario($usuario,$contrasena,$nombres,$apellidos,$rol,$estado, $foto));
    break;
    default:
        echo json_encode($usuarios->obtener_usuarios());       
    break;

}