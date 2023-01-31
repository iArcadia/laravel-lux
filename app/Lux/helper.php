<?php

use App\Lux\Lux;

if (!function_exists('lux_config')) {
    /**
     * Search a value in the Lux configuration.
     *
     * @param string $path
     * @param mixed|null $default
     * @return mixed
     */
    function lux_config(string $path, mixed $default = null): mixed {
        return Lux::config($path, $default);
    }
}

if (!function_exists('lux_version')) {
    /**
     * Get the version of your Laravel Lux.
     *
     * @return string
     */
    function lux_version(): string {
        return Lux::version();
    }
}
