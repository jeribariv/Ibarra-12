<?php
require_once 'conexion.php';

// Si llega aquí, la conexión funcionó
$consulta = $conexion->query("SELECT COUNT(*) FROM empleados");
$total = $consulta->fetchColumn();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prueba de Conexión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<main class="container bg-white p-4 rounded shadow-sm" style="max-width: 500px;">
    <h3 class="mb-3">Prueba de Conexión (PDO)</h3>
    <p class="alert alert-success">Conexión exitosa a la base de datos <b>empresa</b>.</p>
    <p class="mb-0">Empleados registrados: <span class="badge bg-primary"><?php echo $total; ?></span></p>
</main>

</body>
</html>
