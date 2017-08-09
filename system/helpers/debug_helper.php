<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('sd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function sd()
    {
        array_map(function ($x) {
            echo "<pre>";
            print_r($x);
        }, func_get_args());

        die(1);
    }
}


if (! function_exists('s')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function s()
    {
        array_map(function ($x) {
            echo "<pre>";
            print_r($x);
        }, func_get_args());

    }
}
