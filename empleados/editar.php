<?php
require_once 'conexion.php';

$mensaje = "";

// El ID llega por la URL al abrir y por un campo oculto al enviar
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
} else {
    $id = $_GET['id'] ?? 0;
}

// Datos actuales del empleado
$stmt = $conexion->prepare("SELECT * FROM empleados WHERE ID = :id");
$stmt->execute([':id' => $id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no existe, vuelve al listado
if (!$emp) {
    header("Location: index.php");
    exit;
}

// Se detecta el envío del formulario
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $fotoAntigua = $emp['Foto'];
    $foto = $fotoAntigua;
    $fotoNueva = false;

    // Foto opcional: solo se cambia si eligió una nueva
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $foto = time() . "_" . rand(100, 999) . "." . $extension;
            move_uploaded_file($_FILES['foto']['tmp_name'], "imagenes/" . $foto);
            $fotoNueva = true;
        } else {
            $mensaje = "La foto debe ser JPG, PNG o GIF.";
        }
    }

    if ($mensaje == "") {
        try {
            $sql = "UPDATE empleados SET Nombre = :nombre, ApellidoP = :apellidoP,
                    ApellidoM = :apellidoM, Correo = :correo, Foto = :foto WHERE ID = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellidoP' => $apellidoP,
                ':apellidoM' => $apellidoM,
                ':correo' => $correo,
                ':foto' => $foto,
                ':id' => $id
            ]);

            // Si se cambió la foto, se borra la anterior del servidor
            if ($fotoNueva && $fotoAntigua != "" && $fotoAntigua != "default.jpg" && file_exists("imagenes/" . $fotoAntigua)) {
                unlink("imagenes/" . $fotoAntigua);
            }
            header("Location: index.php?msg=editado");
            exit;
        } catch (PDOException $e) {
            // Si falla, se borra la foto nueva y se muestran los datos escritos
            if ($fotoNueva) {
                unlink("imagenes/" . $foto);
            }
            $emp['Nombre'] = $nombre;
            $emp['ApellidoP'] = $apellidoP;
            $emp['ApellidoM'] = $apellidoM;
            $emp['Correo'] = $correo;
            $mensaje = "No se pudo actualizar. Puede que el correo ya exista.";
        }
    }
}

// Foto que se muestra en el formulario
$fotoActual = $emp['Foto'];
if ($fotoActual == "") {
    $fotoActual = "default.jpg";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<main class="container bg-white p-4 rounded shadow-sm" style="max-width: 500px;">
    <h3 class="mb-3">Editar Empleado #<?php echo $emp['ID']; ?></h3>

    <?php if ($mensaje != "") { ?>
        <p class="alert alert-danger"><?php echo $mensaje; ?></p>
    <?php } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $emp['ID']; ?>">

        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" class="form-control mb-2" value="<?php echo htmlspecialchars($emp['Nombre']); ?>" required>

        <label class="form-label">Apellido Paterno:</label>
        <input type="text" name="apellidoP" class="form-control mb-2" value="<?php echo htmlspecialchars($emp['ApellidoP']); ?>" required>

        <label class="form-label">Apellido Materno:</label>
        <input type="text" name="apellidoM" class="form-control mb-2" value="<?php echo htmlspecialchars($emp['ApellidoM']); ?>">

        <label class="form-label">Correo Electrónico:</label>
        <input type="email" name="correo" class="form-control mb-2" value="<?php echo htmlspecialchars($emp['Correo']); ?>" required>

        <label class="form-label d-block">Foto actual:</label>
        <img src="imagenes/<?php echo $fotoActual; ?>" width="80" height="80" class="rounded-circle mb-2" alt="Foto actual">

        <label class="form-label d-block">Cambiar foto (opcional):</label>
        <input type="file" name="foto" class="form-control mb-3" accept="image/*">

        <button type="submit" name="actualizar" class="btn btn-warning w-100">Actualizar Registro</button>
        <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
    </form>
</main>

</body>
</html>
