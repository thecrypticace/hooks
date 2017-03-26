<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TheCrypticAce\Hooks\TestHooks;

class HookFixture extends ParentTestCase
{
    use TestHooks;

    public static $results = [];

    /** @run before setUpBeforeClass **/
    public static function runsBeforeSetUpBeforeClass()
    {
        static::$results[] = "runsBeforeSetUpBeforeClass";
    }

    /** @run after setUpBeforeClass **/
    public static function runsAfterSetUpBeforeClass()
    {
        static::$results[] = "runsAfterSetUpBeforeClass";
    }

    /** @run before setUp **/
    public function runsBeforeSetUp()
    {
        static::$results[] = "runsBeforeSetUp";
    }

    /** @run after setUp **/
    public function runsAfterSetUp()
    {
        static::$results[] = "runsAfterSetUp";
    }

    /** @run before tearDown **/
    public function runsBeforeTearDown()
    {
        static::$results[] = "runsBeforeTearDown";
    }

    /** @run after tearDown **/
    public function runsAfterTearDown()
    {
        static::$results[] = "runsAfterTearDown";
    }

    /** @run before tearDownAfterClass **/
    public static function runsBeforeTearDownAfterClass()
    {
        static::$results[] = "runsBeforeTearDownAfterClass";
    }

    /** @run after tearDownAfterClass **/
    public static function runsAfterTearDownAfterClass()
    {
        static::$results[] = "runsAfterTearDownAfterClass";
    }

    /** @test */
    public function test()
    {
        $this->assertTrue(true);
    }
}
