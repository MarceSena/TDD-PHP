<?php

namespace CDC\Loja\Test;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase as PHPUnit;

class TestCase extends PHPUnit
{

    private $stack;

    protected function setUp(): void
    {
        $this->stack = [];
    }

    protected function tearDown(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
}