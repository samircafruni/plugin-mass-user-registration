<?php
/**
 * Cadastra Usuários em Massa
 *
 * @package mass-user-registration/Classes/Core
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Classes\Core;

/*
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
defined('ABSPATH') || exit;

/*
 * Classe gerencia os assets do plugin
 */

class Assets
{
    public function __construct()
    {
        // add_action('wp_enqueue_scripts', [$this, 'registerAssets']);
        add_action('admin_enqueue_scripts', [$this, 'registerAdminAssets'], 99);
    }

    /**
     * Registra os assets
     *
     * @return void
     */
    public function registerAssets(): void
    {
        wp_enqueue_style('mass-user-registration', SCFI_MUR_PLUGIN_STYLES . 'main.css', null, null, true);
        wp_enqueue_script('mass-user-registration', SCFI_MUR_PLUGIN_SCRIPTS . 'main.js', false, true);
    }

    /**
     * Registra os assets no admin
     *
     * @return void
     */
    public function registerAdminAssets(): void
    {
        if (get_current_screen()->id === 'users_page_add-users-in-mass') {
            // Bootstrap
            wp_enqueue_style('mass-user-registration-bootstrap', SCFI_MUR_PLUGIN_LIBS . 'bootstrap/bootstrap.min.css');
            wp_enqueue_script('mass-user-registration-bootstrap', SCFI_MUR_PLUGIN_LIBS . 'bootstrap/bootstrap.bundle.min.js', [], null, true);

            // jQuery Mask
            wp_enqueue_script('mass-user-registration-mask', SCFI_MUR_PLUGIN_LIBS . 'jquery-mask/jquery.mask.min.js', [], null, true);

            // Assets personalizados
            wp_enqueue_style('mass-user-registration-custom', SCFI_MUR_PLUGIN_STYLES . 'admin.css');
            wp_enqueue_script('mass-user-registration-custom', SCFI_MUR_PLUGIN_SCRIPTS . 'admin.js', ['jquery'], null, true);

            // Inicializa a rota das requisições Ajax
            wp_localize_script('mass-user-registration-custom', 'api', ['ajax_url' => admin_url('admin-ajax.php')]);

        }
    }
}