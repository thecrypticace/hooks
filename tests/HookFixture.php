<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TheCrypticAce\Hooks\TestHooks;

class HookFixture extends ParentTestCase
{
    use TestHooks;

    public static $results = [];

    protected static function customStaticHookPoint()
    {
        return static::classHooks()->run(function () {
            return parent::customStaticHookPoint();
        });
    }

    protected function customInstanceHookPoint()
    {
        return $this->hooks()->run(function () {
            return parent::customInstanceHookPoint();
        });
    }

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

    /** @run before setUpTraits **/
    public function runsBeforeSetUpTraits()
    {
        static::$results[] = "runsBeforeSetUpTraits";
    }

    /** @run after setUpTraits **/
    public function runsAfterSetUpTraits()
    {
        static::$results[] = "runsAfterSetUpTraits";
    }

    /** @run before customStaticHookPoint **/
    public static function runsBeforeCustomStaticHookPoint()
    {
        static::$results[] = "runsBeforeCustomStaticHookPoint";
    }

    /** @run after customStaticHookPoint **/
    public static function runsAfterCustomStaticHookPoint()
    {
        static::$results[] = "runsAfterCustomStaticHookPoint";
    }

    /** @run before customInstanceHookPoint **/
    public function runsBeforeCustomInstanceHookPoint()
    {
        static::$results[] = "runsBeforeCustomInstanceHookPoint";
    }

    /** @run after customInstanceHookPoint **/
    public function runsAfterCustomInstanceHookPoint()
    {
        static::$results[] = "runsAfterCustomInstanceHookPoint";
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
        static::customStaticHookPoint();
        $this->customInstanceHookPoint();

        $this->assertTrue(true);
    }
}
