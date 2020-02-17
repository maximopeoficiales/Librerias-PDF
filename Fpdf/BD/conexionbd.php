<?php
$server= 'localhost';
$user   = 'root';
$pass= '';
$bd='bdejemplopdf';
$port=3307;

$conexion = new mysqli($server,$user,$pass,$bd,$port);
if (mysqli_connect_errno()) {
    echo "Error en la conexion", mysqli_connect_error();
    exit();
}/* else{
    echo "Conectado";
} */