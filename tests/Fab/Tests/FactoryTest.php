<?php

/*
 * This file is part of Fab.
 *
 * (c) Jeff Welch <whatthejeff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fab\Tests;

use Fab\Factory;

/**
 * FabFactory test cases.
 *
 * @covers Fab\Factory
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider terminalProvider
     */
    public function testFactory($term, $expected)
    {
        $actual = Factory::getFab($term);
        $this->assertInstanceOf($expected, $actual);
    }

    public function terminalProvider()
    {
        return array(
            array('linux', '\\Fab\\Fab'),
            array('xterm', '\\Fab\\SuperFab'),
            array('rxvt-unicode-256color', '\\Fab\\SuperFab')
        );
    }
}