<?php

declare(strict_types=1);

namespace AssoConnect\Tests;

use AssoConnect\LibphoneDOMTOM;

/**
 *  @author Sylvain Fabre
 */
class AssoConnectLibphoneDOMTOMTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers \AssoConnect\LibphoneDOMTOM::parse
     * @dataProvider providerParse
     */
    public function testParse(string $input, string $output): void
    {
        self::assertSame($output, LibphoneDOMTOM::parse($input));
    }

    /** @return array<string, array{string, string}> */
    public static function providerParse(): array
    {
        return [
            'General French number' => ['+33123456789', '+33123456789'],
            'US number' => ['+12129634475', '+12129634475'],
            'RE - La Réunion' => ['+33692001234', '+262692001234'],
            'YT - Mayotte' => ['+33269641234', '+262269641234'],
            'PM - Saint Pierre and Miquelon' => ['+33508400000', '+508400000'],
            'GP - Guadeloupe / BL - Saint-Barthélemy / MF - Saint Martin' => ['+33690001234', '+590690001234'],
            'GF - Guyane' => ['+33694001234', '+594694001234'],
            'MQ - Martinique' => ['+33596461234', '+596596461234'],
        ];
    }
}
