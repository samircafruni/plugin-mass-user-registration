<?php
/**
 * Cadastra Usuários em Massa
 *
 * @package mass-user-registration/Classes/Core
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

use App\Classes\Tests\Debug;
use App\Controllers\Web\Admin\PageAddUsers;
use App\Controllers\Web\Admin\Sales;
use App\Classes\Plugins\Acf\{
    RegisterAcfFields,
    RegisterAcfPageOptions,
};

/**
 * Classe inicia o plugin
 */

class Setup
{
    /**
     * @var bool
     */
    public $devMode;

    /**
     * Por padrão, o modo de desenvolvimento está desabilitado.
     * No final do arquivo principal, quando esta classe é
     * instanciado, defina true para habilitá-lo.
     *
     * @param bool $devMode
     */
    public function __construct($devMode = false)
    {
        // Inicia o modo debug
        $this->devMode = $devMode;

        // Handler controllers after all plugins loaded
        add_action('plugins_loaded', [$this, 'handler']);
    }

    /**
     * Esta propriedade manipula o core do plugins.
     *
     * @return void
     */
    public function handler()
    {
        // Registra os assets do plugin
        $this->registerAssets();

        // Registra as requisições Ajax do plugin
        $this->registerAjax();

        // Registra a página de opções do plugin
        $this->registerPages();

        // Inicia os Controllers
        //

        // Verifica se a classe "Debug" esta ativa.
        $this->enableDebug();
    }

    /**
     * Retorna as requisições Ajax do plugin
     *
     * @return void
     */
    public function registerAjax(): void
    {
        new Ajax();
    }

    /**
     * Retorna os assets do plugin
     *
     * @return void
     */
    public function registerAssets(): void
    {
        new Assets();
    }

    /**
     * Habilita a classe de debug
     *
     * @return void
     */
    private function enableDebug(): void
    {
        if ($this->devMode) {
            new Debug();
        }
    }

    /**
     * Retorna a página de opções do plugin
     *
     * @return void
     */
    private function registerPages(): void
    {
        new PageAddUsers();
    }

}
