<?php

session_start();

require "../config/conexion.php";
require "../model/usuario.php";

$usuarios = new Usuario();

$id = '';
$usuario = '';
$contrasena = '';
$usuario = '';
$apellidos = '';
$estado = '';
$rol = '';


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


switch ($opcion) {
    case 'login':
        echo json_encode($usuarios->login($usuario, $contrasena));
        break;

}