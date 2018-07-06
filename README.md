# sitemap

Require the bundle as a dependency.

```bash
$ composer require alexsmith42/sitemap
```

Usage:
```php
<?php
    $parser = new SitemapParser();
    $pages = $parser->parseFile($filename);
```
