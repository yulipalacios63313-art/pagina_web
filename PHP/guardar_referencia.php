<?php

$conexion = new mysqli("localhost", "root", "", "prueba");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$referencia = "WIED-" . rand(100000, 999999);

$sql = "INSERT INTO referencia (referencia, fecha) VALUES ('$referencia', NOW())";

if ($conexion->query($sql) === TRUE) {
    echo $referencia;
} else {
    echo "Error";
}

$conexion->close();

?>