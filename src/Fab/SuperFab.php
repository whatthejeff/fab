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
 * Make your output super fabulous!
 *
 * This class will generate output that is appropriate terminals capable
 * of displaying 256 colors.
 *
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class SuperFab extends Fab
{
    /**
     * Initializes a new fab with colors appropriate for terminals capable of
     * displaying 256 colors.
     */
    public function __construct()
    {
        /**
         * https://github.com/seattlerb/minitest/blob/4373fc7ebf648e156902958466cc4678945eac29/lib/minitest/pride.rb#L78-L96
         */
        foreach (range(0, 6 * 7) as $color) {
            $color *= 1.0 / 6;

            $r = (int)(3 * sin($color                 ) + 3);
            $g = (int)(3 * sin($color + 2 * (M_PI / 3)) + 3);
            $b = (int)(3 * sin($color + 4 * (M_PI / 3)) + 3);

            $colors[] = 36 * $r + 6 * $g + $b + 16;
        }

        return parent::__construct($colors);
    }

    /**
     * {@inheritdoc}
     */
    public function paintChar($char)
    {
        return self::ESC . '38;5;' . $this->nextColor() . 'm' . $char . self::NND;
    }
}