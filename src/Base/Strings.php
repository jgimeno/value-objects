<?php

namespace ValueObjects\Base;

use ValueObjects\ValueObject;

/**
 * Class Strings
 * ValueObject that represents a String with lots of useful methods.
 * It is called Strings since string is a reserved word in Php 7.
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
    public static function fromInt(int $int): self
    {
        return new self((string) $int);
    }

    /**
     * Cretes a string from a double.
     * @param float $double
     * @return Strings
     */
    public static function fromFloat(float $double): self
    {
        return new static((string) $double);
    }

    /**
     * Returns a new string converted to uppercase.
     * @return self
     */
    public function toUpperCase(): self
    {
        return new static(strtoupper($this->value));
    }

    /**
     * Returns a new string converted to low case.
     * @return self
     */
    public function toLowerCase(): self
    {
        return new static(strtolower($this->value));
    }

    /**
     * Returns a new trimmed string.
     * @return self
     */
    public function trim(): self
    {
        return new static(trim($this->value));
    }

    /**
     * Returns the length of a string.
     * @return int
     */
    public function length(): int
    {
        return strlen($this->value);
    }
}
