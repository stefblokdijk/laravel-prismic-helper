# Prismic Helper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stefblokdijk/laravel-prismic-helper.svg?style=flat-square)](https://packagist.org/packages/stefblokdijk/laravel-prismic-helper)
[![Total Downloads](https://img.shields.io/packagist/dt/stefblokdijk/laravel-prismic-helper.svg?style=flat-square)](https://packagist.org/packages/stefblokdijk/laravel-prismic-helper)

Work In Progress package to easily use the main functionalities of Prismic in your Laravel Project

## Installation

You can install the package via composer:

```bash
composer require stefblokdijk/laravel-prismic-helper
```

Add the following to your `.env` file
```
PRISMIC_REPOSITORY_URL=https://example.cdn.prismic.io/api/v2
```

If you are using a multilanguage repository, you can also set the default language in your `.env`
```
PRISMIC_LANGUAGE=nl
```

## Examples

#### Get Content from a single type
``` php
use stefblokdijk\LaravelPrismicHelper\LaravelPrismicHelper;

LaravelPrismicHelper::getSingle($type);
```

#### Get Content from UID
``` php
LaravelPrismicHelper::getByUID($uid, $type);
```

#### Get all items by an given type. This will return an collection
``` php
LaravelPrismicHelper::getByType($type);
```

#### You can also filter using the `getByType` function:
``` php
// filter by tag
LaravelPrismicHelper::getByType($type, [
    'tags' => ['highlighted']
]);

// sort by by field (https://prismic.io/docs/php/query-the-api/order-your-result)
LaravelPrismicHelper::getByType($type, [
    'orderings' => '[my.news.date desc]'
]);
```

#### Query by Language
``` php
LaravelPrismicHelper::language('nl')->getSingle(type);
```

## Helper functions for Blade templating

You have the following functions available to you:

| *Function*                                 | *Returns*                                          |
|--------------------------------------------|----------------------------------------------------|
| `prismic_as_text($content, $key)`          | Plain text content                                 |
| `prismic_as_html($content, $key)`          | Html content                                       |
| `prismic_as_date($content, $key, $format)` | ISO date format using `Carbon::isoFormat($format)` |
| `prismic_file_url($content, $key)`         | File Url                                           |
| `prismic_image_url($content, $key)`        | Image Url                                          |
| `prismic_image_alt($content, $key)`        | Image Alt Text                                     |

#### Examples:
``` html
<h1>{{ prismic_as_text($content, 'subtitle') }}<h1>

<img src="{{ prismic_image_url($content, 'image') }}" alt="{{ prismic_image_alt($content, 'image') }}" />

<span>{{ prismic_as_date($content, 'created_at', 'LL') }}</span>
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email hello@stefblokdijk.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
