<?php
session_start();
require 'conexion.php';

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM cliente WHERE usuario='$usuario'";
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Panel Cliente - Wi&Ed</title>
<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<div class="login-container">
    <h2>Bienvenido <?php echo $cliente['nombre']; ?></h2>

    <?php if($cliente['adeudo'] > 0){ ?>

    <h3 style="color:#d9534f;">
        💰 Adeudo actual: $<?php echo number_format($cliente['adeudo'],2); ?>
    </h3>

<?php } else { ?>

    <h3 style="color:#28a745;">
        ✅ Servicio al corriente
    </h3>

<?php } ?>

    <br>
    <?php if($cliente['adeudo'] > 0){ ?>
    <a href="pagos.php" class="btn-primary">Pagar Ahora</a>
<?php } ?>
    <br><br>
    <a href="logout.php">Cerrar sesión</a>
</div>

</body>
</html>