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

Second, apply a service provider it's here (if you use Laravel 5.5+ [it's no need anymore](https://laravel-news.com/package-auto-discovery)):

```php
// config/app.php, the providers array
// ...
Roquie\LaravelPerPageResolver\PerPageResolverServiceProvider::class,
```

Third, you can use `PerPageResolverTrait` in your models (recommended):

```php
use Illuminate\Database\Eloquent\Model;
use Roquie\LaravelPerPageResolver\PerPageResolverTrait;

class User extends Model
{
    use PerPageResolverTrait;
// ...
```

... or extends package Model class:

```php
class User extends \Roquie\LaravelPerPageResolver\Model
{
// ...
```

Run it!

## Upgrade

So, if you update the package from `1.0.0`  to `1.1.0` version what you need to know:

* backward compatibility there is
* fixed "bug", when other query parameters does not append to uri
* added package-auto-discovery functional.

## Tests

100% code coverage. Includes integration tests.

## License

The MIT License (MIT)

Copyright (c) 2019 Roquie <roquie0@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
