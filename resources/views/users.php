<?php

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

?>

<div class="wrap">

    <h1 class="wp-heading-inline mb-3">Cadastrar Usuários em Massa</h1>

    <!-- Forms -->
    <div class="row">
        <div class="col-12">
            <?php require_once ( SCFI_MUR_PLUGIN_VIEWS . 'users/forms/upload.php'); ?>
        </div>
    </div>

    <!-- Tables -->
    <?php if (isset($fileItems) AND is_object($fileItems)) : ?>
        <?php require_once ( SCFI_MUR_PLUGIN_VIEWS . 'users/tables/upload.php'); ?>
    <?php endif; ?>

    <hr>

    <!-- Actions -->
    <?php if (isset($itemsApi) OR isset($fileItems)) : ?>
        <?php require_once ( SCFI_MUR_PLUGIN_VIEWS . 'users/components/actions.php'); ?>
    <?php endif; ?>

</div>

<?php if ( isset( $fileItems ) ) : ?>

    <!-- Modal para seleção de curso -->
    <div class="modal modal-lg fade" id="course-select" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Seleção de Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Escolha abaixo um dos cursos disponíveis.</p>

                    <!-- Recebe as opções por ajax -->
                    <select class="get-selected-course">
                        <?php if ( is_array( $courses = \App\Classes\Core\Helpers::getCourses() ) ) : ?>
                            <?php foreach ( $courses as $course ) : ?>
                                <option value="<?= $course->ID ?>"> <?= $course->post_title ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-sm btn-primary btn-set-courses"
                            data-bs-dismiss="modal">Aplicar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para preencher senha em massa -->
    <div class="modal modal-lg fade" id="pass-select" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de Senha em Massa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Preencha o campo abaixo com a senha que será usada..</p>

                    <!-- Recebe as opções por ajax -->
                    <input type="text" class="form-control get-new-pass" placeholder="Digite uma nova senha...">
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-sm btn-primary btn-set-pass"
                            data-bs-dismiss="modal">Aplicar</button>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
