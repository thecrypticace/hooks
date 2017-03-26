# PHPUnit Test Hooks

<p align="center">
<a href="https://travis-ci.org/thecrypticace/hooks"><img src="https://travis-ci.org/thecrypticace/hooks.svg" alt="Build Status"></a>
<a href="https://codecov.io/github/thecrypticace/hooks?branch=master"><img src="https://img.shields.io/codecov/c/github/thecrypticace/hooks/master.svg" alt="Coverage Status"></a>
<a href="https://packagist.org/packages/thecrypticace/hooks"><img src="https://poser.pugx.org/thecrypticace/hooks/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/thecrypticace/hooks"><img src="https://poser.pugx.org/thecrypticace/hooks/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/thecrypticace/hooks"><img src="https://poser.pugx.org/thecrypticace/hooks/license.svg" alt="License"></a>
</p>

## What

Allows one to use run arbitrary code before or after any of the following methods in their test classes:
- setupBeforeClass
- setUp
- tearDown
- tearDownAfterClass
- setUpTraits (if you use Laravel)

You add an annotation to a method that you want to run like so:

```php
/** @run before setUp */
public function restoreTestNow()
{
    Carbon::setTestNow(null);
}
```
