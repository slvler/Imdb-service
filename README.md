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


#### Title ():

Title:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Title = $imdb->Title();
print_r($Title);

?>
```

#### Rating ():

Rating:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Rating = $imdb->Rating();
print_r($Rating);

?>
```


#### Vote ():

Vote:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Vote = $imdb->Vote();
print_r($Vote);

?>
```

#### Also Known As ():

Also Known As:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Also_Known_As = $imdb->Also_Known_As();
print_r($Also_Known_As);

?>
```

#### Awards ():

Awards:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Awards = $imdb->Awards();
print_r($Awards);

?>
```

#### Director ():

Director:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Director = $imdb->Director();
print_r($Director);

?>
```

#### Writers ():

Writers:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Writers = $imdb->Writers();
print_r($Writers);

?>
```

#### Stars ():

Stars:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Stars = $imdb->Stars();
print_r($Stars);

?>
```

#### Budget ():

Budget:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Budget = $imdb->Budget();
print_r($Budget);

?>
```

#### Country ():

Country:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Country = $imdb->Country();
print_r($Country);

?>
```


#### Language ():

Language:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Language = $imdb->Language();
print_r($Language);

?>
```

#### Color ():

Color:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Color = $imdb->Color();
print_r($Color);

?>
```

#### Aspect Ratio ():

Aspect Ratio:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Aspect_Ratio = $imdb->Aspect_Ratio();
print_r($Aspect_Ratio);

?>
```

#### Official Sites ():

Official Sites:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Official_Sites = $imdb->Official_Sites();
print_r($Official_Sites);

?>
```

#### Runtime ():

Runtime:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Runtime_M = $imdb->Runtime_M();
print_r($Runtime_M);

?>
```

#### Locations ():

Locations:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Locations = $imdb->Locations();
print_r($Locations);

?>
```

#### Certification ():

Certification:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Certification = $imdb->Certification();
print_r($Certification);

?>
```

#### Plot Summary ():

Plot Summary:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Plot_Summary = $imdb->Plot_Summary();
print_r($Plot_Summary);

?>
```

#### Plot Keywords ():

Plot Keywords:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Plot_Keywords = $imdb->Plot_Keywords();
print_r($Plot_Keywords);

?>
```


#### Taglines ():

Taglines:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Taglines = $imdb->Taglines();
print_r($Taglines);

?>
```

#### Genres ():

Genres:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Genres = $imdb->Genres();
print_r($Genres);

?>
```

#### Sound Mix ():

Sound Mix:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Sound_Mix = $imdb->Sound_Mix();
print_r($Sound_Mix);

?>
```

#### Movie Connections ():

Movie Connections:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Movie_Connections = $imdb->Movie_Connections();
print_r($Movie_Connections);

?>
```

#### Soundtracks ():

Soundtracks:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Soundtracks = $imdb->Soundtracks();
print_r($Soundtracks);

?>
```

#### Crazy Credits ():

Crazy Credits:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Crazy_Credits = $imdb->Crazy_Credits();
print_r($Crazy_Credits);

?>
```

#### Quotes ():

Quotes:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Quotes = $imdb->Quotes();
print_r($Quotes);

?>
```

#### Poster ():

Poster:

```php
<?php

$imdb = new ImdbCurl("https://www.imdb.com/title/tt0068646/");
$Poster = $imdb->Poster();
print_r($Poster);

?>
```


#### Media ($uri):

Media:

```php
<?php

$uri = "https://www.imdb.com/title/tt0068646/mediaviewer/rm1703430656/";

$imdb = new ImdbCurl();
$media = $imdb->Media($uri);
print_r($media);

?>
```




