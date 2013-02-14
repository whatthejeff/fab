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

use Fab\Fab;

/**
 * Fab test cases.
 *
 * @covers Fab\Fab
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class FabTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider stringsProvider
     */
    public function testPaint($string, $expected)
    {
        $fab = new Fab();
        $actual = $fab->paint($string);

        $this->assertEquals($expected, $actual);
    }

    public function testCustomColors()
    {
        $fab = new Fab(array(31,32));

        $this->assertEquals("\x1b[31mh\x1b[0m", $fab->paintChar('h'));
        $this->assertEquals("\x1b[32më\x1b[0m", $fab->paintChar('ë'));
        $this->assertEquals("\x1b[31ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[32ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[31mõ\x1b[0m", $fab->paintChar('õ'));

        $this->assertEquals("\x1b[32mh\x1b[0m\x1b[31më\x1b[0m\x1b[32ml\x1b[0m\x1b[31ml\x1b[0m\x1b[32mõ\x1b[0m", $fab->paint('hëllõ'));
    }

    public function testPaintChar()
    {
        $fab = new Fab();
        $this->assertEquals("\x1b[31mh\x1b[0m", $fab->paintChar('h'));
        $this->assertEquals("\x1b[32më\x1b[0m", $fab->paintChar('ë'));
        $this->assertEquals("\x1b[33ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[34ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[35mõ\x1b[0m", $fab->paintChar('õ'));

        $this->assertEquals("\x1b[36m,\x1b[0m", $fab->paintChar(','));
        $this->assertEquals("\x1b[31m \x1b[0m", $fab->paintChar(' '));

        $this->assertEquals("\x1b[32mw\x1b[0m", $fab->paintChar('w'));
        $this->assertEquals("\x1b[33mö\x1b[0m", $fab->paintChar('ö'));
        $this->assertEquals("\x1b[34mr\x1b[0m", $fab->paintChar('r'));
        $this->assertEquals("\x1b[35ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[36md\x1b[0m", $fab->paintChar('d'));

        $this->assertEquals("\x1b[31m.\x1b[0m", $fab->paintChar('.'));
    }

    public function stringsProvider()
    {
        $super = <<<EOSUPER
Supercalifragilisticexpialidocious!
Even though the sound of it
Is something quite atrocious
If you say it loud enough
You'll always sound precocious
Supercalifragilisticexpialidocious!
EOSUPER;

        $super_pretty = <<<EOSUPER
\x1b[31mS\x1b[0m\x1b[32mu\x1b[0m\x1b[33mp\x1b[0m\x1b[34me\x1b[0m\x1b[35mr\x1b[0m\x1b[36mc\x1b[0m\x1b[31ma\x1b[0m\x1b[32ml\x1b[0m\x1b[33mi\x1b[0m\x1b[34mf\x1b[0m\x1b[35mr\x1b[0m\x1b[36ma\x1b[0m\x1b[31mg\x1b[0m\x1b[32mi\x1b[0m\x1b[33ml\x1b[0m\x1b[34mi\x1b[0m\x1b[35ms\x1b[0m\x1b[36mt\x1b[0m\x1b[31mi\x1b[0m\x1b[32mc\x1b[0m\x1b[33me\x1b[0m\x1b[34mx\x1b[0m\x1b[35mp\x1b[0m\x1b[36mi\x1b[0m\x1b[31ma\x1b[0m\x1b[32ml\x1b[0m\x1b[33mi\x1b[0m\x1b[34md\x1b[0m\x1b[35mo\x1b[0m\x1b[36mc\x1b[0m\x1b[31mi\x1b[0m\x1b[32mo\x1b[0m\x1b[33mu\x1b[0m\x1b[34ms\x1b[0m\x1b[35m!\x1b[0m\x1b[36m
\x1b[0m\x1b[31mE\x1b[0m\x1b[32mv\x1b[0m\x1b[33me\x1b[0m\x1b[34mn\x1b[0m\x1b[35m \x1b[0m\x1b[36mt\x1b[0m\x1b[31mh\x1b[0m\x1b[32mo\x1b[0m\x1b[33mu\x1b[0m\x1b[34mg\x1b[0m\x1b[35mh\x1b[0m\x1b[36m \x1b[0m\x1b[31mt\x1b[0m\x1b[32mh\x1b[0m\x1b[33me\x1b[0m\x1b[34m \x1b[0m\x1b[35ms\x1b[0m\x1b[36mo\x1b[0m\x1b[31mu\x1b[0m\x1b[32mn\x1b[0m\x1b[33md\x1b[0m\x1b[34m \x1b[0m\x1b[35mo\x1b[0m\x1b[36mf\x1b[0m\x1b[31m \x1b[0m\x1b[32mi\x1b[0m\x1b[33mt\x1b[0m\x1b[34m
\x1b[0m\x1b[35mI\x1b[0m\x1b[36ms\x1b[0m\x1b[31m \x1b[0m\x1b[32ms\x1b[0m\x1b[33mo\x1b[0m\x1b[34mm\x1b[0m\x1b[35me\x1b[0m\x1b[36mt\x1b[0m\x1b[31mh\x1b[0m\x1b[32mi\x1b[0m\x1b[33mn\x1b[0m\x1b[34mg\x1b[0m\x1b[35m \x1b[0m\x1b[36mq\x1b[0m\x1b[31mu\x1b[0m\x1b[32mi\x1b[0m\x1b[33mt\x1b[0m\x1b[34me\x1b[0m\x1b[35m \x1b[0m\x1b[36ma\x1b[0m\x1b[31mt\x1b[0m\x1b[32mr\x1b[0m\x1b[33mo\x1b[0m\x1b[34mc\x1b[0m\x1b[35mi\x1b[0m\x1b[36mo\x1b[0m\x1b[31mu\x1b[0m\x1b[32ms\x1b[0m\x1b[33m
\x1b[0m\x1b[34mI\x1b[0m\x1b[35mf\x1b[0m\x1b[36m \x1b[0m\x1b[31my\x1b[0m\x1b[32mo\x1b[0m\x1b[33mu\x1b[0m\x1b[34m \x1b[0m\x1b[35ms\x1b[0m\x1b[36ma\x1b[0m\x1b[31my\x1b[0m\x1b[32m \x1b[0m\x1b[33mi\x1b[0m\x1b[34mt\x1b[0m\x1b[35m \x1b[0m\x1b[36ml\x1b[0m\x1b[31mo\x1b[0m\x1b[32mu\x1b[0m\x1b[33md\x1b[0m\x1b[34m \x1b[0m\x1b[35me\x1b[0m\x1b[36mn\x1b[0m\x1b[31mo\x1b[0m\x1b[32mu\x1b[0m\x1b[33mg\x1b[0m\x1b[34mh\x1b[0m\x1b[35m
\x1b[0m\x1b[36mY\x1b[0m\x1b[31mo\x1b[0m\x1b[32mu\x1b[0m\x1b[33m'\x1b[0m\x1b[34ml\x1b[0m\x1b[35ml\x1b[0m\x1b[36m \x1b[0m\x1b[31ma\x1b[0m\x1b[32ml\x1b[0m\x1b[33mw\x1b[0m\x1b[34ma\x1b[0m\x1b[35my\x1b[0m\x1b[36ms\x1b[0m\x1b[31m \x1b[0m\x1b[32ms\x1b[0m\x1b[33mo\x1b[0m\x1b[34mu\x1b[0m\x1b[35mn\x1b[0m\x1b[36md\x1b[0m\x1b[31m \x1b[0m\x1b[32mp\x1b[0m\x1b[33mr\x1b[0m\x1b[34me\x1b[0m\x1b[35mc\x1b[0m\x1b[36mo\x1b[0m\x1b[31mc\x1b[0m\x1b[32mi\x1b[0m\x1b[33mo\x1b[0m\x1b[34mu\x1b[0m\x1b[35ms\x1b[0m\x1b[36m
\x1b[0m\x1b[31mS\x1b[0m\x1b[32mu\x1b[0m\x1b[33mp\x1b[0m\x1b[34me\x1b[0m\x1b[35mr\x1b[0m\x1b[36mc\x1b[0m\x1b[31ma\x1b[0m\x1b[32ml\x1b[0m\x1b[33mi\x1b[0m\x1b[34mf\x1b[0m\x1b[35mr\x1b[0m\x1b[36ma\x1b[0m\x1b[31mg\x1b[0m\x1b[32mi\x1b[0m\x1b[33ml\x1b[0m\x1b[34mi\x1b[0m\x1b[35ms\x1b[0m\x1b[36mt\x1b[0m\x1b[31mi\x1b[0m\x1b[32mc\x1b[0m\x1b[33me\x1b[0m\x1b[34mx\x1b[0m\x1b[35mp\x1b[0m\x1b[36mi\x1b[0m\x1b[31ma\x1b[0m\x1b[32ml\x1b[0m\x1b[33mi\x1b[0m\x1b[34md\x1b[0m\x1b[35mo\x1b[0m\x1b[36mc\x1b[0m\x1b[31mi\x1b[0m\x1b[32mo\x1b[0m\x1b[33mu\x1b[0m\x1b[34ms\x1b[0m\x1b[35m!\x1b[0m
EOSUPER;

        return array(
            array('', ''),
            array('hello world', "\x1b[31mh\x1b[0m\x1b[32me\x1b[0m\x1b[33ml\x1b[0m\x1b[34ml\x1b[0m\x1b[35mo\x1b[0m\x1b[36m \x1b[0m\x1b[31mw\x1b[0m\x1b[32mo\x1b[0m\x1b[33mr\x1b[0m\x1b[34ml\x1b[0m\x1b[35md\x1b[0m"),
            array('hëllõ wörld', "\x1b[31mh\x1b[0m\x1b[32më\x1b[0m\x1b[33ml\x1b[0m\x1b[34ml\x1b[0m\x1b[35mõ\x1b[0m\x1b[36m \x1b[0m\x1b[31mw\x1b[0m\x1b[32mö\x1b[0m\x1b[33mr\x1b[0m\x1b[34ml\x1b[0m\x1b[35md\x1b[0m"),
            array($super, $super_pretty)
        );
    }
}