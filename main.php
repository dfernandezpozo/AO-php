<?php



$mysqli = new mysqli("localhost", "root", "", "mi_base");

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
echo "¡Conexión exitosa!";
