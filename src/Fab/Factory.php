<?php

/*
 * This file is part of Fab.
 *
 * (c) Jeff Welch <whatthejeff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fab;

/**
 * Fabulous factory.
 *
 * This class can be used to get a Fab class that display colors that are
 * appropriate for a given terminal.
 *
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class Factory
{
    /**
     * Gets a Fab appropriate for a provided terminal emulator.
     *
     * @param string $term The terminal emulator to make fabulous (xterm, linux, etc.)
     *
     * @return Fab\Fab the appropriate Fab for the provided terminal emulate.
     */
    public static function getFab($term)
    {
        return preg_match('/^xterm|-256color$/', $term) ? new SuperFab() : new Fab();
    }
}