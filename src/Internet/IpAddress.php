<?php

namespace ValueObjects\Internet;

use ValueObjects\ValueObject;

class IpAddress extends ValueObject
{
    /**
     * @var string
     */
    private $value;

    /**
     * IpAddress constructor.
     * @param string $ipAddress The ip address.
     */
    public function __construct(string $ipAddress)
    {
        $this->validate($ipAddress);
        $this->value = $ipAddress;
    }

    /**
     * @param string $ipAddress
     * @throws \InvalidArgumentException
     */
    private function validate(string $ipAddress)
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP) === false) {
            throw new \InvalidArgumentException("$ipAddress is not a valid ip address.");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
