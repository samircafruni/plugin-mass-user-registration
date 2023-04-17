<?php

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

?>

<form class="mt-3" method="post" enctype="multipart/form-data">

    <!-- Campos -->
    <div class="row">

        <div class="col col-lg-12 d-flex flex-row">
            <input type="file" name="file" class="form-control me-3" required>
            <button type="submit" class="button button-primary">Importar CSV</button>
        </div>
    </div>
</form>