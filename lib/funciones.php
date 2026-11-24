<?php
// Devuelve un caso por su número (o null si no existe)
function obtenerCaso($casos, $id) {
    if (isset($casos[$id])) {
        return $casos[$id];
    }
    return null;
}

// Lee un archivo y lo deja listo para mostrarlo como código
function leerCodigo($archivo) {
    $ruta = __DIR__ . "/../" . $archivo;
    $codigo = file_get_contents($ruta);

    // Se oculta la contraseña para que no se vea en la página
    $codigo = preg_replace('/(\$pass\s*=\s*)"[^"]*"/', '$1"********"', $codigo);

    return htmlspecialchars($codigo);
}
?>
