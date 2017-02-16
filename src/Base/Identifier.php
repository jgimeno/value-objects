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
    public function __construct(UuidInterface $identifier)
    {
        parent::__construct($identifier);
    }

    public function equals(ValueObject $identifier): bool
    {
        return (string) $this == (string) $identifier;
    }

    public static function generate(): self
    {
        return new static(Uuid::uuid1());
    }

    public static function fromString(string $identifier): self
    {
        return new static(Uuid::fromString($identifier));
    }
}
