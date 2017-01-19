<?php

require_once __DIR__.'/../Gtin.php';

use klof\gtin\Gtin;

/**
 * Class GtinTest
 */
class GtinTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param Gtin    $gtin
     * @param boolean $expected
     * @dataProvider gtinDataProvider
     */
    public function testIsValid($gtin, $expected)
    {
        $this->assertEquals($expected, $gtin->isValid());
    }

    /**
     * @return array
     */
    public function gtinDataProvider()
    {
        return [
            'case 1' => [
                'gtin' => (new Gtin('12345670')),
                'expected' => true,
            ],
            'case 2' => [
                'gtin' => (new Gtin('5703360488000')),
                'expected' => true,
            ],
            'case 3' => [
                'gtin' => (new Gtin(95050003)),
                'expected' => true,
            ],
            'case 4' => [
                'gtin' => (new Gtin(811204012344)),
                'expected' => true,
            ],
            'case 5' => [
                'gtin' => (new Gtin('00223393')),
                'expected' => true,
            ],
            'case 6' => [
                'gtin' => (new Gtin(null)),
                'expected' => false,
            ],
            'case 7' => [
                'gtin' => (new Gtin('wrong_gtin')),
                'expected' => false,
            ],
        ];
    }
}