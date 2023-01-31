<?php

namespace App\Lux;

use function config;

class Lux {
    /**
     * Search a value in the Lux configuration.
     *
     * @param string $path
     * @return mixed
     */
    public static function config(string $path): mixed {
        return config('lux.' . $path);
    }
}
