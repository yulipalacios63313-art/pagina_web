<?php
$conexion = new mysqli("localhost", "root", "", "prueba");

$folio = $_POST['folio'];

$sql = "SELECT * FROM recibos WHERE folio = '$folio'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    echo "<h3>Recibo de Pago</h3>";
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Monto: $" . $fila['monto'] . "<br>";
    echo "Referencia OXXO: " . $fila['referencia'] . "<br>";
    echo "Fecha: " . $fila['fecha'] . "<br>";
    echo "Estado: " . $fila['estado'];
} else {
    echo "Folio no encontrado";
}
?>