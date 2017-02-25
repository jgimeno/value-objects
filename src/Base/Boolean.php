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
    /**
     * @var string
     */
    private $value;

    /**
     * @param bool $boolean
     */
    public function __construct(bool $boolean)
    {
        $this->value = $boolean;
    }

    /**
     * @return bool
     */
    public function value(): bool
    {
        return (bool) $this->value;
    }

    /**
     * @param int $int
     * @return self
     */
    public static function fromInt(int $int): self
    {
        $result = $int !== 0 ? true : false;

        return new static($result);
    }

    /**
     * @param string $string
     * @return self
     */
    public static function fromString(string $string): self
    {
        return new static(strcasecmp('true', $string) === 0);
    }

    /**
     * @param self $boolean
     * @return self
     */
    public function and(self $boolean): self
    {
        $andResult = $this->value && $boolean->value;

        return new static($andResult);
    }

    /**
     * @param self $boolean
     * @return self
     */
    public function or(self $boolean): self
    {
        $orResult = $this->value || $boolean->value;

        return new static($orResult);
    }

    /**
     * @return self
     */
    public function not(): self
    {
        $notResult = !$this->value;

        return new static($notResult);
    }

    /**
     * @param self $boolean
     * @return self
     */
    public function xor(self $boolean): self
    {
        $xorResult = ($this->value xor $boolean->value);

        return new static($xorResult);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value ? 'true' : 'false';
    }
}
