<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use TheCrypticAce\Hooks\TestHooks;

class TestHooksTest extends TestCase
{
    /** @test */
    public function all_hooks_run_in_the_correct_order()
    {
        HookFixture::$results = [];

        $suite = new TestSuite(HookFixture::class);
        $result = $suite->run();

        $this->assertTrue($result->wasSuccessful());
        $this->assertEquals([
            "runsBeforeSetUpBeforeClass",
            "runsAfterSetUpBeforeClass",

            "runsBeforeSetUp",
            "runsBeforeSetUpTraits",
            "runsAfterSetUpTraits",
            "runsAfterSetUp",

            "runsBeforeCustomStaticHookPoint",
            "runsAfterCustomStaticHookPoint",
            "runsBeforeCustomInstanceHookPoint",
            "runsAfterCustomInstanceHookPoint",

            "runsBeforeTearDown",
            "runsAfterTearDown",

            "runsBeforeTearDownAfterClass",
            "runsAfterTearDownAfterClass",
        ], HookFixture::$results);
    }
}
