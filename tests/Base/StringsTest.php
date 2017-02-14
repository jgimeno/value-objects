<?php

namespace ValueObjects\Base;

class StringsTest extends \PHPUnit_Framework_TestCase
{
    public function testWeCanCreateAStringFromAString()
    {
        $string = new Strings("Hello");
        $this->assertEquals("Hello", $string);
    }

    public function testWeCanCreateAStringFromAnInteger()
    {
        $string = Strings::fromInt(123);
        $this->assertEquals("123", $string);
    }

    public function testWeCanCreateAStringFromADouble()
    {
        $string = Strings::fromFloat(5.2);
        $this->assertEquals("5.2", $string);
    }
}
