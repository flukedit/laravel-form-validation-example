# Laravel Form Validation Example

Install the composer packages
```shell
composer install
```

Make a copy of the env file
```shell
cp .env.example .env
```

Generate a new app key 
```shell
php artisan key:generate
```

This repo is using PHPUnit 9.6, so you may need to install it, which can be done by following the instructions here: 
https://docs.phpunit.de/en/9.6/installation.html

I only used the PHAR when testing, so this may be enough for the purposes of playing around: https://docs.phpunit.de/en/9.6/installation.html#php-archive-phar

With the .phar file set up, the following command can be used to run all the tests
```shell
./phpunit-9.6.phar
```

Or to run a specific file
```shell
./phpunit-9.6.phar --filter Attempt5ExampleTest
```

Or to run a specific test
```shell
./phpunit-9.6.phar --filter it_returns_422_status_when_form_data_not_provided
```
