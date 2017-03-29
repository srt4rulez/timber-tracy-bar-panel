# Timber Tracy Bar Panel

[![Latest Stable Version](https://poser.pugx.org/srt4rulez/timber-tracy-bar-panel/v/stable?format=flat-square)](https://packagist.org/packages/srt4rulez/timber-tracy-bar-panel)
[![License](https://poser.pugx.org/srt4rulez/timber-tracy-bar-panel/license?format=flat-square)](https://packagist.org/packages/srt4rulez/timber-tracy-bar-panel)

![Timber Tab](https://github.com/srt4rulez/timber-tracy-bar-panel/blob/master/timber-tab.png?raw=true "Timber Tab")

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

![Timber Panel](https://github.com/srt4rulez/timber-tracy-bar-panel/blob/master/timber-panel.png?raw=true "Timber Panel")

## Requirements:

* [Timber](https://github.com/timber/timber)
* [Tracy Debugger](https://github.com/nette/tracy)
* PHP 5.4+

## Getting Started

Install via composer:

```
composer require srt4rulez/timber-tracy-bar-panel --dev
```

Add composer autoload to `functions.php` (You are using this in a WordPress theme right?):

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
