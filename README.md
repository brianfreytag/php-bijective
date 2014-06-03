# Bijective

Encodes any integer into a base(n) string using a defined alphabet.

## Installation

The suggested installation method is via [composer](https://getcomposer.org/):

```sh
php composer.phar require brianfreytag/php-bijective:dev-master
```

## Usage

After installing the Bijective library, simply create a new instance of the Bijective class, passing in a defined alphabet.

```php
<?php

use Bijective\Bijective;

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$bijective = new Bijective($alphabet);

$encoded = $bijective->encode(123); // Returns ct
$decoded = $bijective->decode('ct'); // Returns 123
```