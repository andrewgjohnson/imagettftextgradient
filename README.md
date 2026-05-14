# imagettftextgradient

[![MIT License](https://img.shields.io/badge/license-MIT-0366d6.png?colorB=0366d6&style=flat-square)](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagettftextgradient.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagettftextgradient/releases)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagettftextgradient.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagettftextgradient/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagettftextgradient.png?colorB=0366d6&style=flat-square&logoColor=white&logo=packagist)](https://packagist.org/packages/andrewgjohnson/imagettftextgradient/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagettftextgradient.png?colorB=0366d6&style=flat-square&logoColor=white&logo=github)](https://github.com/andrewgjohnson/imagettftextgradient/issues)
[![Patreon](https://imagettftextgradient.agjgd.org/documentation/imagettftextgradient.agjgd.org/images/patreon-badge.png)](https://patreon.com/agjopensource)

<p align="center"><a href="https://imagettftextgradient.agjgd.org/" title=""><img src="https://imagettftextgradient.agjgd.org/documentation/imagettftextgradient.agjgd.org/images/avatar.png" alt="" title="" width="400" id="avatar" /></a></p>

## Description

**imagettftextgradient** is a drop-in replacement for imagettftext with added parameters to add gradient coloring effects to your PHP GD images.

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjopensource)

**imagettftextgradient** is an [agjgd](https://agjgd.org) project.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager. You can find the imagettftextgradient package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagettftextgradient).

#### Install using Composer

Either run this command:

    composer require andrewgjohnson/imagettftextgradient

or add this to the `require` section of your composer.json file:

    "andrewgjohnson/imagettftextgradient": "1.*"

### Without Composer

To use without Composer add an [include](https://php.net/manual/function.include.php) to the [`imagettftextgradient.php` source file](https://raw.githubusercontent.com/andrewgjohnson/imagettftextgradient/master/source/imagettftextgradient.php).

    include_once 'source/imagettftextgradient.php';

## Examples

    // In PHP 8.0 a ninth parameter ($options) was added to imagettftext()
    imagettftext($im, 20, 0, 0, 0, $color, $font, $string, array()); // Add text to a GD image
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array()); // This works the same as the line above
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array(), $secondColor); // This will add the same text only with a vertical gradient instead of a solid color
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, array(), $secondColor, true); // This will add the same text only with a horizontal gradient instead of a solid color

    // We also support previous versions of PHP back to 5.0 and the previous version of imagettftext()
    imagettftext($im, 20, 0, 0, 0, $color, $font, $string); // Add text to a GD image
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string); // This works the same as the line above
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, $secondColor); // This will add the same text only with a vertical gradient instead of a solid color
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, $secondColor, true); // This will add the same text only with a horizontal gradient instead of a solid color

There are [other examples](https://github.com/andrewgjohnson/imagettftextgradient/tree/master/examples) included in the GitHub repository and on [imagettftextgradient.agjgd.org](https://imagettftextgradient.agjgd.org/examples/).

## Help Requests

Please post any questions in the [discussions area](https://github.com/andrewgjohnson/imagettftextgradient/discussions) on GitHub if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagettftextgradient/issues/new) on GitHub. When submitting an issue please use our [issue templates](https://github.com/andrewgjohnson/imagettftextgradient/tree/master/.github/ISSUE_TEMPLATE).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.github/CONTRIBUTING.md) if you want to contribute.

You can contribute financially by becoming a [patron](https://patreon.com/agjopensource) at [patreon.com/agjopensource](https://patreon.com/agjopensource) to support imagettftextgradient and [other agjgd.org projects](https://agjgd.org/projects/).

[![Patreon - Become a Patron](https://raster.shields.io/badge/Patreon%20-become%20a%20Patron-FD334A.png?style=for-the-badge&logo=patreon&logoColor=FD334A)](https://patreon.com/agjopensource)

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [security policies and procedures](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.github/SECURITY.md) come via the [atomist/samples](https://github.com/atomist/samples/blob/master/SECURITY.md) project. Our [issue templates](https://github.com/andrewgjohnson/imagettftextgradient/tree/master/.github/ISSUE_TEMPLATE) come via the [tensorflow/tensorflow](https://github.com/tensorflow/tensorflow/blob/master/SECURITY.md) project. Our [pull request template](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.github/PULL_REQUEST_TEMPLATE.md) comes via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project. The [mountains photo](https://unsplash.com/photos/qJvpykJ5SKs) comes via [Gabriel Garcia Marengo](https://unsplash.com/@gabrielgm).

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/CHANGELOG.md).
