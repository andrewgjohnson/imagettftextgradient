<?php

/**
 * Imagettftextgradient Example (Yellow to Green)
 *
 * Copyright (c) 2017-2022 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 * Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
 * AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imagettftextgradient
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2017-2022 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagettftextgradient
 */

// include the imagettftextgradient source if you're not using Composer
if (file_exists('../source/imagettftextgradient.php')) {
    include_once '../source/imagettftextgradient.php';
} else {
    die('imagettftextgradient.php not found');
}

// set the parameters for our image
$width            = 600;
$height           = 300;
$size             = 20;
$font             = __DIR__ . '/arial.ttf';
$string           = 'This example fades from yellow to green';

// calculate the text size in advance
$text_dimensions  = imagettfbbox($size, 0, $font, $string);

// calculate the text's edges
$text_left        = min($text_dimensions[0], $text_dimensions[6]);
$text_right       = max($text_dimensions[2], $text_dimensions[4]);
$text_top         = min($text_dimensions[1], $text_dimensions[3]);
$text_bottom      = max($text_dimensions[5], $text_dimensions[7]);

// calculate the text's position
$x_offset         = ($width / 2)  - (($text_right - $text_left) / 2);
$y_offset         = ($height / 2) - (($text_bottom - $text_top) / 2);

// create our image
$im               = imagecreatetruecolor($width, $height);

// set our image's colors
$background_color = imagecolorallocate($im, 0x11, 0x11, 0x11);
$yellow           = imagecolorallocate($im, 0xFF, 0xFF, 0x00);
$green            = imagecolorallocate($im, 0x00, 0xFF, 0x00);

// fill our image with the background color
imagefill($im, 0, 0, $background_color);

// place the text onto our image
imagettftextgradient(
    $im,
    $size,
    0,
    $x_offset,
    $y_offset,
    $yellow,
    $font,
    $string,
    $green
);

// display our image and destroy the GD resource
header('Content-Type:image/png');
imagepng($im);
imagedestroy($im);
