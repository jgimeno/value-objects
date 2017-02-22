<?php

namespace ValueObjects\Base;

use ValueObjects\ValueObject;

use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    /**
     * @dataProvider nonNumericValues
     */
    public function testItThrowsExceptionWhenCreatingItFromNoNumericValue($value)
    {
        $this->expectException(\InvalidArgumentException::class);

        new Number($value);
    }

    public function nonNumericValues() : array
    {
        $set = [];

        $set['an array'] = [
            'value' => []
        ];

        $set['an string'] = [
            'value' => 'a string'
        ];

        $set['a boolean'] = [
            'value' => true
        ];

        return $set;
    }

    /**
     * @dataProvider numericValuesAndStringConversions
     */
    public function testWeCanConvertANumberToString($number, string $numberAsString)
    {
        $number = new Number($number);

        $this->assertEquals($numberAsString, $number);
    }

    public function numericValuesAndStringConversions() : array
    {
        $set = [];

        $set['integer'] = [
            'number' => 123,
            'numberAsString' => '123'
        ];

        $set['float'] = [
            'number' => 123.2,
            'numberAsString' => '123.2'
        ];

        $set['hexadecimal'] = [
            'number' => 0x539,
            'numberAsString' => '1337'
        ];

        $set['binary'] = [
            'number' => 0b10100111001,
            'numberAsString' => '1337'
        ];

        $set['exponential'] = [
            'number' => 1337e0,
            'numberAsString' => '1337'
        ];

        return $set;
    }
}
