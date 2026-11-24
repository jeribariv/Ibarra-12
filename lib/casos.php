<?php
// Biblioteca centralizada de casos
$casos = [
    1 => [
        'titulo'    => 'Conexión a la base de datos con PDO',
        'categoria' => 'Base de datos',
        'enunciado' => 'Crear un archivo independiente que gestione la conexión a la base de datos mediante PDO con manejo de excepciones.',
        'archivo'   => 'empleados/conexion.php',
        'app'       => 'empleados/prueba_conexion.php',
        'resultado' => 'Mensaje de conexión exitosa y cantidad de empleados registrados en la tabla.'
    ],
    2 => [
        'titulo'    => 'Read: Lista de empleados',
        'categoria' => 'CRUD con PHP y PDO',
        'enunciado' => 'Mostrar en index.php una tabla con Bootstrap 5 con todos los empleados: miniatura de la foto, nombre completo, correo y botones de acción.',
        'archivo'   => 'empleados/index.php',
        'app'       => 'empleados/index.php',
        'resultado' => 'Tabla con los empleados, su foto en miniatura y los botones Editar y Eliminar.'
    ],
    3 => [
        'titulo'    => 'Create: Registrar empleado',
        'categoria' => 'CRUD con PHP y PDO',
        'enunciado' => 'Diseñar un formulario para registrar un nuevo empleado, con carga de archivo (upload) para guardar la foto de perfil en el servidor.',
        'archivo'   => 'empleados/agregar.php',
        'app'       => 'empleados/agregar.php',
        'resultado' => 'Formulario que guarda al empleado y su foto, y vuelve al listado con un mensaje.'
    ],
    4 => [
        'titulo'    => 'Update: Editar empleado',
        'categoria' => 'CRUD con PHP y PDO',
        'enunciado' => 'Diseñar la edición que cargue los datos actuales según el ID, y permita cambiar nombres, apellidos, correo y, si se desea, la foto.',
        'archivo'   => 'empleados/editar.php',
        'app'       => 'empleados/editar.php?id=1',
        'resultado' => 'Formulario con los datos actuales; al actualizar, la foto anterior se borra del servidor.'
    ],
    5 => [
        'titulo'    => 'Delete: Eliminar empleado',
        'categoria' => 'CRUD con PHP y PDO',
        'enunciado' => 'Eliminar un empleado mediante su ID y borrar también la foto guardada en el servidor.',
        'archivo'   => 'empleados/eliminar.php',
        'app'       => 'empleados/index.php',
        'resultado' => 'Usa el botón Eliminar de la tabla: el registro y su foto desaparecen.'
    ]
];
?>
