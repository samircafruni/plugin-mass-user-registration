(function($) {

    /**
     * Aplica um curso em massa
     */
    $('.btn-set-courses').on('click', function () {
        var select            = $('.get-selected-course'),
            selectedMaterials = select.find(':selected').val();

        $('.set-courses').each( function () {
            $(this).val(selectedMaterials).change()
        })
    })

    /**
     * Aplica uma senha em massa
     */
    $('.btn-set-pass').on('click', function () {
        var select            = $('.get-new-pass'),
            selectedMaterials = select.val();

        $('.set-pass').each( function () {
            $(this).val(selectedMaterials)
        })
    })

    /**
     * Cadastro de Usuários
     */
    $('.btn-register-users').on('click', function () {

        // Percorre todas as linhas de pedidos
        $('.ajax-submit').each( function (i) {

            var formRow = $(this),
                registerUserSelect = formRow.find('.register-user')

            // Se autorizado faz o envio do ajax
            if ( registerUserSelect.find(':selected').val() === '1' ) {

                // Monta o objeto que será enviado por $_POST
                var userData = {
                    'linha':      '#' + formRow.find('th').html(),
                    'first_name': formRow.find('input[name="first_name"]').val(),
                    'last_name':  formRow.find('input[name="last_name"]').val(),
                    'user_email': formRow.find('input[name="user_email"]').val(),
                    'user_login': formRow.find('input[name="user_login"]').val(),
                    'user_pass':  formRow.find('input[name="user_pass"]').val(),
                    'role':       formRow.find('select[name="role"]').val(),
                    'course':     formRow.find('select[name="course"]').val(),
                }

                $.ajax({
                    type: 'POST',
                    url: api.ajax_url,
                    data: {
                        data: userData,
                        action: 'register_users'
                    },
                    async: false,
                    beforeSend: function () {
                        $('.btn-register-users').html('Processando...')
                    },
                    success: function (response) {

                        if ( response.success ) {

                            if (formRow.hasClass('table-danger')) {
                                formRow.removeClass('table-danger')
                            }

                            formRow.addClass('table-success')

                            // Atualiza a flag de permissao de envio de pedido
                            registerUserSelect.val('0').change()

                        } else {
                            formRow.addClass('table-danger')
                        }

                        $('.btn-register-users').html('Cadastrar Usuários')
                    },
                })
            } else {
                formRow.addClass('table-danger')
            }
        })
    })


})( jQuery );