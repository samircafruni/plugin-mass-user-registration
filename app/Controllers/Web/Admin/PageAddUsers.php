<?php
/**
 * Cadastra Usuários em Massa
 *
 * @package mass-user-registration/Classes/Abstracts
 * @since   1.0.0
 * @version 1.0.0
 */

namespace App\Controllers\Web\Admin;

/**
 * Previne que o arquivo não seja acessado diretamente por uma URL
 */
if (!defined('ABSPATH')) {
    exit;
}

use App\Classes\Core\Helpers;
use App\Controllers\Api\Hotmart\Sales;
use App\Controllers\Api\Ipressnet\Products;
use League\Csv\Reader;

/**
 * Gerencia a página de manipulação dos pedidos no WP Admin
 */
class PageAddUsers
{

    public $url;

    public function __construct()
    {
        add_action('admin_menu', [$this, 'listHotmartConsult'] );
    }

    /**
     * Cria o menu da página
     *
     * @return void
     */
    public function listHotmartConsult(): void
    {
        add_submenu_page(
            'users.php',
            'Add em Massa',
            'Add em Massa',
            'administrator',
            'add-users-in-mass',
            [$this, 'listItems']
        );
    }

    /**
     * REtorna a view da página
     *
     * @return void
     * @throws \League\Csv\Exception
     * @throws \League\Csv\InvalidArgument
     * @throws \League\Csv\UnavailableStream
     */
    public function listItems(): void
    {
        $pageToken = null;

        // Recebe arquivo CSV importado ou...
        if ( ! empty($_FILES) && $_FILES['file']['tmp_name'] !== '' ) {

            if ( ! ini_get("auto_detect_line_endings") ) {
                 ini_set("auto_detect_line_endings", '1');
            }

            $file = Reader::createFromPath($_FILES['file']['tmp_name'], 'r');
            $file->setDelimiter(';');
            $file->setHeaderOffset(0);

            $fileItems = $file->getRecords();
        }

        // Chama a views da página
        require_once(SCFI_MUR_PLUGIN_VIEWS . 'users.php');
    }

}