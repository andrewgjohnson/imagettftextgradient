<?php

/**
 * Imagettftextgradient v2.0.0
 *
 * Copyright (c) 2017-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 8
 *
 * As of v2.0.0 imagettftextgradient is part of AgjGd (https://agjgd.org). The implementation now lives in the
 * \AndrewGJohnson\AgjGd class provided by the andrewgjohnson/agjgd package, and the global imagettftextgradient()
 * function below is a thin reverse-compatibility wrapper that forwards to it.
 *
 * Please use \AndrewGJohnson\AgjGd::imagettftextgradient() rather than imagettftextgradient().
 *
 * This file deliberately does not declare strict_types so that loosely-typed calls written against the standalone
 * function keep coercing their arguments the way they always did.
 *
 * @category  Andrewgjohnson
 * @package   Imagettftextgradient
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2017-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagettftextgradient
 */

use AndrewGJohnson\AgjGd;

if (!function_exists('imagettftextgradient')) {
    /**
     * This function exists to support reverse compatibility.
     *
     * A ninth parameter ($options) was added to imagettftext() in PHP 8, so this function accepted either an $options
     * array or a gradient color in that position and shifted the remaining parameters accordingly. That shifting is
     * preserved here and resolved before the class is called.
     *
     * @deprecated 2.0.0 Use \AndrewGJohnson\AgjGd::imagettftextgradient() instead.
     *
     * @param \GdImage                       $image                             A GdImage object.
     * @param float                          $size                              The font size in points.
     * @param float                          $angle                             The angle in degrees.
     * @param int                            $x                                 The x-ordinate of the basepoint of the
     * first character.
     * @param int                            $y                                 The y-ordinate of the font’s baseline.
     * @param int                            $color                             The start color.
     * @param string                         $fontFilename                      The path to the TrueType font you wish
     * to use.
     * @param string                         $text                              The text string in UTF-8 encoding.
     * @param array{linespacing?: float}|int $optionsOrGradientColor            An $options array (PHP 8 style) or a
     * gradient color (PHP 5/7 style).
     * @param int|bool|null                  $gradientColorOrHorizontalGradient A gradient color (PHP 8 style) or a
     * horizontal gradient flag (PHP 5/7 style).
     * @param ?bool                          $horizontalGradient                A horizontal gradient flag (PHP 8 style
     * only).
     *
     * @return array<int, int>|false Returns the bounding box of the text or FALSE on error.
     */
    function imagettftextgradient(
        $image,
        $size,
        $angle,
        $x,
        $y,
        $color,
        $fontFilename,
        $text,
        $optionsOrGradientColor = array(),
        $gradientColorOrHorizontalGradient = null,
        $horizontalGradient = null
    ) {
        // An array in the ninth position means the caller is using the PHP 8 style with an $options array, otherwise
        // the caller is using the PHP 5/7 style and every parameter after the text is shifted along by one.
        if (is_array($optionsOrGradientColor)) {
            $options       = $optionsOrGradientColor;
            $gradientColor = $gradientColorOrHorizontalGradient;
        } else {
            $options            = array();
            $gradientColor      = $optionsOrGradientColor;
            $horizontalGradient = $gradientColorOrHorizontalGradient;
        }

        return AgjGd::imagettftextgradient(
            $image,
            $size,
            $angle,
            $x,
            $y,
            $color,
            $fontFilename,
            $text,
            $options,
            // The standalone function coerced an absent or non-integer gradient color to color index 0 and still drew
            // a gradient, so that is what gets passed along rather than the null the class treats as "no gradient".
            is_int($gradientColor) ? $gradientColor : 0,
            is_bool($horizontalGradient) ? $horizontalGradient : false
        );
    }
}
