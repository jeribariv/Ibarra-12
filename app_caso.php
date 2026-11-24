<?php
require_once 'config/app.php';
require_once 'lib/casos.php';
require_once 'lib/funciones.php';

$id = $_GET['id'] ?? 0;
$caso = obtenerCaso($casos, $id);

if ($caso == null) {
    header("Location: index.php");
    exit;
}

$tituloPagina = "Aplicación del Caso " . $id;
include_once 'includes/header.php';
?>

<main class="container py-4">
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h2 text-white">CASO <?php echo $id; ?>: <?php echo $caso['titulo']; ?></h1>
        <a href="caso.php?id=<?php echo $id; ?>" class="btn btn-dark">&larr; Volver al código del Caso <?php echo $id; ?></a>
    </header>

    <section class="card text-center p-5">
        <p class="mb-2"><b>Resultado esperado:</b> <?php echo $caso['resultado']; ?></p>
        <p>Haz clic en el botón para ver la ejecución de la aplicación.</p>
        <p class="mb-0">
            <a href="<?php echo $caso['app']; ?>" target="_blank" class="btn btn-primary btn-lg">VER EJECUCIÓN DE LA APLICACIÓN</a>
        </p>
    </section>

    <?php include 'includes/navegacion.php'; ?>
</main>

<?php include_once 'includes/footer.php'; ?>
