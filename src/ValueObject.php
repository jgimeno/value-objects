<?php

namespace ValueObjects;

/**
 * Class ValueObject
 * Generic Base class where all the other extend.
 * @package ValueObjects
 */
abstract class ValueObject
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function equals(self $value2): bool
    {
        return $this->value === $value2->value;
    }
}
