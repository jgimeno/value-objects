<?php

namespace ValueObjects\Internet;

use InvalidArgumentException;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testWeCanCreateAnEmailObject()
    {
        $email = new Email("jgimeno@gmail.com");
        $this->assertEquals("jgimeno@gmail.com", $email);
    }

    /**
     * @dataProvider invalidEmails
     * @param $email
     */
    public function testItThrowsExceptionWhenAnInvalidEmailIsSet($email)
    {
        $this->expectException(InvalidArgumentException::class);

        new Email($email);
    }

    public function invalidEmails() : array
    {
        $set = [];

        $set['invalid email 1'] = [
            'email' => 'fakemail.com'
        ];

        $set['invalid email 2'] = [
            'email' => 'fakemail.@com'
        ];

        $set['invalid email 3'] = [
            'email' => '@com'
        ];

        $set['invalid email 4'] = [
            'email' => '@sadf.com'
        ];

        $set['invalid email 5'] = [
            'email' => 'dasf@sadf'
        ];

        $set['invalid email 6'] = [
            'email' => 'dasf@sadf'
        ];

        $set['invalid email 7'] = [
            'email' => 'dasf@sadf@fdasdf.es'
        ];

        return $set;
    }
}
