Laravel PerPage Resolver
========================

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

PR are welcome ;)

## License
 
MIT 
