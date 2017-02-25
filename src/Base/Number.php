<?php

namespace ValueObjects\Base;

use ValueObjects\ValueObject;

/**
 * Class Number
 * Value object that represents a number. It can perform basic arithmetical operations.
 * @package ValueObjects\Base
 */
class Number extends ValueObject
{
    /**
     * @var mixed
     */
    private $number;

    /**
     * Number constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->validate($number);
        $this->number = $number;
    }

    /**
     * Validates that the number is numeric.
     * @param mixed $value
     */
    protected function validate($value)
    {
        if (!is_numeric($value) || is_bool($value)) {
            throw new \InvalidArgumentException("Can't create a Number from a non numeric value.");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->number;
    }
}
