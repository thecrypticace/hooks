<?php

namespace TheCrypticAce\Hooks;

use ReflectionClass;
use PHPUnit\Util\Test;

class Annotations
{
    private $class;
    private $filters;

    public static function forHooksOn($class)
    {
        yield from static::on($class)->only("run")->get();
    }

    private function __construct($class)
    {
        $this->class = $class;
    }

    private static function on($class)
    {
        return new static($class);
    }

    private function only($types)
    {
        $this->filters = array_merge($this->filters ?? [], (array) $types);

        return $this;
    }

    private function get()
    {
        foreach ($this->byMethod() as $method => $annotations) {
            foreach ($annotations as $annotation => $values) {
                if (! is_null($this->filters) && ! in_array($annotation, $this->filters)) {
                    continue;
                }

                foreach ($values as $value) {
                    yield new Annotation([
                        "annotation" => $annotation,
                        "method" => $method,
                        "value" => $value,
                    ]);
                }
            }
        }
    }

    private function byMethod()
    {
        foreach ($this->methods() as $method) {
            if ($annotations = $this->parse($method)) {
                yield $method => $annotations;
            }
        }
    }

    private function methods()
    {
        $reflection = new ReflectionClass($this->class);

        foreach ($reflection->getMethods() as $method) {
            yield $method->getName();
        }
    }

    private function parse($method)
    {
        $annotations = Test::parseTestMethodAnnotations($this->class, $method);

        return $annotations["method"] ?? [];
    }
}
