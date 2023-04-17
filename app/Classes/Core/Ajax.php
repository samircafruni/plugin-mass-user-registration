<?php
/**
 * Cadastra Usuários em Massa
 *
 * @package mass-user-registration/Classes/Abstracts
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Core;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) {
    exit;
}

class Ajax
{

    public function __construct()
    {
        // Retorna as informações dos usuários
        add_action('wp_ajax_register_users', [$this, 'registerUsersInMass']);
        add_action('wp_ajax_nopriv_register_users', [$this, 'registerUsersInMass']);
    }

    /**
     * Retorna as informações dos usuários
     *
     * @return void
     */
    public function registerUsersInMass(): void
    {
        if ( $_POST ) {
            
            $userdata = [
                'first_name' => $_POST['data']['first_name'],
                'last_name'  => $_POST['data']['last_name'],
                'user_login' => $_POST['data']['user_email'],
                'user_email' => $_POST['data']['user_login'],
                'user_pass'	 => $_POST['data']['user_pass'],
                'role' 		 => $_POST['data']['role'],
            ];

            $register = wp_insert_user( $userdata );

            if ( ! is_wp_error( $register ) ) {

                /**
                 * Atualiza a matricula do usuário
                 */
                update_field( 'enrolled_courses', [ $_POST['data']['course'] ], 'user_' . $register);

                wp_send_json_success();
            }

            wp_send_json_error();
        }
    }
}