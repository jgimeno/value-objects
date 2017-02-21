<?php

namespace ValueObjects\Internet;

use PHPUnit\Framework\TestCase;

class IpAddressTest extends TestCase
{
    public function testWeCanCreateAnIpAdress()
    {
        $ip = new IpAddress("192.168.1.1");
        $this->assertInstanceOf(IpAddress::class, $ip);
        $this->assertEquals("192.168.1.1", $ip);
    }

    /**
     * @dataProvider invalidIpAddresses
     * @param $invalidIpAddress
     */
    public function testItThrowsExceptionOnInvalidIpAddresses($invalidIpAddress)
    {
        $this->expectException(\InvalidArgumentException::class);
        new IpAddress($invalidIpAddress);
    }

    public function invalidIpAddresses(): array
    {
        $set = [];

        $set['no ip address'] = [
            'invalidIpAddress' => ''
        ];

        $set['uncomplete ip address'] = [
            'invalidIpAddress' => '192.168.1'
        ];

        $set['not ip'] = [
            'invalidIpAddress' => '192'
        ];

        $set['an integer'] = [
            'invalidIpAddress' => 1
        ];

        return $set;
    }
}
