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
 * Make your output fabulous!
 *
 * The base Fab class will, by default, generate output that is appropriate
 * for most terminal emulators. You can enhance this output through extension
 * or composition of this class.
 *
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class Fab {

    /**
     * Ansi escape
     */
    const ESC = "\x1b[";
    /**
     * Ansi Normal
     */
    const NND = "\x1b[0m";

    /**
     * The range of colors.
     *
     * @var array
     */
    private $colors = array();
    /**
     * The number of colors in the range.
     *
     * @var integer
     */
    private $count = 0;
    /**
     * The current position in the colors range.
     *
     * @var integer
     */
    private $index = 0;

    /**
     * Initializes a new Fab with an optional custom color range.
     *
     * @param array $colors Custom color range.
     */
    public function __construct(array $colors = array())
    {
        $this->colors = empty($colors) ? range(31, 36) : $colors;
        $this->count = count($this->colors);
    }

    /**
     * Paints a string with fabulous colors.
     *
     * @param string $string A string to make fabulous
     *
     * @return string a fabulous string
     */
    public function paint($string)
    {
        if (empty($string)) {
            return '';
        }

        preg_match_all('/./us', $string, $array);
        return implode(array_map(array($this, 'paintChar'), $array[0]));
    }

    /**
     * Paints a char with fabulous colors.
     *
     * @param string $char A char to make fabulous
     *
     * @return string a fabulous char
     */
    public function paintChar($char)
    {
        return self::ESC . $this->nextColor() . 'm' . $char . self::NND;
    }

    /**
     * Gets the next color in the color range.
     *
     * @return integer the next color
     */
    protected function nextColor()
    {
        return $color = $this->colors[$this->index++ % $this->count];
    }
}