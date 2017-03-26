<?php

namespace TheCrypticAce\Hooks;

trait HasHooks
{
    protected static $hooks = [];

    private function hooks()
    {
        return static::classHooks()->as($this);
    }

    private static function classHooks()
    {
        return static::$hooks[static::class] = static::$hooks[static::class] ?? Hooks::createAs(
            static::class
        );
    }
}
