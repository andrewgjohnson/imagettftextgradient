<?php

/**
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
 */

namespace AndrewGJohnson\AgjGd\Tests;

use PHPUnit\Framework\TestCase;

class ImagettftextgradientTest extends TestCase
{
    private const FONT_ANGLE   = 0;
    private const FONT_PATH    = __DIR__ . '/NotoSans-Regular.ttf';
    private const FONT_SIZE    = 40;
    private const FONT_X       = 10;
    private const FONT_Y       = 120;
    private const IMAGE_WIDTH  = 400;
    private const IMAGE_HEIGHT = 200;

    public function testFunctionExists(): void
    {
        $this->assertTrue(function_exists('imagettftextgradient'));
    }

    public function testReturnsArrayOnSuccess(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2
        );

        $this->assertIsArray($result);
    }

    public function testReturnedArrayHasEightElements(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    public function testBoundingBoxCoordinatesAreWithinImageBounds(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2
        );

        $this->assertIsArray($result);

        // Even indices are x coordinates, odd indices are y coordinates
        for ($i = 0; $i < 8; $i += 2) {
            $this->assertGreaterThanOrEqual(0, $result[$i]);
            $this->assertLessThan(self::IMAGE_WIDTH, $result[$i]);
        }

        for ($i = 1; $i < 8; $i += 2) {
            $this->assertGreaterThanOrEqual(0, $result[$i]);
            $this->assertLessThan(self::IMAGE_HEIGHT, $result[$i]);
        }
    }

    public function testReturnsFalseForInvalidFont(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        // @ suppresses the GD warning emitted by imagettftext when the font is missing
        $result = @imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            '/nonexistent/font.ttf',
            'Hello',
            [],
            $color2
        );

        $this->assertFalse($result);
    }

    public function testPhp5SevenApiStyle(): void
    {
        // PHP 5/7 style: gradient color passed as the 9th parameter (no options array)
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            $color2
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    public function testPhp8ApiStyle(): void
    {
        // PHP 8+ style: options array as 9th parameter, gradient color as 10th
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    public function testPhp5SevenAndPhp8ApiStylesReturnSameBoundingBox(): void
    {
        $image1 = $this->createImage();
        $red1   = imagecolorallocate($image1, 0xFF, 0x00, 0x00);
        $blue1  = imagecolorallocate($image1, 0x00, 0x00, 0xFF);

        $image2 = $this->createImage();
        $red2   = imagecolorallocate($image2, 0xFF, 0x00, 0x00);
        $blue2  = imagecolorallocate($image2, 0x00, 0x00, 0xFF);

        $result1 = imagettftextgradient(
            $image1,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $red1,
            self::FONT_PATH,
            'Hello',
            $blue1
        );
        $result2 = imagettftextgradient(
            $image2,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $red2,
            self::FONT_PATH,
            'Hello',
            [],
            $blue2
        );

        $this->assertIsArray($result1);
        $this->assertIsArray($result2);
        $this->assertSame($result1, $result2);
    }

    public function testHorizontalGradientReturnsArray(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $color2 = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2,
            true
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    public function testVerticalGradientColorInterpolation(): void
    {
        $image = $this->createImage();
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $red,
            self::FONT_PATH,
            'HELLO',
            [],
            $blue
        );

        $this->assertIsArray($result);

        $textTop    = min($result[5], $result[7]);
        $textBottom = max($result[1], $result[3]);
        $textLeft   = min($result[0], $result[6]);
        $textRight  = max($result[2], $result[4]);
        $band       = max(1, (int)(($textBottom - $textTop) * 0.15));

        [$topRedSum, $topBlueSum, $topCount] = $this->sumRGBInRegion(
            $image,
            $textLeft,
            $textTop,
            $textRight,
            $textTop + $band
        );

        [$botRedSum, $botBlueSum, $botCount] = $this->sumRGBInRegion(
            $image,
            $textLeft,
            $textBottom - $band,
            $textRight,
            $textBottom
        );

        $this->assertGreaterThan(0, $topCount, 'Expected text pixels near the top of the bounding box');
        $this->assertGreaterThan(0, $botCount, 'Expected text pixels near the bottom of the bounding box');
        $this->assertGreaterThan(
            $topBlueSum / $topCount,
            $topRedSum / $topCount,
            'Top pixels should have more red than blue'
        );
        $this->assertGreaterThan(
            $botRedSum / $botCount,
            $botBlueSum / $botCount,
            'Bottom pixels should have more blue than red'
        );
    }

    public function testHorizontalGradientColorInterpolation(): void
    {
        $image = $this->createImage();
        $red   = imagecolorallocate($image, 0xFF, 0x00, 0x00);
        $blue  = imagecolorallocate($image, 0x00, 0x00, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $red,
            self::FONT_PATH,
            'HELLO',
            [],
            $blue,
            true
        );

        $this->assertIsArray($result);

        $textTop    = min($result[5], $result[7]);
        $textBottom = max($result[1], $result[3]);
        $textLeft   = min($result[0], $result[6]);
        $textRight  = max($result[2], $result[4]);
        $band       = max(1, (int)(($textRight - $textLeft) * 0.15));

        [$leftRedSum, $leftBlueSum, $leftCount] = $this->sumRGBInRegion(
            $image,
            $textLeft,
            $textTop,
            $textLeft + $band,
            $textBottom
        );

        [$rightRedSum, $rightBlueSum, $rightCount] = $this->sumRGBInRegion(
            $image,
            $textRight - $band,
            $textTop,
            $textRight,
            $textBottom
        );

        $this->assertGreaterThan(0, $leftCount, 'Expected text pixels near the left edge of the bounding box');
        $this->assertGreaterThan(0, $rightCount, 'Expected text pixels near the right edge of the bounding box');
        $this->assertGreaterThan(
            $leftBlueSum / $leftCount,
            $leftRedSum / $leftCount,
            'Left pixels should have more red than blue'
        );
        $this->assertGreaterThan(
            $rightRedSum / $rightCount,
            $rightBlueSum / $rightCount,
            'Right pixels should have more blue than red'
        );
    }

    public function testAlphaColorsAreInterpolated(): void
    {
        $image  = $this->createImage();
        $color  = imagecolorallocatealpha($image, 0xFF, 0x00, 0x00, 0);
        $color2 = imagecolorallocatealpha($image, 0x00, 0x00, 0xFF, 64);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello',
            [],
            $color2
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    public function testCalledWithoutGradientColorRendersText(): void
    {
        // Omitting the gradient color defaults it to black (0x000000) internally
        $image = $this->createImage();
        $color = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

        $result = imagettftextgradient(
            $image,
            self::FONT_SIZE,
            self::FONT_ANGLE,
            self::FONT_X,
            self::FONT_Y,
            $color,
            self::FONT_PATH,
            'Hello'
        );

        $this->assertIsArray($result);
        $this->assertCount(8, $result);
    }

    /**
     * Scans a rectangular region and sums the red and blue channel values of non-black pixels.
     *
     * @return array{0: int, 1: int, 2: int} [redSum, blueSum, pixelCount]
     */
    private function sumRGBInRegion(\GdImage $image, int $x1, int $y1, int $x2, int $y2): array
    {
        $redSum = $blueSum = $count = 0;
        for ($x = $x1; $x <= $x2; $x++) {
            for ($y = $y1; $y <= $y2; $y++) {
                $rgb = imagecolorat($image, $x, $y);
                $r   = ($rgb >> 16) & 0xFF;
                $b   = $rgb & 0xFF;
                if ($r + $b > 0) {
                    $redSum  += $r;
                    $blueSum += $b;
                    $count++;
                }
            }
        }
        return [$redSum, $blueSum, $count];
    }

    private function createImage(): \GdImage
    {
        return imagecreatetruecolor(self::IMAGE_WIDTH, self::IMAGE_HEIGHT);
    }
}
