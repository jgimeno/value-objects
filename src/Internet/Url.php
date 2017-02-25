<?php

namespace ValueObjects\Internet;

use ValueObjects\ValueObject;

/**
 * Url
 */
class Url extends ValueObject
{
    /**
     * Url constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->validate($url);
        parent::__construct($url);
    }

    private function validate(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException("$url is not a valid url");
        }
    }
}