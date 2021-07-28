# twikr

Twig Brige for Mako Framework

Originally inspired by ``softr/twiko``

## Install

You can install the package through composer:

```php
composer require twocore/twikr
```

So now you can update your project with a single command.

```php
composer update
```

## Register Service

After installing you'll have to register the package in your ``app/config/application.php`` file:

```
'packages' =>
[
    ...
    'core' =>
    [
        ...
        twocore\twikr\TwikrPackage::class,
    ]
    ...
],
```

Now your application is able to use Twig Template Engine.

## Clearing Cache

This packages provides a command to clear Twig Cache Files.

To make use of it simply run ``php reactor twikr::clear``

## Compatibility

This package is compatible with Mako >= 7.0 & Twig >= 3.0 versions.