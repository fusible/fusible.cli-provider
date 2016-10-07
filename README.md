# fusible.cli-provider
Canned [Aura\Cli] configuration for [Aura\Di (3.x)]

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

## Installation
```
composer require fusible/cli-provider
```

## Usage

### [Aura\Di (3.x)]
See: [ Aura\Di > *Container Builder and Config Classes* ][Aura\Di docs].
```php
use Aura\Di\ContainerBuilder;
use Fusible\CliProvider\Config as CliConfig;

$builder = new ContainerBuilder();
$di = $builder->newConfiguredInstance([CliConfig::class]);

$context = $di->get(CliConfig::CONTEXT);
$stdio   = $di->get(CliConfig::STDIO);
```



[Aura\Cli]: https://github.com/auraphp/Aura.Cli
[Aura\Di (3.x)]: https://github.com/auraphp/Aura.Di/tree/3.x
[Aura\Di docs]: https://github.com/auraphp/Aura.Di/blob/3.x/docs/config.md

[ico-version]: https://img.shields.io/packagist/v/fusible/cli-provider.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/fusible/fusible.cli-provider/develop.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/fusible/fusible.cli-provider.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/fusible/fusible.cli-provider.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/fusible/cli-provider
[link-travis]: https://travis-ci.org/fusible/fusible.cli-provider
[link-scrutinizer]: https://scrutinizer-ci.com/g/fusible/fusible.cli-provider
[link-code-quality]: https://scrutinizer-ci.com/g/fusible/fusible.cli-provider
