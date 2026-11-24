<?php
// ---- Datos de conexión (ByetHost) ----
// Para probar en WAMP: localhost / empresa / root / "" y $esLocal = true
$host = "sql113.byethost22.com";
$db   = "b22_43063964_empresa";
$user = "b22_43063964";
$pass = "dorianxd26";
$esLocal = false;

try {
    if ($esLocal) {
        // En local se conecta al servidor y se crea la base de datos sola
        $conexion = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
    } else {
        // En el hosting la base de datos ya se creó en el panel
        $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    }
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($esLocal) {
        $conexion->exec("CREATE DATABASE IF NOT EXISTS $db");
        $conexion->exec("USE $db");
    }

    // Si la tabla no existe, se crea y se insertan los 10 empleados de prueba
    $existe = $conexion->query("SHOW TABLES LIKE 'empleados'")->rowCount();
    if ($existe == 0) {
        $conexion->exec("CREATE TABLE empleados (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            Nombre VARCHAR(250) NOT NULL,
            ApellidoP VARCHAR(250) NOT NULL,
            ApellidoM VARCHAR(250),
            Correo VARCHAR(100) UNIQUE NOT NULL,
            Foto VARCHAR(100)
        )");
        $conexion->exec("INSERT INTO empleados (Nombre, ApellidoP, ApellidoM, Correo, Foto) VALUES
            ('Juan', 'Pérez', 'Gómez', 'juan.perez@empresa.com', 'foto1.jpg'),
            ('María', 'García', 'López', 'maria.garcia@empresa.com', 'foto2.jpg'),
            ('Carlos', 'Rodríguez', 'Sánchez', 'carlos.rodriguez@empresa.com', 'foto3.jpg'),
            ('Ana', 'Martínez', 'Torres', 'ana.martinez@empresa.com', 'foto4.jpg'),
            ('Luis', 'Hernández', 'Díaz', 'luis.hernandez@empresa.com', 'foto5.jpg'),
            ('Sofia', 'Ramírez', 'Castillo', 'sofia.ramirez@empresa.com', 'foto6.jpg'),
            ('Jorge', 'Flores', 'Quispe', 'jorge.flores@empresa.com', 'foto7.jpg'),
            ('Elena', 'Morales', 'Vargas', 'elena.morales@empresa.com', 'foto8.jpg'),
            ('Pedro', 'Chávez', 'Mendoza', 'pedro.chavez@empresa.com', 'foto9.jpg'),
            ('Lucía', 'Rojas', 'Espinoza', 'lucia.rojas@empresa.com', 'foto10.jpg')");
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
