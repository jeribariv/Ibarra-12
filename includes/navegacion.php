<?php
// Necesita $id y $casos
$anterior  = $id - 1;
$siguiente = $id + 1;
?>
<nav class="d-flex justify-content-between mt-3">
    <?php if (isset($casos[$anterior])) { ?>
        <a href="caso.php?id=<?php echo $anterior; ?>" class="btn btn-dark">&larr; Caso Anterior</a>
    <?php } else { ?>
        <span class="btn btn-dark disabled">&larr; Caso Anterior</span>
    <?php } ?>

    <a href="index.php" class="btn btn-light">Menú Principal</a>

    <?php if (isset($casos[$siguiente])) { ?>
        <a href="caso.php?id=<?php echo $siguiente; ?>" class="btn btn-dark">Caso Siguiente &rarr;</a>
    <?php } else { ?>
        <span class="btn btn-dark disabled">Caso Siguiente &rarr;</span>
    <?php } ?>
</nav>
