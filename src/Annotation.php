<?php

namespace TheCrypticAce\Hooks;

class Annotation
{
    private $when;
    private $what;
    private $value;
    private $method;
    private $annotation;

    public function __construct($data)
    {
        $this->value = $data["value"];
        $this->method = $data["method"];
        $this->annotation = $data["annotation"];

        list($this->when, $this->what) = explode(" ", $data["value"]);
    }

    public function when()
    {
        return $this->when;
    }

    public function what()
    {
        return $this->what;
    }

    public function method()
    {
        return $this->method;
    }
}
