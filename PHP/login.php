<?php
session_start();
require 'conexion.php';

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM cliente WHERE usuario='$usuario' AND estatus='activo'";
    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $cliente = $resultado->fetch_assoc();

        if(password_verify($password, $cliente['password'])){
            $_SESSION['usuario'] = $cliente['usuario'];
            $_SESSION['nombre'] = $cliente['nombre'];
            header("Location: panel.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos";
        }

    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Área de Clientes - Wi&Ed</title>
<link rel="stylesheet" href="../css/home.css">
</head>
<body>

<div class="login-container">
    <h2>Área de Clientes</h2>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>