<?php

namespace ValueObjects\Base;

use PHPUnit\Framework\TestCase;

class IdentifierTest extends TestCase
{
    public function testWeCanCreateAnIdentifierUsingStaticMethodAndCheckEquality()
    {
        $identifier = Identifier::generate();
        $identifier2 = Identifier::generate();
        $identifierAsString = (string) $identifier;

        $identifierFromString = Identifier::fromString($identifierAsString);

        $this->assertTrue($identifier->equals($identifierFromString));
        $this->assertFalse($identifier2->equals($identifierFromString));
    }
}
