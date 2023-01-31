<?php

namespace App\Lux;

use function config;

class Lux {
    /**
     * Search a value in the Lux configuration.
     *
     * @param string $path
     * @param mixed|null $default
     * @return mixed
     */
    public static function config(string $path, mixed $default = null): mixed {
        return config('lux.' . $path, $default);
    }

    /**
     * Get the version of your Laravel Lux.
     *
     * @return string
     */
    public static function version(): string {
        return self::config('app.version');
    }
}
