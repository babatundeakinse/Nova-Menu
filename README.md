# Nova Menu management tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rende/nova-menu.svg?style=flat-square)](https://packagist.org/packages/rende/nova-menu)
![CircleCI branch](https://img.shields.io/circleci/project/github/rende/nova-menu/master.svg?style=flat-square)
[![Build Status](https://img.shields.io/travis/rende/nova-menu/master.svg?style=flat-square)](https://travis-ci.org/rende/nova-menu)
[![Quality Score](https://img.shields.io/scrutinizer/g/rende/nova-menu.svg?style=flat-square)](https://scrutinizer-ci.com/g/rende/nova-menu)
[![Total Downloads](https://img.shields.io/packagist/dt/rende/nova-menu.svg?style=flat-square)](https://packagist.org/packages/rende/nova-menu)


This is where your description should go. Try and limit it to a paragraph or two.

Add a screenshot of the tool here.

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require rende/nova-menu
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Rende\NovaMenu\Tool(),
    ];
}
```

## Usage

Click on the "nova-menu" menu item in your Nova app to see the tool provided by this package.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email babatundeakinse@gmail.com instead of using the issue tracker.

## Credits

- [Rehan Aslam](https://github.com/advoor)
- [Babatunde Akinse](https://github.com/babatundeakinse)

## Project Road Map
- [ ] Menu Management
- [ ] Menu Positioning
- [ ] Draggable UI

## Support us

Rende

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
