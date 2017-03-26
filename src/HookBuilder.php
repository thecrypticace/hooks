<?php

namespace TheCrypticAce\Hooks;

class HookBuilder
{
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function run($hook)
    {
        $this->container->hooks[] = $hook;
    }

    public function each($callback)
    {
        foreach ($this->container->hooks as $key => $hook) {
            $callback($hook, $key);
        }
    }
}
