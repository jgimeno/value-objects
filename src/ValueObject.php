<?php

namespace ValueObjects;

/**
 * Class ValueObject
 * Generic Base class where all the other extend.
 * @package ValueObjects
 */
abstract class ValueObject implements ValueObjectInterface
{
    /**
     * @param ValueObjectInterface $other
     * @return bool
     */
    public function equals(ValueObjectInterface $other): bool
    {
        if (get_class($this) !== get_class($other)) {
            throw new \InvalidArgumentException(sprintf('A Value Object of type %s can not be compared to another of type %s', get_class($this), get_class($other)));
        }
        return $this == $other;
    }
}
