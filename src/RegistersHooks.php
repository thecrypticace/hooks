<?php

namespace TheCrypticAce\Hooks;

trait RegistersHooks
{
    /** @beforeClass */
    public static function registerHooks()
    {
        foreach (Annotations::forHooksOn(static::class) as $annotation) {
            static::classHooks()->annotate($annotation);
        }
    }
}
