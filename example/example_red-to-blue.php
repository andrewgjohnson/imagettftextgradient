<?php

/**
 * Imagettftextgradient Example (Red to Blue)
 *
 * Copyright (c) 2017 Andrew G. Johnson <andrew@andrewgjohnson.com>
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
 * @copyright 2017 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link      http://github.com/andrewgjohnson/imagettftextgradient
 */

if (file_exists('../source/imagettftextgradient.php')) {
    include_once '../source/imagettftextgradient.php';
} else {
    die('imagettftextgradient.php not found');
}

$width = 600;
$height = 300;
$size = 20;
$font = rtrim(dirname(__FILE__), '/\\') . '/arial.ttf';
$string = 'This example fades from red to blue';

$text_dimensions = imagettfbbox($size, 0, $font, $string);
$text_left = min($text_dimensions[2], $text_dimensions[4]);
$text_right = max($text_dimensions[0], $text_dimensions[6]);
$text_top = min($text_dimensions[5], $text_dimensions[7]);
$text_bottom = max($text_dimensions[1], $text_dimensions[3]);

$x_offset = ($width / 2) - (($text_left - $text_right) / 2);
$y_offset = ($height / 2) - (($text_top - $text_bottom) / 2);

$image = imagecreatetruecolor($width, $height);

$background_color = imagecolorallocate($image, 0xEE, 0xEE, 0xEE);
$red = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$blue = imagecolorallocate($image, 0x00, 0x00, 0xFF);

imagefill($image, 0, 0, $background_color);
imagettftextgradient(
    $image,
    $size,
    0,
    $x_offset,
    $y_offset,
    $red,
    $font,
    $string,
    $blue
);

header('Content-Type:image/png');
imagepng($image);

imagedestroy($image);
