<?php

namespace AndrewGJohnson\AgjGd\Tests;

use PHPUnit\Framework\TestCase;

class ImagettftextgradientTest extends TestCase
{
    public function testFunctionExists(): void
    {
        $this->assertTrue(function_exists('imagettftextgradient'));
    }
}
