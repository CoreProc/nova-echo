<?php

namespace Coreproc\NovaEcho;

class NovaEcho
{
    public static function config($key, $default = null)
    {
        return config('broadcasting.connections.' .
            config('broadcasting.nova', config('broadcasting.default')) . '.' . $key, $default);
    }
}
