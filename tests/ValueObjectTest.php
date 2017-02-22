<?php

namespace ValueObjects;

use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    public function testWeCanDefineAValueObject()
    {
        $value = new TestValue(123);
        $this->assertInstanceOf(ValueObject::class, $value);
    }

    public function testAValueObjectCanBeCastedToString()
    {
        $value = new TestValue(123);
        $this->assertEquals("123", $value);
    }

    public function testEqualityIsBasedOnValueAndNotOnInstace()
    {
        $value1 = new TestValue(123);
        $value2 = new TestValue(123);

        $this->assertNotSame($value1, $value2);
        $this->assertTrue($value1->equals($value2));
    }
}

class TestValue extends ValueObject
{
}
