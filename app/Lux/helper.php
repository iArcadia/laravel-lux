<?php

use App\Lux\Lux;

if (!function_exists('lux_config')) {
    /**
     * Search a value in the Lux configuration.
     *
     * @param string $path
     * @return mixed
     */
    function lux_config(string $path): mixed {
        return Lux::config($path);
    }
}
