Fab
===

[![Build Status](https://secure.travis-ci.org/whatthejeff/fab.png?branch=master)](https://travis-ci.org/whatthejeff/fab)

Make your output fabulous!

## Usage

[![fabulous output](https://github.com/whatthejeff/fab/raw/master/fab.png)](https://github.com/whatthejeff/fab/raw/master/fab.png)

## Requirements

Fab works with PHP 5.3.3 or later.

## Installation

The recommended way to install Fab is [through
composer](http://getcomposer.org). Just create a `composer.json` file and
run the `php composer.phar install` command to install it:

    {
        "require": {
            "whatthejeff/fab": "1.0.*@dev"
        }
    }

## Tests

To run the test suite, you need [composer](http://getcomposer.org).

    $ php composer.phar install --dev
    $ vendor/bin/phpunit

## Acknowledgements

Fab was __heavily__ inspired by the glorious [minitest/pride](https://github.com/seattlerb/minitest/blob/master/lib/minitest/pride.rb).

## License

Fab is licensed under the [MIT license](LICENSE).