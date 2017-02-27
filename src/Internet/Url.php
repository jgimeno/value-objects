<?php

namespace ValueObjects\Internet;

use ValueObjects\ValueObject;


/**
 * Class Url
 * Value object that represents a Url Address.
 * @package ValueObjects\Internet
 */
class Url extends ValueObject
{
    private $url;

    /**
     * Url constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->validate($url);
        $this->url = $url;
    }

    private function validate(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException("$url is not a valid url");
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->url;
    }
}