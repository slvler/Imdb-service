<?php 



class ImdbCurlTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $all = $imdb->All();
        $this->assertIsArray($all);
    }
    public function testTitle()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $title = $imdb->Title();
        $this->assertIsString($title);
    }
    public function testRating()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $rating = $imdb->Rating();
        $this->assertIsString($rating);
    }
    public function testVote()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $vote = $imdb->Vote();
        $this->assertIsString($vote);
    }
    public function testAlsoKnow()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $also = $imdb->Also_Known_As();
        $this->assertIsString($also);
    }
    public function testAwards()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $awards = $imdb->Awards();
        $this->assertIsString($awards);
    }
    public function testDirector()
    { 
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $director = $imdb->Director();
        $this->assertIsString($director);
    }
    public function testWriters()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $writers = $imdb->Writers();
        $this->assertIsString($writers);
    }
    public function testStars()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $stars = $imdb->Stars();
        $this->assertIsString($stars);
    }
    public function testBudget()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $budget = $imdb->Budget();
        $this->assertIsString($budget);
    }
    public function testCountry()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $country = $imdb->Country();
        $this->assertIsString($country);
    }
    public function testLanguage()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $language = $imdb->Language();
        $this->assertIsString($language);
    }
    public function testColor()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $color = $imdb->Color();
        $this->assertIsString($color);
    }
    public function testAspectRatio()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $aspectRatio = $imdb->Aspect_Ratio();
        $this->assertIsString($aspectRatio);
    }
    public function testOfficialSites()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $officalSites = $imdb->Official_Sites();
        $this->assertIsString($officalSites);
    }
    public function testRuntimeM()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $runtimeM = $imdb->Runtime_M();
        $this->assertIsString($runtimeM);
    }
    public function testLocations()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $locations = $imdb->Locations();
        $this->assertIsString($locations);
    }
    public function testCertification()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $certification = $imdb->Certification();
        $this->assertIsString($certification);
    }
    public function testPlotSummary()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $plotSummary = $imdb->Plot_Summary();
        $this->assertIsString($plotSummary);
    }
    public function testPlotKeywords()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $plotKeywords = $imdb->Plot_Keywords();
        $this->assertIsString($plotKeywords);
    }
    public function testTaglines()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $taglines = $imdb->Taglines();
        $this->assertIsString($taglines);
    }
    public function testGenres()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $genres = $imdb->Genres();
        $this->assertIsString($genres);
    }
    public function testSoundMix()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $soundMix = $imdb->Sound_Mix();
        $this->assertIsString($soundMix);
    }
    public function testMovieConnections()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $movieConnections = $imdb->Movie_Connections();
        $this->assertIsString($movieConnections);
    }
    public function testSoundTracks()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $soundTracks = $imdb->Soundtracks();
        $this->assertIsString($soundTracks);
    }
    public function testCrazyCredits()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $crazyCredits = $imdb->Crazy_Credits();
        $this->assertIsString($crazyCredits);
    }
    public function testQuotes()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $quotes = $imdb->Quotes();
        $this->assertIsString($quotes);
    }
    public function testPoster()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $poster = $imdb->Poster();
        $this->assertIsString($poster);
    }
    public function testCast()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $cast = $imdb->Cast();
        $this->assertIsArray($cast);
    }
    public function testMedia()
    {
        $imdb = new slvler\Imdb\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $uri = "https://www.imdb.com/title/tt0068646/mediaviewer/rm1703430656/";
        $media = $imdb->Media($uri);
        $this->assertIsString($media);
    }


}
