<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TheCrypticAce\Hooks\TestHooks;

class ParentTestCase extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->setUpTraits();
    }

    protected function setUpTraits()
    {
        //
    }
}
