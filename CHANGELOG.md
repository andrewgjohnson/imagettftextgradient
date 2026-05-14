# Changelog

All notable changes to the [imagettftextgradient project](https://github.com/andrewgjohnson/imagettftextgradient) will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/) and this project adheres to [Semantic Versioning](https://semver.org/).

## [v1.1.3](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.1.3) (May 13, 2026)
 * Changed the font in the examples from Arial to [Noto Sans](https://fonts.google.com/noto/specimen/Noto+Sans) which uses the [SIL OFL 1.1](https://openfontlicense.org/open-font-license-official-text/)
 * Fixed a bug where using transparent source colors (allocated via `imagecolorallocatealpha()`) would incorrectly render as fully opaque pixels
 * Updated documentation website to replace deprecated `hljs.initHighlighting()` call with `hljs.highlightAll()` and removed obsolete Google Analytics script
 * Fixed typos, grammatical errors, broken and incorrect links, and updated copyright years across documentation files

## [v1.1.2](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.1.2) (May 9, 2026)
 * Added [.gitattributes](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.gitattributes) file to help manage end-of-line characters
 * Added a `version_compare()` check before all `imagedestroy()` calls; the imagedestroy() function became an optional step that did nothing as of PHP 8.0 but as of PHP 8.5 when invoked it produces a deprecated notice

## [v1.1.1](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.1.1) (May 3, 2026)
 * Added [ci.yml workflow](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.github/workflows/ci.yml) to add PHP_CodeSniffer and PHPUnit checks into the pull request process on GitHub
 * Fixed math errors in the examples and regenerated the example PNG's

## [v1.1.0](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.1.0) (April 30, 2026)
 * Added [Contribute](https://imagettftextgradient.agjgd.org/contribute/) page and updated [contributing guidelines](https://github.com/andrewgjohnson/imagettftextgradient/blob/master/.github/CONTRIBUTING.md)
 * Added PHP_CodeSniffer support to enforce PSR-12 and PHP 5.0 compatibility
 * Added PHPUnit support for unit tests
 * Added `lint`, `lint:fix`, `phpunit` and `test` composer scripts
 * Added ability to choose between a horizontal and vertical gradient with the new parameter `$horizontalGradient`
 * Fixed support for older PHP versions; this project now truly supports PHP 5.0
 * Fixed a number of broken links

## [v1.0.4](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.0.4) (November 22, 2022)
 * Signed up for [Patreon](https://patreon.com/agjopensource) and added links to README.md
 * Added `.github` folder to unclutter the root directory
 * Added `CODEOWNERS` file
 * Added `FUNDING.yml` file
 * Added `SECURITY.md` file
 * Added `SUPPORT.md` file
 * Updated shields.io badge aesthetics on README.md
 * Removed the MIT logo from the shields.io badge for imagettftextgradient's license
 * Added Patrons shields.io badge to README.md
 * Enabled GitHub [discussions area](https://github.com/andrewgjohnson/imagettftextgradient/discussions) and now recommending it over StackOverflow
 * Removed `ISSUE_TEMPLATE.md` file for our single issue template and replaced with `ISSUE_TEMPLATE` folder to separate bug reports & feature requests within GitHub [issues](https://github.com/andrewgjohnson/imagettftextgradient/issues)
 * Updated [avatar image](https://imagettftextgradient.agjgd.org/documentation/imagettftextgradient.agjgd.org/images/avatar.png)
 * Moved all Twitter activity for all [agjgd projects](https://agjgd.org/projects/) (including imagettftextgradient) to the [@agjgdphp Twitter account](https://twitter.com/agjgdphp) as there were issues with the individual accounts being frozen
 * Changed documentation website to [imagettftextgradient.agjgd.org](https://imagettftextgradient.agjgd.org)
 * Updated copyright years to 2022

## [v1.0.3](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.0.3) (June 4, 2018)
 * Text changes to README.md
 * Switched YUI reset CSS from Yahoo hosted to inline
 * Added examples/README.md to help browsers on the GitHub repository
 * Switched to __DIR__ constant in examples to get current directory
 * Fixed labeling issue with $text_left, $text_right, $text_top & $text_bottom in examples
 * Updated parameter descriptions to be more in line with php.net's descriptions of imagettftext()
 * Refactored source to pass phpcs line length limit of 85 characters

## [v1.0.2](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.0.2) (April 10, 2018)
 * Fixed typos & formatting errors

## [v1.0.1](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.0.1) (April 9, 2018)
 * Fixed incorrect default value of the $return_array array
 * Created [imagettftextgradient.agjgd.org](https://imagettftextgradient.agjgd.org)
 * Refactored PHP code in examples for readability
 * Added "Yellow to Green" example
 * Lots of new files for various functions

## [v1.0.0](https://github.com/andrewgjohnson/imagettftextgradient/releases/tag/v1.0.0) (March 17, 2017)
 * Initial release of imagettftextgradient
