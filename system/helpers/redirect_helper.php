<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('redirect')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }
}

