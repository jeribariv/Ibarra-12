<?php
require_once 'config/app.php';
require_once 'lib/casos.php';
require_once 'lib/funciones.php';

// Se obtiene el caso por la URL (caso.php?id=1)
$id = $_GET['id'] ?? 0;
$caso = obtenerCaso($casos, $id);

// Si no existe, vuelve al menú
if ($caso == null) {
    header("Location: index.php");
    exit;
}

$tituloPagina = "Caso " . $id;
include_once 'includes/header.php';
?>

<main class="container py-4">
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h2 text-white">CASO <?php echo $id; ?>: <?php echo $caso['titulo']; ?></h1>
        <a href="index.php" class="btn btn-dark">&#8630; VOLVER Pág. PRINCIPAL</a>
    </header>

    <p class="alert alert-secondary"><b>ENUNCIADO:</b> <?php echo $caso['enunciado']; ?></p>

    <section class="row">
        <article class="col-12 col-lg-7 mb-3">
            <div class="card">
                <h6 class="card-header panel-titulo">VISUALIZACIÓN DE CÓDIGOS (PHP) - <?php echo $caso['archivo']; ?></h6>
                <pre class="vscode line-numbers mb-0"><code class="language-php"><?php echo leerCodigo($caso['archivo']); ?></code></pre>
            </div>
        </article>

        <article class="col-12 col-lg-5 mb-3">
            <div class="card">
                <h6 class="card-header panel-titulo">ÁREA DE RESULTADOS</h6>
                <p class="card-body mb-0"><?php echo $caso['resultado']; ?></p>
            </div>
            <a href="app_caso.php?id=<?php echo $id; ?>" class="btn btn-primary w-100 mt-2">ACCEDER A LA APLICACIÓN (PÁG. 3)</a>
        </article>
    </section>

    <?php include 'includes/navegacion.php'; ?>
</main>

<?php include_once 'includes/footer.php'; ?>
