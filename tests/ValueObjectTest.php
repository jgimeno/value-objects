<?php

namespace ValueObjects;

class ValueObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testWeCanDefineAValueObject()
    {
        $value = new ValueObject(123);
        $this->assertInstanceOf(ValueObject::class, $value);
    }

    public function testAValueObjectCanBeCastedToString()
    {
        $value = new ValueObject(123);
        $this->assertEquals("123", $value);
    }
}
