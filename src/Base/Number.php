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
    public function __construct($value)
    {
        $this->validate($value);
        parent::__construct($value);
    }

    /**
     * Validates that the number is numeric.
     * @param $value
     */
    protected function validate($value)
    {
        if (!is_numeric($value) || is_bool($value)) {
            throw new \InvalidArgumentException("Can't create a Number from a non numeric value.");
        }
    }
}
