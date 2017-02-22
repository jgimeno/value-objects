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
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    /**
     * @param string $email
     * @throws \InvalidArgumentException
     */
    private function validate(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("$email is not a valid e-mail address.");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
    }
  
    public function username(): string
    {
        return $this->getEmailParts()[0];
    }

    public function domain(): string
    {
        return $this->getEmailParts()[1];
    }

    private function getEmailParts(): array
    {
        return explode("@", $this->email);
    }
}
