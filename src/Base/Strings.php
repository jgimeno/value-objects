<?php

namespace ValueObjects\Base;

use ValueObjects\ValueObject;

/**
 * Class Strings
 * ValueObject that represents a String with lots of useful methods.
 * It is called string since string is a reserved word in Php 7.
 * @package ValueObjects\Base
 */
class Strings extends ValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    /**
     * Creates a string from an integer.
     * @param $int
     * @return Strings
     */
    public static function fromInt(int $int)
    {
        return new self((string) $int);
    }

    /**
     * Cretes a string from a double.
     * @param float $double
     * @return Strings
     */
    public static function fromFloat(float $double)
    {
        return new static((string) $double);
    }

    /**
     * Returns a new string converted to uppercase.
     * @return self
     */
    public function toUpperCase()
    {
        return new static(strtoupper($this->value));
    }

    /**
     * Returns a new string converted to low case.
     * @return self
     */
    public function toLowerCase()
    {
        return new static(strtolower($this->value));
    }

    public function trim()
    {
        return new static(trim($this->value));
    }
}
