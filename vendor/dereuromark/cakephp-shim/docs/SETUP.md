# Installation

## How to include
Installing the Plugin is pretty much as with every other CakePHP Plugin.

Install using Packagist/Composer:
```
composer require dereuromark/cakephp-shim
```

Details @ https://packagist.org/packages/dereuromark/cakephp-shim

This will load the plugin (within your bootstrap file):
```php
Plugin::load('Shim');
```
or
```php
Plugin::loadAll(...);
```

There is also a handy shell command that can enable a plugin:
```
bin/cake plugin load Shim
```

## Testing MySQL

By default it will usually use SQLite DB (out of the box available).
If you want to run all tests, including MySQL ones, you need to set
```
export db_dsn="mysql://root:yourpwd@127.0.0.1/cake_test"
```
before you actually run
```
php phpunit.phar
```

Make sure such a cake_test database exists.
