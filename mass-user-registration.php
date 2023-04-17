<?php

/***************************************************************************
 * Plugin Name:  Cadastra Usuários em Massa
 * Plugin URI:   https://github.com/BraboMateusAndrade/mass-user-registration
 * Description:  Plugin cadastra usuários em massa
 * Version:      1.0.0
 * License:      GPLv2 or later
 * Author:       Samir Cafruni
 * Author URI:   https://github.com/samircafruni
 * Text Domain:  mass-user-registration
 * Domain Path: /languages
 * Requires at least: 5.7
 * Requires PHP: 7.4
 *
 * @package mass-user-registration
 **************************************************************************/


/*
|--------------------------------------------------------------------------
| Previne que o arquivo não seja acessado diretamente por uma URL
|--------------------------------------------------------------------------
|
|
*/

defined ( 'ABSPATH' ) || exit;


/*
|--------------------------------------------------------------------------
| Inicializa o Composer
|--------------------------------------------------------------------------
|
|
*/

require_once __DIR__ . '/vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| Inicializa as funções do WP usadas no plugin
|--------------------------------------------------------------------------
|
|
*/

require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );


/*
|--------------------------------------------------------------------------
| Inicializa as rotas do plugin
|--------------------------------------------------------------------------
|
|
*/

// Define a URL do arquivo principal do plugin
define ('SCFI_MUR_PLUGIN_INDEX', __FILE__ );

// Define o nome base do plugin
define ('SCFI_MUR_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ));

// Define a URL do plugin
define ('SCFI_MUR_PLUGIN_URL', plugin_dir_url(__FILE__));

// Define o PATH do plugin
define ('SCFI_MUR_PLUGIN_URI', plugin_dir_path( __FILE__ ));

// Define a URL dos scripts do plugin
define ('SCFI_MUR_PLUGIN_LIBS', SCFI_MUR_PLUGIN_URL . 'resources/assets/libs/');

// Define a URL dos scripts do plugin
define ('SCFI_MUR_PLUGIN_SCRIPTS', SCFI_MUR_PLUGIN_URL . 'resources/assets/scripts/');

// Define a URL dos styles do plugin
define ('SCFI_MUR_PLUGIN_STYLES', SCFI_MUR_PLUGIN_URL . 'resources/assets/styles/');

// Define a URL das imagens do plugin
define ('SCFI_MUR_PLUGIN_IMAGES', SCFI_MUR_PLUGIN_URL . 'resources/assets/images/');

// Define o PATH de views do plugin
define ('SCFI_MUR_PLUGIN_VIEWS', SCFI_MUR_PLUGIN_URI . 'resources/views/');

// Uploads PATH
define ('SCFI_MUR_PLUGIN_FILES', SCFI_MUR_PLUGIN_URI . 'files/');


/*
|--------------------------------------------------------------------------
| Inicializa o Plugin
|--------------------------------------------------------------------------
|
|
*/

new \App\Classes\Core\Setup();



