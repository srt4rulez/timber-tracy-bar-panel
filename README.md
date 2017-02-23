# Timber Tracy Bar Panel

## What info does it show?

This tracy panel shows info about the following:

* Dumps the current Timber context into the same format as a Tracy BarDump
* Rendered Twig File(s)
* Version
* Template Directories
* Twig Cache
* Cache
* Auto Meta
* Autoescape

## Requirements:

* [Timber](https://github.com/timber/timber)
* [Tracy Debugger](https://github.com/nette/tracy)
* PHP 5.4+

## Getting Started

Install via composer:

```php
composer require srt4rulez/timber-tracy-bar-panel --dev
```

Add composer autoload to `functions.php` (You are using this in WordPress theme right?):

```php
require __DIR__ . '/vendor/autoload.php';
```

Enable tracy, then add the `TimberBarPanel`, like so:

```php
Tracy\Debugger::enable( Tracy\Debugger::DEVELOPMENT );
Tracy\Debugger::getBar()->addPanel( new srt4rulez\TimberBarPanel );
```

You could wrap tracy in a condition for `WP_DEBUG` and `! is_admin()` (I've experienced uploads error when tracy was enabled on admin side)
```php
if ( WP_DEBUG && ! is_admin() ) {

	Tracy\Debugger::enable( Tracy\Debugger::DEVELOPMENT );
	Tracy\Debugger::getBar()->addPanel( new \srt4rulez\TimberBarPanel );

}
```

Final `functions.php`:

```php
require __DIR__ . '/vendor/autoload.php';

if ( WP_DEBUG && ! is_admin() ) {

	Tracy\Debugger::enable( Tracy\Debugger::DEVELOPMENT );
	Tracy\Debugger::getBar()->addPanel( new srt4rulez\TimberBarPanel );

}
```

## Thanks

* [Timber](https://github.com/timber/timber) for the awesome WP framework
* [Tracy Debugger](https://github.com/nette/tracy) for the awesome debugging tool

## License

MIT
