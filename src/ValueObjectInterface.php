<?php

namespace ValueObjects;

interface ValueObjectInterface
{
    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool;
}
