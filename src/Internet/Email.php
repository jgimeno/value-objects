<?php

namespace ValueObjects\Internet;

use ValueObjects\ValueObject;

/**
 * Class Email
 * Value object that represents a mail address.
 * @package ValueObjects\Internet
 */
class Email extends ValueObject
{
    public function __construct(string $email)
    {
        $this->validate($email);
        parent::__construct($email);
    }

    private function validate($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("$email is not a valid e-mail address.");
        }
    }
}
