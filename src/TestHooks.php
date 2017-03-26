<?php

namespace TheCrypticAce\Hooks;

trait TestHooks
{
    use HasHooks;
    use RegistersHooks;

    //
    // PHPUnit Hooks
    //
    public static function setUpBeforeClass()
    {
        return static::classHooks()->run();
    }

    public function setUp()
    {
        return $this->hooks()->run();
    }

    public function tearDown()
    {
        return $this->hooks()->run();
    }

    public static function tearDownAfterClass()
    {
        return static::classHooks()->run();
    }

    //
    // Laravel Hooks
    //
    protected function setUpTraits()
    {
        return $this->hooks()->run();
    }
}
