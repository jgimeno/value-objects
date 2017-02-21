<?php

namespace ValueObjects\Internet;

use ValueObjects\ValueObject;

class IpAddress extends ValueObject
{
    /**
     * IpAddress constructor.
     * @param string $ipAddress The ip address.
     */
    public function __construct(string $ipAddress)
    {
        $this->validate($ipAddress);
        parent::__construct($ipAddress);
    }

    private function validate($ipAddress): void
    {
        if (filter_var($ipAddress, FILTER_VALIDATE_IP) === false) {
            throw new \InvalidArgumentException("$ipAddress is not a valid ip address.");
        }
    }
}
