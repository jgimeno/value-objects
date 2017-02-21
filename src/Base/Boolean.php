<?php

namespace ValueObjects\Base;

use ValueObjects\ValueObject;

/**
 * Class Number
 * Value object that represents a Boolean. It can perform logical operations.
 * @package ValueObjects\Base
 */
class Boolean extends ValueObject
{
    public function __construct(bool $boolean)
    {
        parent::__construct($boolean);
    }

    public function value(): bool
    {
        return (bool) $this->value;
    }

    public static function fromInt(int $int): self
    {
        $result = $int !== 0 ? true : false;

        return new static($result);
    }

    public static function fromString(string $string): self
    {
        return new static(strcasecmp('true', $string) === 0);
    }

    public function and(self $boolean): self
    {
        $andResult = $this->value && $boolean->value;

        return new static($andResult);
    }

    public function or(self $boolean): self
    {
        $orResult = $this->value || $boolean->value;

        return new static($orResult);
    }

    public function not(): self
    {
        $notResult = !$this->value;

        return new static($notResult);
    }

    public function xor(self $boolean): self
    {
        $xorResult = ($this->value xor $boolean->value);

        return new static($xorResult);
    }

    public function __toString(): string
    {
        return $this->value ? 'true' : 'false';
    }
}