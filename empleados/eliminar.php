<?php
require_once 'conexion.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Primero se busca la foto del empleado
    $stmt = $conexion->prepare("SELECT Foto FROM empleados WHERE ID = :id");
    $stmt->execute([':id' => $id]);
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($emp) {
        // Se elimina el registro
        $stmt = $conexion->prepare("DELETE FROM empleados WHERE ID = :id");
        $stmt->execute([':id' => $id]);

        // Se elimina la foto del servidor (menos la de por defecto)
        $ruta = "imagenes/" . $emp['Foto'];
        if ($emp['Foto'] != "" && $emp['Foto'] != "default.jpg" && file_exists($ruta)) {
            unlink($ruta);
        }
    }
}

// Volver al listado principal
header("Location: index.php?msg=eliminado");
exit;
?>
