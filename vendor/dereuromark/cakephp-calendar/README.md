# CakePHP Calendar plugin

[![Build Status](https://api.travis-ci.org/dereuromark/cakephp-calendar.png?branch=master)](https://travis-ci.org/dereuromark/cakephp-calendar)
[![Latest Stable Version](https://poser.pugx.org/dereuromark/cakephp-calendar/v/stable.svg)](https://packagist.org/packages/dereuromark/cakephp-calendar)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/dereuromark/cakephp-calendar/license.png)](https://packagist.org/packages/dereuromark/cakephp-calendar)
[![Total Downloads](https://poser.pugx.org/dereuromark/cakephp-calendar/d/total.png)](https://packagist.org/packages/dereuromark/cakephp-calendar)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--2--R-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)

A plugin to render simple calendars.

This branch is for CakePHP 3.6+.

## Features
- Simple and robust
- No JS needed, more responsive than solutions like fullcalendar
- Persistent `year/month` URL pieces (copy-paste and link/redirect friendly)
- IcalView class for `.ics` calender file output.

## Demo
See the demo [Calendar example](http://sandbox.dereuromark.de/sandbox/calendar) at the sandbox.

## Setup
```
composer require dereuromark/cakephp-calendar
```

Then make sure the plugin is loaded in bootstrap:
```
bin/cake plugin load Calendar
```

You can also just manually put this in your bootstrap file:
```
Plugin::load('Calendar');
```

## Usage
See [Documentation](/docs).
