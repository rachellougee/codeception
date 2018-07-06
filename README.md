# Codeception testing
Codeception is a full-stack testing PHP framework. This repo provides the examples for REST API and acceptance tests. 

## Installation

#### Install via Composer
```
php composer.phar require "codeception/codeception"
```
or

#### Download Phar file
```
wget https://codeception.com/codecept.phar
```
execute as
```
php codecept.phar
```

See detail https://codeception.com/install

##Running tests

REST API test
 ```
 codecept run tests/api/ApiTestingCest.php
 ```
 
Acceptance test
 ```
 codecept run tests/appeptance/AcceptTestingCest.php
 ```

 
