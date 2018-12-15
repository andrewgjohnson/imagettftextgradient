# imagettftextgradient

[![MIT License](https://img.shields.io/github/license/andrewgjohnson/imagettftextgradient.png)](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/LICENSE)
[![Current Release](https://img.shields.io/github/release/andrewgjohnson/imagettftextgradient.png)](https://github.com/andrewgjohnson/imagettftextgradient/releases)
[![GitHub Stars](https://img.shields.io/github/stars/andrewgjohnson/imagettftextgradient.png)](https://github.com/andrewgjohnson/imagettftextgradient/stargazers)
[![Contributors](https://img.shields.io/github/contributors/andrewgjohnson/imagettftextgradient.png)](https://github.com/andrewgjohnson/imagettftextgradient/graphs/contributors)
[![Packagist Downloads](https://img.shields.io/packagist/dt/andrewgjohnson/imagettftextgradient.png)](https://packagist.org/packages/andrewgjohnson/imagettftextgradient/stats)
[![Issues](https://img.shields.io/github/issues/andrewgjohnson/imagettftextgradient.png)](https://github.com/andrewgjohnson/imagettftextgradient/issues)

<p align="center"><a href="https://imagettftextgradient.org/" title=""><img src="https://imagettftextgradient.org/documentation/imagettftextgradient.org/images/avatar.png" alt="" title="" width="400" id="avatar" /></a></p>

## Description

**imagettftextgradient** is a drop in replacement for imagettftext with an added parameter to add gradient coloring effects to your PHP GD images.

## Usage

### With Composer

This project offers support for the [Composer](https://getcomposer.org/) dependency manager.  You can find the imagettftextgradient package online on [packagist.org](https://packagist.org/packages/andrewgjohnson/imagettftextgradient).

#### Install using Composer

Either run this command:

    composer require andrewgjohnson/imagettftextgradient

or add this to the `require` section of your composer.json file:

    "andrewgjohnson/imagettftextgradient": "1.*"

### Without Composer

To use without Composer add an [include](http://php.net/manual/function.include.php) to the [`imagettftextgradient.php` source file](https://raw.githubusercontent.com/andrewgjohnson/imagettftextgradient/master/source/imagettftextgradient.php).

    include_once 'source/imagettftextgradient.php';

## Examples

    // standard method to add text to a GD image
    imagettftext($im, 20, 0, 0, 0, $color, $font, $string);

    // this will work the exact same as the line above
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string);

    // method to add text with gradient coloring effects to a GD image
    imagettftextgradient($im, 20, 0, 0, 0, $color, $font, $string, $gradient_color);

There are [other examples](https://github.com/andrewgjohnson/imagettftextgradient/tree/master/examples) included in the GitHub repository and on [imagettftextgradient.org](http://imagettftextgradient.org/examples/).

## Help Requests

Please post any questions on [stackoverflow.com](https://stackoverflow.com/search?q=imagettftextgradient) if you need help.

If you discover a bug please [enter an issue](https://github.com/andrewgjohnson/imagettftextgradient/issues/new) on GitHub.  When submitting an issue please use our [issue template](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/ISSUE_TEMPLATE.md).

## Contributing

Please read our [contributing guidelines](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/CONTRIBUTING.md) if you want to contribute.

## Acknowledgements

This project was started by [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson).

Full list of contributors:
 * [Andrew G. Johnson (@andrewgjohnson)](https://github.com/andrewgjohnson)

Our [issue template](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/ISSUE_TEMPLATE.md) & [pull request template](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/PULL_REQUEST_TEMPLATE.md) come via the [stevemao/github-issue-templates](https://github.com/stevemao/github-issue-templates) project.

## Changelog

You can find all notable changes in the [changelog](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/CHANGELOG.md).
