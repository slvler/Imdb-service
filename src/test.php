<?php


//include "ImdbCurl.php";

require __DIR__ . '/../vendor/autoload.php';



$empty = "https://www.imdb.com/title/tt1056017/releaseinfo";

$veri = new qwerty\ImdbCurl\ImdbCurl("https://www.imdb.com/title/tt0068646/");


$media = $veri->All();

print_r($media);

//$a = new deneme\ImdbCurl("https://www.imdb.com/title/tt0068646/");

/*
$all = $a->All();
$title = $a->Title();
$rating = $a->Rating();
$vote = $a->Vote();
$aka = $a->Also_Known_As();
$awards = $a->Awards();
$director = $a->Director();
$writers = $a->Writers();
$stars = $a->Stars();
$budget = $a->Budget();

$country = $a->Country();
$lang = $a->Language();
$color = $a->Color();
$aspect = $a->Aspect_Ratio();
$offical = $a->Official_Sites();
$runtime = $a->Runtime_M();
$locations = $a->Locations();
$certificion = $a->Certification();
$plot_summery = $a->Plot_Summary();
$plot_keywords = $a->Plot_Keywords();
$taglines = $a->Taglines();
$genres = $a->Genres();
$sound_mix = $a->Sound_Mix();
$Movie_Connections = $a->Movie_Connections();
$Soundtracks = $a->Soundtracks();
$Crazy_Credist = $a->Crazy_Credits();
$Quotes = $a->Quotes();
$Poster = $a->Poster();
$Cast = $a->Cast();
$awards = $a->Poster();

*/
//$uri = "https://www.imdb.com/title/tt0068646/mediaviewer/rm1703430656/";
//$media = $a->Media($uri);

//print_r($media);
