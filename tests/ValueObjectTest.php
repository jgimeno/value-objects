<?php

namespace ValueObjects;

use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    public function testWeCanDefineAValueObject()
    {
        $value = $this->valueObjectWithValue(123);
        $this->assertInstanceOf(ValueObject::class, $value);
    }

    public function testAValueObjectCanBeCastedToString()
    {
        $value = $this->valueObjectWithValue(123);
        $this->assertEquals("123", $value);
    }

    public function testEqualityIsBasedOnValueAndNotOnInstance()
    {
        $value1 = $this->valueObjectWithValue(123);
        $value2 = $this->valueObjectWithValue(123);

        $this->assertNotSame($value1, $value2);
        $this->assertTrue($value1->equals($value2));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testTwoValueObjectsOfDifferentTypesCanNotBeCompared()
    {
        $value1 = new ValueObjectA();
        $value2 = new ValueObjectB();

        $value1->equals($value2);
    }

    private function valueObjectWithValue($value)
    {
        return new class($value) extends ValueObject {
            /**
             * @var string
             */
            private $value;

            /**
             * @param string $value
             */
            public function __construct(string $value)
            {
                $this->value = $value;
            }

            /**
             * @return string
             */
            public function __toString(): string
            {
                return $this->value;
            }
        };
    }
}

class ValueObjectA extends ValueObject
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return '';
    }
}

class ValueObjectB extends ValueObject
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return '';
    }
}
