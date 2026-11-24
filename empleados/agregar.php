<?php
require_once 'conexion.php';

$mensaje = "";
$nombre = "";
$apellidoP = "";
$apellidoM = "";
$correo = "";

// Se detecta el envío del formulario
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $foto = "default.jpg";

    // Subida de la foto (si eligió una)
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Nombre único para que no se repita
            $foto = time() . "_" . rand(100, 999) . "." . $extension;
            move_uploaded_file($_FILES['foto']['tmp_name'], "imagenes/" . $foto);
        } else {
            $mensaje = "La foto debe ser JPG, PNG o GIF.";
        }
    }

    // Guardar en la base de datos con sentencia preparada
    if ($mensaje == "") {
        try {
            $sql = "INSERT INTO empleados (Nombre, ApellidoP, ApellidoM, Correo, Foto)
                    VALUES (:nombre, :apellidoP, :apellidoM, :correo, :foto)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellidoP' => $apellidoP,
                ':apellidoM' => $apellidoM,
                ':correo' => $correo,
                ':foto' => $foto
            ]);
            header("Location: index.php?msg=agregado");
            exit;
        } catch (PDOException $e) {
            // Si falla, se borra la foto que se acababa de subir
            if ($foto != "default.jpg") {
                unlink("imagenes/" . $foto);
            }
            $mensaje = "No se pudo guardar. Puede que el correo ya exista.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<main class="container bg-white p-4 rounded shadow-sm" style="max-width: 500px;">
    <h3 class="mb-3">Nuevo Empleado</h3>

    <?php if ($mensaje != "") { ?>
        <p class="alert alert-danger"><?php echo $mensaje; ?></p>
    <?php } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" class="form-control mb-2" value="<?php echo htmlspecialchars($nombre); ?>" required>

        <label class="form-label">Apellido Paterno:</label>
        <input type="text" name="apellidoP" class="form-control mb-2" value="<?php echo htmlspecialchars($apellidoP); ?>" required>

        <label class="form-label">Apellido Materno:</label>
        <input type="text" name="apellidoM" class="form-control mb-2" value="<?php echo htmlspecialchars($apellidoM); ?>">

        <label class="form-label">Correo Electrónico:</label>
        <input type="email" name="correo" class="form-control mb-2" value="<?php echo htmlspecialchars($correo); ?>" required>

        <label class="form-label">Foto de perfil:</label>
        <input type="file" name="foto" class="form-control mb-3" accept="image/*">

        <button type="submit" name="guardar" class="btn btn-primary w-100">Guardar Empleado</button>
        <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
    </form>
</main>

</body>
</html>
