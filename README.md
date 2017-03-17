# imagettftextgradient

## Description

imagettftextgradient is a drop in replacement for imagettftext with an added parameter to add gradient coloring effects to your PHP GD images.

## Usage

To get started simply add a reference in your code to imagettftextgradient.php and change all calls from imagettftext to imagettftextgradient.  To add blur simply pass an integer greater than zero as the $blur_intensity parameter.

## Example

    imagettftext($image, 20, 0, 0, 0, $color, $font, $string);                          // standard method to add text to a GD image
    imagettftextgradient($image, 20, 0, 0, 0, $color, $font, $string);                  // this will work the same as the line above
    imagettftextgradient($image, 20, 0, 0, 0, $color, $font, $string, $gradient_color); // method to add text with gradient coloring effects to a GD image

There are a number of other examples included in the repository.

## Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager.  You can find the imagettftextgradient package online at [https://packagist.org/packages/andrewgjohnson/imagettftextgradient](https://packagist.org/packages/andrewgjohnson/imagettftextgradient).

### Install using Composer

Either run this command

    composer require andrewgjohnson/imagettftextgradient

or add this to the `require` section of your composer.json

    "andrewgjohnson/imagettftextgradient":"1.*"

## Help Requests

Please post any questions or problems using [the imagettftextgradient tag on stackoverflow.com](https://stackoverflow.com/tags/imagettftextgradient) if you need help.

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

## Changelog

###### v1.0.0 (March 17, 2017)
 * Intial release of imagettftextgradient
