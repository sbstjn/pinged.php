# bePinged

Event logger for PHP

## Usage

### Development

Create a `routes.php` with the following contents:

```php
<?php

if (file_exists(__DIR__ . $_SERVER['REQUEST_URI']))
  return false;
else
  include __DIR__ . '/index.php';
```

Use PHP 5.4 built-in web server

```bash
php -S localhost:8080 routes.php