# CakePHP Tools Plugin
[![Build Status](https://api.travis-ci.org/dereuromark/cakephp-tools.svg?branch=master)](https://travis-ci.org/dereuromark/cakephp-tools)
[![Coverage Status](https://codecov.io/gh/dereuromark/cakephp-tools/branch/master/graph/badge.svg)](https://codecov.io/gh/dereuromark/cakephp-tools)
[![Latest Stable Version](https://poser.pugx.org/dereuromark/cakephp-tools/v/stable.svg)](https://packagist.org/packages/dereuromark/cakephp-tools)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/dereuromark/cakephp-tools/license.svg)](https://packagist.org/packages/dereuromark/cakephp-tools)
[![Total Downloads](https://poser.pugx.org/dereuromark/cakephp-tools/d/total.svg)](https://packagist.org/packages/dereuromark/cakephp-tools)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--2--R-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)

A CakePHP plugin containing several useful tools that can be used in many projects.

## Version notice

This master branch only works for **CakePHP 3.6+** - please use the 2.x branch for CakePHP 2.x!

## What is this plugin for?

### Enhancing the core
- Auto-trim on POST (to make - not only notEmpty - validation working properly).
- Disable cache also works for older IE versions.
- Provide enum support as "static enums"
- Default settings for Paginator, ... can be set using Configure.
- Provided a less error-prone inArray() method via Utility class and other usefulness.
- TestSuite enhancements
- A few more Database Type classes
 
### Additional features
- Passwordable behavior allows easy to use password functionality for frontend and backend.
- MultiColumnAuthenticate for log-in with e.g. "email or username".
- Slugged, Reset and other behaviors
- Text, Time, Number libs and helpers etc provide extended functionality if desired.
- QrCode, Gravatar and other useful small helpers
- Timeline, Typography, etc provide additional helper functionality.
- Email as a wrapper for core's Email adding some more usefulness and making debugging/testing easier.
- I18n language detection and switching

### Providing 2.x shims
This plugin for CakePHP 3 also contains some 2.x shims to ease migration of existing applications from 2.x to 3.x:
- See [Shim](https://github.com/dereuromark/cakephp-shim) plugin for details on most of the provided shims.

## Installation & Docs

- [Documentation](docs/README.md)

### TODOs

* Move more 2.x stuff to 3.x
