<?php

namespace TheCrypticAce\Hooks;

class Container
{
    private $hooks;

    public function before($method)
    {
        return $this->build("before", $method);
    }

    public function after($method)
    {
        return $this->build("after", $method);
    }

    public function build($position, $method)
    {
        $this->hooks[$position][$method] = $this->hooks[$position][$method] ?? [];

        return new HookBuilder((object) [
            "hooks" => &$this->hooks[$position][$method],
        ]);
    }

    public function run($method, $callback, $callHook)
    {
        $this->before($method)->each($callHook);

        $result = $callback();

        $this->after($method)->each($callHook);

        return $result;
    }
}
