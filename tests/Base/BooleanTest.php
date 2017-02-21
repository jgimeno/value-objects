<?php

namespace ValueObjects\Base;

use PHPUnit\Framework\TestCase;

class BooleanTest extends TestCase
{
    /**
     * @dataProvider intToBooleanValues
     */
    public function testABooleanCanBeCreatedFromInt(int $int, bool $expectedResult)
    {
        $this->assertSame($expectedResult, Boolean::fromInt($int)->value());
    }

    public function intToBooleanValues() : array
    {
        $set = [];

        $set['0 is false'] = [
            'int' => 0,
            'expectedResult' => false
        ];

        $set['1 is true'] = [
            'int' => 1,
            'expectedResult' => true
        ];

        $set['a negative value is true'] = [
            'int' => -1,
            'expectedResult' => true
        ];

        $set['a value bigger than 1 is true'] = [
            'int' => 2,
            'expectedResult' => true
        ];

        return $set;
    }

    /**
     * @dataProvider stringToBooleanValues
     */
    public function testABooleanCanBeCreatedFromString(string $string, bool $expectedValue)
    {
        $this->assertSame($expectedValue, Boolean::fromString($string)->value());
    }

    public function stringToBooleanValues() : array
    {
        $set = [];

        $set['empty string is falsy'] = [
            'string' => '',
            'value' => false
        ];

        $set['1 string is falsy'] = [
            'string' => '1',
            'value' => false
        ];

        $set['true string is truthy'] = [
            'string' => 'true',
            'value' => true
        ];

        $set['true string is truthy no matters the case'] = [
            'string' => 'TrUe',
            'value' => true
        ];

        return $set;
    }

    public function testABooleanCanBeCastedToString()
    {
        $this->assertSame('true', (string) new Boolean(true));
        $this->assertSame('false', (string) new Boolean(false));
    }

    /**
     * @dataProvider andOperatorValues
     */
    public function testWeCanApplyANDOperatorToBoolean(bool $value, bool $anotherValue, bool $expectedValue)
    {
        $boolean = new Boolean($value);
        $andBooleanResult = $boolean->and(new Boolean($anotherValue));
        $this->assertSame($expectedValue, $andBooleanResult->value());
    }

    public function testANDOperatorIsImmutable()
    {
        $boolean = new Boolean(true);
        $this->assertImmutability($boolean, $boolean->and(new Boolean(true)));
    }

    public function andOperatorValues() : array
    {
        $set = [];

        $set['if both are true, and result evaluates to true'] = [
            'boolean' => true,
            'another boolean' => true,
            'resultant boolean' => true,
        ];
        $set['if first is false, and result evaluates to false'] = [
            'boolean' => false,
            'another boolean' => true,
            'resultant boolean' => false,
        ];
        $set['if second is false, and result evaluates to false'] = [
            'boolean' => true,
            'another boolean' => false,
            'resultant boolean' => false,
        ];
        $set['if both are false, and result evaluates to false'] = [
            'boolean' => false,
            'another boolean' => false,
            'resultant boolean' => false,
        ];
        return $set;
    }

    /**
     * @dataProvider orOperatorValues
     */
    public function testWeCanApplyOROperatorToBoolean(bool $value, bool $anotherValue, bool $expectedValue)
    {
        $boolean = new Boolean($value);
        $andBooleanResult = $boolean->or(new Boolean($anotherValue));
        $this->assertSame($expectedValue, $andBooleanResult->value());
    }

    public function orOperatorValues() : array
    {
        $set = [];

        $set['if both are true, OR result evaluates to true'] = [
            'boolean' => true,
            'another boolean' => true,
            'resultant boolean' => true,
        ];
        $set['if first is false, OR result evaluates to true'] = [
            'boolean' => false,
            'another boolean' => true,
            'resultant boolean' => true,
        ];
        $set['if second is false, OR result evaluates to true'] = [
            'boolean' => true,
            'another boolean' => false,
            'resultant boolean' => true,
        ];
        $set['if both are false, OR result evaluates to false'] = [
            'boolean' => false,
            'another boolean' => false,
            'resultant boolean' => false,
        ];
        return $set;
    }

    public function testOROperatorIsImmutable()
    {
        $boolean = new Boolean(true);
        $this->assertImmutability($boolean, $boolean->or(new Boolean(true)));
    }

    /**
     * @dataProvider xorOperatorValues
     */
    public function testWeCanApplyXOROperatorToBoolean(bool $value, bool $anotherValue, bool $expectedValue)
    {
        $boolean = new Boolean($value);
        $andBooleanResult = $boolean->xor(new Boolean($anotherValue));
        $this->assertSame($expectedValue, $andBooleanResult->value());
    }

    public function xorOperatorValues() : array
    {
        $set = [];

        $set['if both are true, XOR result evaluates to false'] = [
            'boolean' => true,
            'another boolean' => true,
            'resultant boolean' => false,
        ];
        $set['if first is false, XOR result evaluates to true'] = [
            'boolean' => false,
            'another boolean' => true,
            'resultant boolean' => true,
        ];
        $set['if second is false, XOR result evaluates to true'] = [
            'boolean' => true,
            'another boolean' => false,
            'resultant boolean' => true,
        ];
        $set['if both are false, XOR result evaluates to false'] = [
            'boolean' => false,
            'another boolean' => false,
            'resultant boolean' => false,
        ];

        return $set;
    }

    public function testXOROperatorIsImmutable()
    {
        $boolean = new Boolean(true);
        $this->assertImmutability($boolean, $boolean->xor(new Boolean(true)));
    }


    /**
     * @dataProvider notOperatorValues()
     */
    public function testWeCanApplyNOTOperatorToBoolean(bool $value, bool $expectedValue)
    {
        $boolean = new Boolean($value);
        $negatedBoolean = $boolean->not();
        $this->assertSame($expectedValue, $negatedBoolean->value());
    }

    public function notOperatorValues() : array
    {
        $set = [];

        $set['apply not to false boolean returns true'] = [
            'value' => false,
            'expected value' => true,
        ];
        $set['apply not to true boolean returns false'] = [
            'value' => true,
            'expected value' => false,
        ];

        return $set;
    }

    public function testNOTOperatorIsImmutable()
    {
        $boolean = new Boolean(true);
        $this->assertImmutability($boolean, $boolean->not());
    }


    public function assertImmutability($boolean, $booleanResult)
    {
        $this->assertNotSame(
            $boolean,
            $booleanResult
        );
    }
}