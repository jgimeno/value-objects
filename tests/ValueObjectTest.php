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

    public function testEqualityIsBasedOnValueAndNotOnInstace()
    {
        $value1 = new ValueObject(123);
        $value2 = new ValueObject(123);

        $this->assertNotSame($value1, $value2);
        $this->assertTrue($value1->equals($value2));
    }
}
