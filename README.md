# PHP-IMDB-qwerty

Connecting to imdb.com with curl and data extraction process



Initialize
------------
```php
<?php

use \qwerty\ImdbCurl as ImdbCurl;
require_once "autoload.php";


$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");

$all = $imdb->All();

print_r($all);

?>
```
