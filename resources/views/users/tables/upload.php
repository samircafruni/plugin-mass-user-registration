<?php

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (! defined('ABSPATH')) {
    exit;
}

?>

<div class="row mt-4">
    <div class="col-12">
        <table class="table table-sm table-striped table-responsive d-block">
            <thead>
            <tr>
                <th class="text-center" scope="col">Item</th>
                <th scope="col" style="width: 80px;">Cad. Usuário</th>
                <th scope="col" style="width: 120px;">Nome</th>
                <th scope="col" style="width: 120px;">Sobrenome</th>
                <th scope="col" style="width: 220px;">E-mail</th>
                <th scope="col" style="width: 220px;">Usuário</th>
                <th scope="col" style="width: 120px;">Senha</th>
                <th scope="col" style="width: 120px;">Função</th>
                <th scope="col" style="width: 120px;">Curso</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; ?>
            <?php if ( isset( $fileItems ) AND is_object( $fileItems ) ) : ?>
                <?php foreach ( $fileItems as $offset => $item ) : ?>

                <?php $name = explode( ' ', $item['Nome completo'], 2 ) ?>

                    <tr class="alternate ajax-submit">

                        <!-- Linha -->
                        <th class="text-center" scope="row"><?php echo $count ?></th>

                        <!-- Gerar Pedido -->
                        <td>
                            <select class="register-user" name="register-user">
                                <option value="1" selected>Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </td>

                        <td><input type="text" name="first_name" value="<?= ucwords( strtolower( $name[0] ) ) ?>"></td>

                        <td><input type="text" name="last_name" value="<?= ucwords( strtolower( $name[1] ) ) ?>"></td>

                        <td><input type="text" name="user_email" value="<?= $item['Email'] ?>"></td>

                        <td><input type="text" name="user_login" value="<?= $item['Email'] ?>"></td>

                        <td><input type="text" name="user_pass" class="set-pass" value="digitacaobrabo"></td>

                        <td>
                            <select name="role">
                                <option value="subscriber" selected>Assinante</option>
                                <option value="administrator">Administrador</option>
                            </select>
                        </td>

                        <td>
                            <select name="course" class="set-courses">
                                <?php if ( is_array( $courses = \App\Classes\Core\Helpers::getCourses() ) ) : ?>
                                    <?php foreach ( $courses as $course ) : ?>
                                        <option value="<?= $course->ID ?>"> <?= $course->post_title ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </td>

                    </tr>
                    <?php $count++; ?>

                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>