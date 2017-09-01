Laravel PerPage Resolver
========================

[![Build Status](https://travis-ci.org/roquie/laravel-perpage-resolver.svg?branch=master)](https://travis-ci.org/roquie/laravel-perpage-resolver)
[![Coverage Status](https://coveralls.io/repos/github/roquie/laravel-perpage-resolver/badge.svg?branch=master)](https://coveralls.io/github/roquie/laravel-perpage-resolver?branch=master)

This package add the same method `perPageResolver` like as `currentPageResolver`. Now,
`?per_page=100` parameter have a globally access for all models (like `?page=2`). 

## How to use

For the beginning, install composer package: 
```
composer require roquie/laravel-perpage-resolver
```

Second, you should extends package Model class:

```php
class User extends \Roquie\LaravelPerPageResolver\Model
{
// ...
```

Third, apply a service provider it's here:

```php
// config/app.php, the providers array
// ...
Roquie\LaravelPerPageResolver\PerPageResolverServiceProvider::class,
```

Run it!

## Tests

100% code coverage. Includes integration tests.

## License
 
[MIT](./LICENSE)
