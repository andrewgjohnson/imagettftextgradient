<?php

/**
 * Imagettftextgradient v1.1.2
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
 * PHP version 5
 *
 * @category  Andrewgjohnson
 * @package   Imagettftextgradient
 * @author    Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @copyright 2017-2026 Andrew G. Johnson <andrew@andrewgjohnson.com>
 * @license   https://opensource.org/licenses/mit/ The MIT License
 * @link      https://github.com/andrewgjohnson/imagettftextgradient
 */

if (!function_exists('imagettftextgradient')) {
    /**
     * Imagettftextgradient is a drop-in replacement for imagettftext with added parameters to add gradient coloring
     * effects to your PHP GD images.
     *
     * Examples:
     * ```
     * <?php
     * // In PHP 8.0 a ninth parameter ($options) was added to imagettftext()
     * imagettftext($im, 20, 0, 0, 0, $color, $font, $string, array()); // Add text to a GD image
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array()); // This works the same as the line above
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array(), $secondColor); // This will add the same
     * // text only with a vertical gradient instead of a solid color
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array(), $secondColor, true); // This will add the
     * // same text only with a horizontal gradient instead of a solid color
     *
     * // We also support previous versions of PHP back to 5.0 and the previous version of imagettftext()
     * imagettftext($im, 20, 0, 0, 0, $color, $font, $string); // Add text to a GD image
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string); // This works the same as the line above
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, $secondColor); // This will add the same text only
     * // with a vertical gradient instead of a solid color
     * imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, $secondColor, true); // This will add the same
     * // text only with a horizontal gradient instead of a solid color
     * ?>
     * ```
     *
     * @param \GdImage|resource $image                             A GdImage object (PHP 8 and newer) or an image
     * resource (older versions of PHP), returned by one of the image creation functions, such as
     * imagecreatetruecolor().
     * @param float             $size                              The font size in points.
     * @param float             $angle                             The angle in degrees, with 0 degrees being
     * left-to-right reading text. Higher values represent a counter-clockwise rotation. For example, a value of 90
     * would result in bottom-to-top reading text.
     * @param int               $x                                 The coordinates given by x and y will define the
     * basepoint of the first character (roughly the lower-left corner of the character). This is different from the
     * imagestring(), where x and y define the upper-left corner of the first character. For example, "top left" is 0,
     * 0.
     * @param int               $y                                 The y-ordinate. This sets the position of the fonts
     * baseline, not the very bottom of the character.
     * @param int               $color                             The color index. Using the negative of a color index
     * has the effect of turning off antialiasing. See imagecolorallocate().
     * @param string            $fontFilename                      The path to the TrueType font you wish to use.
     *
     * Depending on which version of the GD library PHP is using, when fontfile does not begin with a leading / then
     * .ttf will be appended to the filename and the library will attempt to search for that filename along a
     * library-defined font path.
     *
     * When using versions of the GD library lower than 2.0.18, a space character, rather than a semicolon, was used as
     * the 'path separator' for different font files. Unintentional use of this feature will result in the warning
     * message: Warning: Could not find/open font. For these affected versions, the only solution is moving the font to
     * a path which does not contain spaces.
     *
     * In many cases where a font resides in the same directory as the script using it the following trick will
     * alleviate any include problems.
     *
     * ```
     * <?php
     * // Set the environment variable for GD
     * putenv('GDFONTPATH=' . realpath('.'));
     *
     * // Name the font to be used (note the lack of the .ttf extension)
     * $font = 'SomeFont';
     * ?>
     * ```
     * @param string            $text                              The text string in UTF-8 encoding.
     *
     * May include decimal numeric character references (of the form: &#8364;) to access characters in a font beyond
     * position 127. The hexadecimal format (like &#xA9;) is supported. Strings in UTF-8 encoding can be passed
     * directly.
     *
     * Named entities, such as &copy;, are not supported. Consider using html_entity_decode() to decode these named
     * entities into UTF-8 strings.
     *
     * If a character is used in the string which is not supported by the font, a hollow rectangle will replace the
     * character.
     * @param array|int         $optionsOrGradientColor            An array with linespacing key holding a float value.
     *
     * Note: A ninth parameter ($options) was added to imagettftext() in PHP 8. This package supports both the old and
     * new variants so these parameters are set up to handle both cases. The parameter descriptions assume you will be
     * using the PHP 8+ version with $options as the ninth parameter.
     * @param int|bool|null     $gradientColorOrHorizontalGradient The color index. Using the negative of a color index
     * has the effect of turning off antialiasing. See imagecolorallocate().
     *
     * Note: A ninth parameter ($options) was added to imagettftext() in PHP 8. This package supports both the old and
     * new variants so these parameters are set up to handle both cases. The parameter descriptions assume you will be
     * using the PHP 8+ version with $options as the ninth parameter.
     * @param ?bool             $horizontalGradient                Whether or not to use a horizontal gradient versus a
     * vertical gradient.
     *
     * Note: A ninth parameter ($options) was added to imagettftext() in PHP 8. This package supports both the old and
     * new variants so these parameters are set up to handle both cases. The parameter descriptions assume you will be
     * using the PHP 8+ version with $options as the ninth parameter.
     *
     * @return array|false Returns an array with 8 elements representing four points making the bounding box of the
     * text. The order of the points is lower left, lower right, upper right, upper left. The points are relative to the
     * text regardless of the angle, so "upper left" means in the top left-hand corner when you see the text
     * horizontally. Returns FALSE on error.
     */
    function imagettftextgradient(
        &$image,
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
        // If the $optionsOrGradientColor parameter is an array we assume the caller is using the PHP 8+ version of
        // imagettftext() with the $options parameter otherwise we assume the PHP 5/7 version is being used without the
        // $options parameter
        if (is_array($optionsOrGradientColor)) {
            $options       = $optionsOrGradientColor;
            $gradientColor = $gradientColorOrHorizontalGradient;
        } else {
            $options            = array();
            $gradientColor      = $optionsOrGradientColor;
            $horizontalGradient = $gradientColorOrHorizontalGradient;
        }

        // If either grdient parameter is set to null, fall back to a default value
        $gradientColor      = $gradientColor === null || !is_int($gradientColor) ? 0 : $gradientColor;
        $horizontalGradient = $horizontalGradient === null || !is_bool($horizontalGradient)
            ? false
            : $horizontalGradient;

        // $gradientColor needs to be an integer, presumably generated by imagecolorallocate()
        if (is_int($gradientColor)) {
            // $returnArray will be returned once all calculations are complete
            $returnArrayDefault = array(
                imagesx($image), // Lower left (x coordinate)
                -1,              // Lower left (y coordinate)
                -1,              // Lower right (x coordinate)
                -1,              // Lower right (y coordinate)
                -1,              // Upper right (x coordinate)
                imagesy($image), // Upper right (y coordinate)
                imagesx($image), // Upper left (x coordinate)
                imagesy($image)  // Upper left (y coordinate)
            );

            $returnArray = $returnArrayDefault;

            // $temporaryImage is a GD image that is the same size as our original GD image
            $temporaryImage = imagecreatetruecolor(
                imagesx($image),
                imagesy($image)
            );

            // Fill $temporaryImage with a black background
            imagefill(
                $temporaryImage,
                0,
                0,
                imagecolorallocate($temporaryImage, 0x00, 0x00, 0x00)
            );

            // Add white text to $temporaryImage with the function call’s parameters
            $imagettftext = version_compare(PHP_VERSION, '8.0.0', '>=') ? imagettftext(
                $temporaryImage,
                $size,
                $angle,
                $x,
                $y,
                imagecolorallocate($temporaryImage, 0xFF, 0xFF, 0xFF),
                $fontFilename,
                $text,
                $options
            ) : imagettftext(
                $temporaryImage,
                $size,
                $angle,
                $x,
                $y,
                imagecolorallocate($temporaryImage, 0xFF, 0xFF, 0xFF),
                $fontFilename,
                $text
            );

            if ($imagettftext !== false) {
                // Calculate the text’s edges
                $textLeft   = min($imagettftext[0], $imagettftext[6]);
                $textRight  = max($imagettftext[2], $imagettftext[4]);
                $textTop    = min($imagettftext[5], $imagettftext[7]);
                $textBottom = max($imagettftext[1], $imagettftext[3]);
                $textHeight = $textBottom - $textTop;
                $textWidth  = $textRight - $textLeft;

                // Loop through each pixel in $temporaryImage
                for ($temporaryX = 0; $temporaryX < imagesx($temporaryImage); $temporaryX++) {
                    for ($temporaryY = 0; $temporaryY < imagesy($temporaryImage); $temporaryY++) {
                        // $visibility is the grayscale of the current pixel
                        $visibility = (imagecolorat(
                            $temporaryImage,
                            $temporaryX,
                            $temporaryY
                        ) & 0xFF) / 255;

                        // If the current pixel would be visible, add it to $image
                        if ($visibility > 0) {
                            // We are on an affected pixel so update $returnArray accordingly
                            $returnArray = array(
                                min($returnArray[0], $temporaryX),
                                max($returnArray[1], $temporaryY),
                                max($returnArray[2], $temporaryX),
                                max($returnArray[3], $temporaryY),
                                max($returnArray[4], $temporaryX),
                                min($returnArray[5], $temporaryY),
                                min($returnArray[6], $temporaryX),
                                min($returnArray[7], $temporaryY)
                            );

                            // Determine the current pixel’s RGB color code and alpha value by first calculating its
                            // position within the text
                            if ($horizontalGradient) {
                                $gradientPosition = ($temporaryX - $textLeft) / $textWidth;
                            } else {
                                $gradientPosition = ($temporaryY - $textTop) / $textHeight;
                            }

                            $colorRed  = ($color >> 16) & 0xFF;
                            $colorRed *= 1 - $gradientPosition;
                            $gradientColorRed  = ($gradientColor >> 16) & 0xFF;
                            $gradientColorRed *= $gradientPosition;
                            $red = round($colorRed + $gradientColorRed);

                            $colorGreen  = ($color >> 8) & 0xFF;
                            $colorGreen *= 1 - $gradientPosition;
                            $gradientColorGreen  = ($gradientColor >> 8) & 0xFF;
                            $gradientColorGreen *= $gradientPosition;
                            $green = round($colorGreen + $gradientColorGreen);

                            $colorBlue  = $color & 0xFF;
                            $colorBlue *= 1 - $gradientPosition;
                            $gradientColorBlue  = $gradientColor & 0xFF;
                            $gradientColorBlue *= $gradientPosition;
                            $blue = round($colorBlue + $gradientColorBlue);

                            $colorData = imagecolorsforindex(
                                $image,
                                $color
                            );
                            $colorOpacity = $colorData['alpha'] * (1 - $gradientPosition);

                            $gradientColorData = imagecolorsforindex(
                                $image,
                                $gradientColor
                            );
                            $gradientColorOpacity = $gradientColorData['alpha'] * $gradientPosition;

                            $opacity = $colorOpacity + $gradientColorOpacity;
                            $opacity = (127 - $opacity) / 127;

                            // Set the current pixel in $image
                            imagesetpixel(
                                $image,
                                $temporaryX,
                                $temporaryY,
                                imagecolorallocatealpha(
                                    $image,
                                    $red,
                                    $green,
                                    $blue,
                                    (int)round((1 - $visibility) * 127 * $opacity)
                                )
                            );
                        }
                    }
                }
            }

            // Destroy our $temporaryImage
            version_compare(PHP_VERSION, '8.0.0', '<') && imagedestroy($temporaryImage);

            if ($returnArray === $returnArrayDefault) {
                // Return false if $returnArray hasn’t changed to indicate a failure
                return false;
            } else {
                // Return the array of affected coordinates
                return $returnArray;
            }
        } else {
            // Return a call to imagettftext() as no $gradientColor was received
            return version_compare(PHP_VERSION, '8.0.0', '>=') ? imagettftext(
                $image,
                $size,
                $angle,
                $x,
                $y,
                $color,
                $fontFilename,
                $text,
                $options
            ) : imagettftext(
                $image,
                $size,
                $angle,
                $x,
                $y,
                $color,
                $fontFilename,
                $text
            );
        }
    }
}
