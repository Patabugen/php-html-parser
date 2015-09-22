PHP HTML Parser
===============

Build status: [![Build status](https://travis-ci.org/andig/php-html-parser.png)](https://travis-ci.org/andig/php-html-parser)

A simple and efficient DOMDocument based PHP HTML and XML Parser. It accepts both css selector and xpath queries to search the document and handles malformed HTML as well.

Example:
```php
require __DIR__.'/vendor/autoload.php';
$html = \HtmlParser\Parser::from_string('<div id="outer"><span class="red">Some Text</span></div>');
$text = $html->find('#outer .red', 0)->text;
echo $text;   // outputs "Some Text"
```

### Authors

Originally source code taken from https://github.com/hkk12369/php-html-parser. 
Test cases and refactoring for composer/packagist by https://github.com/andig/php-html-parser.

### Installation via Composer

Define the following requirement in your composer.json file:

```json
{
    "require": {
        "andig/php-html-parser": "dev-master"
    }
}
```
