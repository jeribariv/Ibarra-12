<?php
require_once 'config/app.php';
require_once 'lib/casos.php';
require_once 'lib/funciones.php';

$tituloPagina = "Menú Principal";
include_once 'includes/header.php';
?>

<main class="container py-4">
    <h1 class="text-center text-white mb-4">MENÚ PRINCIPAL</h1>

    <section class="card mb-4">
        <h5 class="card-header panel-titulo">RESOLUCIÓN DE EJERCICIOS</h5>
        <ul class="list-group list-group-flush">
            <?php $categoriaActual = ""; ?>
            <?php foreach ($casos as $numero => $caso) { ?>
                <?php if ($caso['categoria'] != $categoriaActual) { ?>
                    <?php $categoriaActual = $caso['categoria']; ?>
                    <li class="list-group-item bg-light fw-bold"><?php echo $categoriaActual; ?></li>
                <?php } ?>
                <li class="list-group-item">
                    <h5>CASO <?php echo str_pad($numero, 2, "0", STR_PAD_LEFT); ?>: <?php echo $caso['titulo']; ?>
                        <span class="badge bg-secondary"><?php echo $caso['categoria']; ?></span>
                    </h5>
                    <p class="alert alert-secondary py-2"><b>Enunciado detallado:</b> <?php echo $caso['enunciado']; ?></p>
                    <a href="caso.php?id=<?php echo $numero; ?>" class="btn btn-primary btn-sm">Ver caso</a>
                </li>
            <?php } ?>
        </ul>
    </section>

    <section class="card">
        <div class="card-body row">
            <div class="col-md-6">
                <label class="form-label fw-bold">APELLIDOS Y NOMBRES:</label>
                <input type="text" class="form-control" value="<?php echo $nombreAlumno; ?>" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">SEMESTRE:</label>
                <input type="text" class="form-control" value="<?php echo $semestre; ?>" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">TURNO:</label>
                <input type="text" class="form-control" value="<?php echo $turno; ?>" readonly>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
