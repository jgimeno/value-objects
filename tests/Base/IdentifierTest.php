<?php

namespace ValueObjects\Base;

class IdentifierTest extends \PHPUnit_Framework_TestCase
{
    public function testWeCanCreateAnIdentifierUsingStaticMethodAndCheckEquality()
    {
        $identifier = Identifier::generate();
        $identifier2 = Identifier::generate();
        $identifierAsString = (string) $identifier;

        $identifierFromString = Identifier::fromString($identifierAsString);

        $this->assertEquals($identifierFromString, $identifier);
        $this->assertNotEquals($identifier, $identifier2);
        $this->assertTrue($identifier->equals($identifierFromString));
        $this->assertFalse($identifier2->equals($identifierFromString));
    }
}
