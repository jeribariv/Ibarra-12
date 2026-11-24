<?php
require_once 'conexion.php';

// Leer todos los empleados
$consulta = $conexion->query("SELECT * FROM empleados ORDER BY ID");
$empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);

// Mensaje que llega después de agregar, editar o eliminar
$msg = "";
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Módulo de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<main class="container bg-white p-4 rounded shadow-sm">
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Empleados</h2>
        <a href="agregar.php" class="btn btn-success">+ Nuevo Empleado</a>
    </header>

    <?php if ($msg == "agregado") { ?>
        <p class="alert alert-success">Empleado registrado correctamente.</p>
    <?php } ?>
    <?php if ($msg == "editado") { ?>
        <p class="alert alert-info">Empleado actualizado correctamente.</p>
    <?php } ?>
    <?php if ($msg == "eliminado") { ?>
        <p class="alert alert-danger">Empleado eliminado correctamente.</p>
    <?php } ?>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $emp) { ?>
                <?php
                // Si no tiene foto se usa la de por defecto
                $foto = $emp['Foto'];
                if ($foto == "") {
                    $foto = "default.jpg";
                }
                ?>
                <tr>
                    <td class="text-center"><?php echo $emp['ID']; ?></td>
                    <td><?php echo htmlspecialchars($emp['Nombre'] . " " . $emp['ApellidoP'] . " " . $emp['ApellidoM']); ?></td>
                    <td><?php echo htmlspecialchars($emp['Correo']); ?></td>
                    <td class="text-center">
                        <img src="imagenes/<?php echo $foto; ?>" width="50" height="50" class="rounded-circle" alt="Foto">
                    </td>
                    <td class="text-center">
                        <a href="editar.php?id=<?php echo $emp['ID']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?php echo $emp['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

</body>
</html>
