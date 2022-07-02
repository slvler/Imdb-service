<?php 



class ImdbCurlTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $imdb = new qwerty\ImdbCurl\ImdbCurl("https://www.imdb.com/title/tt0068646/");
        $all = $imdb->All();
        $this->assertIsArray($all);

    }
}
