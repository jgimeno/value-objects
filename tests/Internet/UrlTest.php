<?php

namespace ValueObjects\Internet;

use PHPUnit\Framework\TestCase;
use ValueObjects\Exceptions\InvalidUrlException;

/**
 * UrlTest
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class UrlTest extends TestCase
{
    /**
     * @dataProvider invalidUrls
     *
     * @param $invalidUrl
     */
    public function testInvalidUrl($invalidUrl)
    {
        $this->expectException(InvalidUrlException::class);
        new Url($invalidUrl);
    }

    public function invalidUrls(): array
    {
        return [
            'no url' => ['invalidUrl' => ''],
            'uncompleted url' => ['invalidUrl' => 'www.google'],
            'not url' => ['invalidUrl' => 'thisisnotanurl'],
            'an integer' => ['invalidUrl' => 2]
        ];
    }

    /**
     *
     */
    public function testValidUrl()
    {
        $url = new Url("http://www.google.es");
        $this->assertEquals("http://www.google.es", $url);
    }
}
