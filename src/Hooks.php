<?php

namespace TheCrypticAce\Hooks;

use Closure;
use PHPUnit\Framework\TestCase;

class Hooks
{
    protected $container;
    protected $boundClass;
    protected $boundInstance;

    public static function createAs($class)
    {
        return new static($class);
    }

    protected function __construct($boundClass, $boundInstance = null, Container $container = null)
    {
        $this->container = $container ?? new Container;
        $this->boundClass = $boundClass;
        $this->boundInstance = $boundInstance;
    }

    public function as($instance)
    {
        return new static($this->boundClass, $instance, $this->container);
    }

    public function run($name = null, Closure $code = null)
    {
        if ($name instanceof Closure) {
            $code = $name;
            $name = $this->guessHookName();
        }

        $name = $name ?? $this->guessHookName();
        $code = $code ?? $this->defaultHook($name);

        return $this->container->run($name, $code, function ($codeToRun) {
            return $this->boundCallback($codeToRun)();
        });
    }

    public function annotate(Annotation $annotation)
    {
        $hooks = $this->container->build($annotation->when(), $annotation->what());

        return $hooks->run($annotation->method());
    }

    private function boundCallback($code)
    {
        if (is_string($code)) {
            $code = $this->boundInstance
                ? function () use ($code) { return $this->$code(); }
                : function () use ($code) { return static::$code(); };
        }

        return $code->bindTo($this->boundInstance, $this->boundClass);
    }

    private function defaultHook($name = null)
    {
        return $this->boundCallback(function () use ($name) {
            return parent::$name();
        });
    }

    private function guessHookName()
    {
        list($one, $two, $caller) = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);

        return $caller['function'];
    }
}
