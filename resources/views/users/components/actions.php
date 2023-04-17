<?php

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

?>

    <div class="buttons-container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-between">

                <!-- Consulta produtos na iPressnet e preenche os campos automáticamente -->
                <button type="button" class="btn btn-sm button-primary text-white btn-shadow mx-2"
                        data-bs-toggle="modal" data-bs-target="#pass-select">Preencher Senha em Massa</button>

                <!-- Consulta produtos na iPressnet e preenche os campos automáticamente -->
                <button type="button" class="btn btn-sm btn-primary btn-shadow mx-2"
                        data-bs-toggle="modal" data-bs-target="#course-select">Selecionar Curso em Massa</button>

                <!-- Imprime o botão para gerar o pedido na iPressnet -->
                <button type="button"
                        class="btn btn-sm btn-success btn-shadow btn-register-users mx-2">Cadastrar Usuários</button>

            </div>
        </div>
    </div>
