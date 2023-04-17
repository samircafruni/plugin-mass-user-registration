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
 * Gerencia os métodos auxiliares do plugin.
 */

class Helpers
{
    /**
     * Debug and Die.
     *
     * @param mixed $val
     * @return void
     */
    public static function dd($val): void
    {
        var_dump($val);
        die();
    }

    /**
     * Este método retorna o valor de um campo ACF, ou se vazio,
     * um retorno pré-definido.
     *
     * @param string $field_name
     * @param string $content_default
     * @param mixed $page
     * @return string
     */
    public static function gf(string $field_name, $page = 'option', string $content_default = '')
    {
        if (!function_exists('get_field')) {
            return '';
        }

        $value = get_field($field_name, $page) ?? get_field($field_name, $page);

        return $value && '' !== $value ? $value : $content_default;
    }

    /**
     * Este método printa o valor de um campo ACF, ou se vazio,
     * um retorno pré-definido.
     *
     * @param string $field_name
     * @param string $content_default
     * @param mixed $page
     * @return string
     */
    public static function tf(string $field_name, $page = 'option', string $content_default = ''): string
    {
        if (!function_exists('the_field')) {
            return '';
        }

        $value = the_field($field_name, $page) ?? the_field($field_name, $page);

        return $value && '' !== $value ? $value : $content_default;
    }

    /**
     * Remove acentos e caractes especiais de uma string
     *
     * @param $string
     * @return array|string|string[]|null
     */
    public static function cleanString($string)
    {
        return preg_replace([
            "/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/",
            "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"
        ], explode(" ", "a A e E i I o O u U n N"), $string);
    }

    /**
     * Retorna os cursos cadastrados no sistema
     *
     * @return int[]|\WP_Post[]
     */
    public static function getCourses()
    {
        return get_posts([
            'post_type'      => 'courses',
            'posts_per_page' => -1
        ]);
    }
}