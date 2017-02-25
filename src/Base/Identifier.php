<?php

namespace ValueObjects\Base;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use ValueObjects\ValueObject;

/**
 * Class Identifier
 * Value Object for creating unique identifiers, it can be extended for creating
 * identify objects like UserId, etc.
 * -
 * Ex:
 *      class UserId extends Identifier {}
 * then we can use:
 *   $userId = UserId::generate();
 * @package ValueObjects\Base
 */
class Identifier extends ValueObject
{
    /**
     * @var UuidInterface
     */
    private $value;

    /**
     * Identifier constructor.
     * @param UuidInterface $identifier
     */
    public function __construct(UuidInterface $identifier)
    {
        $this->value = $identifier;
    }

    /**
     * @return Identifier
     */
    public static function generate(): self
    {
        return new static(Uuid::uuid1());
    }

    /**
     * @param string $identifier
     * @return Identifier
     */
    public static function fromString(string $identifier): self
    {
        return new static(Uuid::fromString($identifier));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }
}
