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

use Fab\SuperFab;

/**
 * SuperFab test cases.
 *
 * @covers Fab\SuperFab
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class SuperFabTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider stringsProvider
     */
    public function testPaint($string, $expected)
    {
        $fab = new SuperFab();
        $actual = $fab->paint($string);

        $this->assertEquals($expected, $actual);
    }

    public function testPaintChar()
    {
        $fab = new SuperFab();
        $this->assertEquals("\x1b[38;5;154mh\x1b[0m", $fab->paintChar('h'));
        $this->assertEquals("\x1b[38;5;154më\x1b[0m", $fab->paintChar('ë'));
        $this->assertEquals("\x1b[38;5;148ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[38;5;184ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[38;5;184mõ\x1b[0m", $fab->paintChar('õ'));

        $this->assertEquals("\x1b[38;5;214m,\x1b[0m", $fab->paintChar(','));
        $this->assertEquals("\x1b[38;5;214m \x1b[0m", $fab->paintChar(' '));

        $this->assertEquals("\x1b[38;5;208mw\x1b[0m", $fab->paintChar('w'));
        $this->assertEquals("\x1b[38;5;208mö\x1b[0m", $fab->paintChar('ö'));
        $this->assertEquals("\x1b[38;5;203mr\x1b[0m", $fab->paintChar('r'));
        $this->assertEquals("\x1b[38;5;203ml\x1b[0m", $fab->paintChar('l'));
        $this->assertEquals("\x1b[38;5;198md\x1b[0m", $fab->paintChar('d'));

        $this->assertEquals("\x1b[38;5;198m.\x1b[0m", $fab->paintChar('.'));
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
\x1b[38;5;154mS\x1b[0m\x1b[38;5;154mu\x1b[0m\x1b[38;5;148mp\x1b[0m\x1b[38;5;184me\x1b[0m\x1b[38;5;184mr\x1b[0m\x1b[38;5;214mc\x1b[0m\x1b[38;5;214ma\x1b[0m\x1b[38;5;208ml\x1b[0m\x1b[38;5;208mi\x1b[0m\x1b[38;5;203mf\x1b[0m\x1b[38;5;203mr\x1b[0m\x1b[38;5;198ma\x1b[0m\x1b[38;5;198mg\x1b[0m\x1b[38;5;199mi\x1b[0m\x1b[38;5;199ml\x1b[0m\x1b[38;5;164mi\x1b[0m\x1b[38;5;164ms\x1b[0m\x1b[38;5;129mt\x1b[0m\x1b[38;5;129mi\x1b[0m\x1b[38;5;93mc\x1b[0m\x1b[38;5;93me\x1b[0m\x1b[38;5;63mx\x1b[0m\x1b[38;5;63mp\x1b[0m\x1b[38;5;63mi\x1b[0m\x1b[38;5;33ma\x1b[0m\x1b[38;5;33ml\x1b[0m\x1b[38;5;39mi\x1b[0m\x1b[38;5;39md\x1b[0m\x1b[38;5;44mo\x1b[0m\x1b[38;5;44mc\x1b[0m\x1b[38;5;49mi\x1b[0m\x1b[38;5;49mo\x1b[0m\x1b[38;5;48mu\x1b[0m\x1b[38;5;48ms\x1b[0m\x1b[38;5;83m!\x1b[0m\x1b[38;5;83m
\x1b[0m\x1b[38;5;118mE\x1b[0m\x1b[38;5;118mv\x1b[0m\x1b[38;5;154me\x1b[0m\x1b[38;5;154mn\x1b[0m\x1b[38;5;184m \x1b[0m\x1b[38;5;184mt\x1b[0m\x1b[38;5;178mh\x1b[0m\x1b[38;5;154mo\x1b[0m\x1b[38;5;154mu\x1b[0m\x1b[38;5;148mg\x1b[0m\x1b[38;5;184mh\x1b[0m\x1b[38;5;184m \x1b[0m\x1b[38;5;214mt\x1b[0m\x1b[38;5;214mh\x1b[0m\x1b[38;5;208me\x1b[0m\x1b[38;5;208m \x1b[0m\x1b[38;5;203ms\x1b[0m\x1b[38;5;203mo\x1b[0m\x1b[38;5;198mu\x1b[0m\x1b[38;5;198mn\x1b[0m\x1b[38;5;199md\x1b[0m\x1b[38;5;199m \x1b[0m\x1b[38;5;164mo\x1b[0m\x1b[38;5;164mf\x1b[0m\x1b[38;5;129m \x1b[0m\x1b[38;5;129mi\x1b[0m\x1b[38;5;93mt\x1b[0m\x1b[38;5;93m
\x1b[0m\x1b[38;5;63mI\x1b[0m\x1b[38;5;63ms\x1b[0m\x1b[38;5;63m \x1b[0m\x1b[38;5;33ms\x1b[0m\x1b[38;5;33mo\x1b[0m\x1b[38;5;39mm\x1b[0m\x1b[38;5;39me\x1b[0m\x1b[38;5;44mt\x1b[0m\x1b[38;5;44mh\x1b[0m\x1b[38;5;49mi\x1b[0m\x1b[38;5;49mn\x1b[0m\x1b[38;5;48mg\x1b[0m\x1b[38;5;48m \x1b[0m\x1b[38;5;83mq\x1b[0m\x1b[38;5;83mu\x1b[0m\x1b[38;5;118mi\x1b[0m\x1b[38;5;118mt\x1b[0m\x1b[38;5;154me\x1b[0m\x1b[38;5;154m \x1b[0m\x1b[38;5;184ma\x1b[0m\x1b[38;5;184mt\x1b[0m\x1b[38;5;178mr\x1b[0m\x1b[38;5;154mo\x1b[0m\x1b[38;5;154mc\x1b[0m\x1b[38;5;148mi\x1b[0m\x1b[38;5;184mo\x1b[0m\x1b[38;5;184mu\x1b[0m\x1b[38;5;214ms\x1b[0m\x1b[38;5;214m
\x1b[0m\x1b[38;5;208mI\x1b[0m\x1b[38;5;208mf\x1b[0m\x1b[38;5;203m \x1b[0m\x1b[38;5;203my\x1b[0m\x1b[38;5;198mo\x1b[0m\x1b[38;5;198mu\x1b[0m\x1b[38;5;199m \x1b[0m\x1b[38;5;199ms\x1b[0m\x1b[38;5;164ma\x1b[0m\x1b[38;5;164my\x1b[0m\x1b[38;5;129m \x1b[0m\x1b[38;5;129mi\x1b[0m\x1b[38;5;93mt\x1b[0m\x1b[38;5;93m \x1b[0m\x1b[38;5;63ml\x1b[0m\x1b[38;5;63mo\x1b[0m\x1b[38;5;63mu\x1b[0m\x1b[38;5;33md\x1b[0m\x1b[38;5;33m \x1b[0m\x1b[38;5;39me\x1b[0m\x1b[38;5;39mn\x1b[0m\x1b[38;5;44mo\x1b[0m\x1b[38;5;44mu\x1b[0m\x1b[38;5;49mg\x1b[0m\x1b[38;5;49mh\x1b[0m\x1b[38;5;48m
\x1b[0m\x1b[38;5;48mY\x1b[0m\x1b[38;5;83mo\x1b[0m\x1b[38;5;83mu\x1b[0m\x1b[38;5;118m'\x1b[0m\x1b[38;5;118ml\x1b[0m\x1b[38;5;154ml\x1b[0m\x1b[38;5;154m \x1b[0m\x1b[38;5;184ma\x1b[0m\x1b[38;5;184ml\x1b[0m\x1b[38;5;178mw\x1b[0m\x1b[38;5;154ma\x1b[0m\x1b[38;5;154my\x1b[0m\x1b[38;5;148ms\x1b[0m\x1b[38;5;184m \x1b[0m\x1b[38;5;184ms\x1b[0m\x1b[38;5;214mo\x1b[0m\x1b[38;5;214mu\x1b[0m\x1b[38;5;208mn\x1b[0m\x1b[38;5;208md\x1b[0m\x1b[38;5;203m \x1b[0m\x1b[38;5;203mp\x1b[0m\x1b[38;5;198mr\x1b[0m\x1b[38;5;198me\x1b[0m\x1b[38;5;199mc\x1b[0m\x1b[38;5;199mo\x1b[0m\x1b[38;5;164mc\x1b[0m\x1b[38;5;164mi\x1b[0m\x1b[38;5;129mo\x1b[0m\x1b[38;5;129mu\x1b[0m\x1b[38;5;93ms\x1b[0m\x1b[38;5;93m
\x1b[0m\x1b[38;5;63mS\x1b[0m\x1b[38;5;63mu\x1b[0m\x1b[38;5;63mp\x1b[0m\x1b[38;5;33me\x1b[0m\x1b[38;5;33mr\x1b[0m\x1b[38;5;39mc\x1b[0m\x1b[38;5;39ma\x1b[0m\x1b[38;5;44ml\x1b[0m\x1b[38;5;44mi\x1b[0m\x1b[38;5;49mf\x1b[0m\x1b[38;5;49mr\x1b[0m\x1b[38;5;48ma\x1b[0m\x1b[38;5;48mg\x1b[0m\x1b[38;5;83mi\x1b[0m\x1b[38;5;83ml\x1b[0m\x1b[38;5;118mi\x1b[0m\x1b[38;5;118ms\x1b[0m\x1b[38;5;154mt\x1b[0m\x1b[38;5;154mi\x1b[0m\x1b[38;5;184mc\x1b[0m\x1b[38;5;184me\x1b[0m\x1b[38;5;178mx\x1b[0m\x1b[38;5;154mp\x1b[0m\x1b[38;5;154mi\x1b[0m\x1b[38;5;148ma\x1b[0m\x1b[38;5;184ml\x1b[0m\x1b[38;5;184mi\x1b[0m\x1b[38;5;214md\x1b[0m\x1b[38;5;214mo\x1b[0m\x1b[38;5;208mc\x1b[0m\x1b[38;5;208mi\x1b[0m\x1b[38;5;203mo\x1b[0m\x1b[38;5;203mu\x1b[0m\x1b[38;5;198ms\x1b[0m\x1b[38;5;198m!\x1b[0m
EOSUPER;

        return array(
            array('', ''),
            array('hello world', "\x1b[38;5;154mh\x1b[0m\x1b[38;5;154me\x1b[0m\x1b[38;5;148ml\x1b[0m\x1b[38;5;184ml\x1b[0m\x1b[38;5;184mo\x1b[0m\x1b[38;5;214m \x1b[0m\x1b[38;5;214mw\x1b[0m\x1b[38;5;208mo\x1b[0m\x1b[38;5;208mr\x1b[0m\x1b[38;5;203ml\x1b[0m\x1b[38;5;203md\x1b[0m"),
            array('hëllõ wörld', "\x1b[38;5;154mh\x1b[0m\x1b[38;5;154më\x1b[0m\x1b[38;5;148ml\x1b[0m\x1b[38;5;184ml\x1b[0m\x1b[38;5;184mõ\x1b[0m\x1b[38;5;214m \x1b[0m\x1b[38;5;214mw\x1b[0m\x1b[38;5;208mö\x1b[0m\x1b[38;5;208mr\x1b[0m\x1b[38;5;203ml\x1b[0m\x1b[38;5;203md\x1b[0m"),
            array($super, $super_pretty)
        );
    }
}