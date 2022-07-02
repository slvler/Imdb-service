<?php



namespace qwerty\ImdbCurl;

abstract class ImdbConnection implements ImdbConnectionSchema{

    public $url;
    public $veri;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function Connection($lastUrl = null){
        $curl = curl_init();

        if($lastUrl != ""){
            curl_setopt_array($curl,
                [
                    CURLOPT_URL => $lastUrl,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_RETURNTRANSFER =>1,
                ]);

        } else{
            curl_setopt_array($curl,
                [
                    CURLOPT_URL => 'https://www.imdb.com/title/'.$this->url.'/reference',
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_RETURNTRANSFER =>1,
                ]);

        }

        $this->veri =curl_exec($curl);
        return $this->veri;
    }

    public function All()
    {
        $all = '@<section class="article listo content-advisories-index">(.*?)</section>@si';
        preg_match($all, $this->Connection(),$result);

        $arrOne = [];

        $resultOne = $this->AllContinue();
        $stepOne = strip_tags($result[0]);
        array_push($arrOne,$stepOne);
        array_push($arrOne,$resultOne);
        return $arrOne;

    }
    public function AllContinue(){

        $AllContinue = '@<table class="cast_list">(.*?)</table>@si';
        preg_match($AllContinue, $this->Connection(),$result);
        return strip_tags($result[0]);
    }
    public function Also_Known_As()
    {
        $arrOne = array_combine($this->Aka_one(), $this->Aka_two());
        return $arrOne;
        // TODO: Implement Also_Known_As() method.
    }
    public function Aka_one()
    {
        $lastUrl  = "https://www.imdb.com/title/".$this->url."/releaseinfo";
        $aka = '@<td class="aka-item__title">(.*?)</td>@si';
        preg_match_all($aka, $this->Connection($lastUrl),$result);
        return $result[0];
        // TODO: Implement Also_Known_As() method.
    }
    public function Aka_two(){


        $lastUrl  = "https://www.imdb.com/title/".$this->url."/releaseinfo";
        $akab = '@<td class="aka-item__name">(.*?)</td>@si';
        preg_match_all($akab, $this->Connection($lastUrl),$result);
        return $result[0];

   }
    public function Awards(){
        $awards = '@<div class="titlereference-overview-section">(.*?)</div>@si';
        preg_match_all($awards, $this->Connection(),$result);
        return $result;
    }
    public function Director(){
        $awards = '@<div class="titlereference-overview-section">(.*?)</div>@si';
        preg_match_all($awards, $this->Connection(),$result);
        return $result;
    }
    public function Writers(){
        $awards = '@<div class="titlereference-overview-section">(.*?)</div>@si';
        preg_match_all($awards, $this->Connection(),$result);
        return $result;
    }
    public function Stars(){
        $awards = '@<div class="titlereference-overview-section">(.*?)</div>@si';
        preg_match_all($awards, $this->Connection(),$result);
        return $result;
    }
    public function Title(){
        $title = '@<h3 itemprop="name">(.*?)</h3>@si';
        preg_match($title, $this->Connection(),$result);
        return $result;
    }
    public function Rating(){
        $rating = '@<span class="ipl-rating-star__rating">(.*?)</span>@si';
        preg_match($rating,$this->Connection(),$result);
        return $result;

    }
    public function Vote()
    {
        $rating = '@<span class="ipl-rating-star__total-votes">(.*?)</span>@si';
        preg_match($rating,$this->Connection(),$result);
        return $result;
        // TODO: Implement Vote() method.
    }
    public function Budget()
    {
        $rating = '@<section class="titlereference-section-box-office">(.*?)</section>@si';
        preg_match($rating,$this->Connection(),$result);
        return $result;
        // TODO: Implement Vote() method.
    }
    public function Country(){
        $rating =   '@<a href="/country/(.*?)">(.*?)</a>@si';
        preg_match($rating,$this->Connection(),$result);
        return $result;
        // TODO: Implement Country() method.
    }
    public function Language(){

        $rating =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($rating,$this->Connection(),$result);
        $languageStepOne =  array_search("Language",$result[1]);
        return $this->LanguageDetail($languageStepOne);
        // TODO: Implement Language() method.
    }
    public function LanguageDetail($var){
        $languageDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($languageDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;

    }

    public function Color(){
        $colorOne =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($colorOne,$this->Connection(),$result);
        $ColorStepOne =  array_search("Color",$result[1]);
        return $this->ColorDetail($ColorStepOne);
    }
    public function ColorDetail($var){

        $ColorDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($ColorDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
    }

    public function Aspect_Ratio(){
        $Aspect =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Aspect,$this->Connection(),$result);
        $AspectStepOne =  array_search("Aspect Ratio",$result[1]);
        return $this->Aspect_Ratio_Detail($AspectStepOne);
    }


    public function Aspect_Ratio_Detail($var){
        $ColorDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($ColorDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
    }

    public function Official_Sites()
    {
        $Offical =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Offical,$this->Connection(),$result);
        $OfficalStepOne =  array_search("Official Sites",$result[1]);
        return $this->Official_Sites_Detail($OfficalStepOne);
        // TODO: Implement Official_Sites() method.
    }

    public function Official_Sites_Detail($var)
    {
        $OfficalDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($OfficalDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;

    }

    public function Runtime()
    {
        $Runtime =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Runtime,$this->Connection(),$result);
        $RuntimeStepOne =  array_search("Runtime",$result[1]);
        return $this->Runtime_Details($RuntimeStepOne);
        // TODO: Implement Official_Sites() method.
    }

    public function Runtime_Details($var)
    {
        $RuntimeDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($RuntimeDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;

    }

    public function Locations()
    {
        $Runtime =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Runtime,$this->Connection(),$result);
        $RuntimeStepOne =  array_search("Filming Locations",$result[1]);
        return $this->Locations_Details($RuntimeStepOne);
        // TODO: Implement Official_Sites() method.
    }

    public function Locations_Details($var)
    {
        $LocationDetail =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($LocationDetail,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
    }


    public function Certification()
    {
        $Certification =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Certification,$this->Connection(),$result);
        $CertificationStepOne =  array_search("Certification",$result[1]);
        return $this->Certification_Details($CertificationStepOne);
    }

    public function Certification_Details($var)
    {
        $Certification =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Certification,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
    }

    public function Plot_Summary()
    {
        $Plot_Summary =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Plot_Summary,$this->Connection(),$result);
        $CertificationStepOne =  array_search("Plot Summary",$result[1]);
        return $this->Plot_Summary_Details($CertificationStepOne);
        // TODO: Implement Plot_Summary() method.
    }

    public function Plot_Summary_Details($var)
    {
        $Plot_Summary =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Plot_Summary,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Plot_Summary_Details() method.
    }

    public function Plot_Keywords()
    {

        $Plot_Keywords =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Plot_Keywords,$this->Connection(),$result);
        $PlotKeywordsStepOne =  array_search("Plot Keywords",$result[1]);
        return $this->Plot_Keywords_Details($PlotKeywordsStepOne);
        // TODO: Implement Plot_Keywords() method.
    }

    public function Plot_Keywords_Details($var)
    {
        $Plot_Keywords =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Plot_Keywords,$this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Plot_Keywords_Details() method.
    }

    public function Taglines()
    {
        $taglines =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($taglines,$this->Connection(),$result);
        $TaglinesStepOne =  array_search("Taglines",$result[1]);
        return $this->Taglines_Details($TaglinesStepOne);
        // TODO: Implement Taglines() method.
    }

    public function Taglines_Details($var)
    {
        $taglines =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($taglines, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Taglines_Details() method.
    }

    public function Genres()
    {
        $genres =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($genres,$this->Connection(),$result);
        $GenresStepOne =  array_search("Genres",$result[1]);
        return $this->Genres_Details($GenresStepOne);
        // TODO: Implement Genres() method.
    }

    public function Genres_Details($var)
    {
        $genres =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($genres, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Genres_Details() method.
    }

    public function Sound_Mix()
    {
        $sound_mix =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($sound_mix,$this->Connection(),$result);
        $SoundMixStepOne =  array_search("Sound Mix",$result[1]);
        return $this->Genres_Details($SoundMixStepOne);
        // TODO: Implement Sound_Mix() method.
    }

    public function Sound_Mix_Details($var)
    {
        $Sound_Mix =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Sound_Mix, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Sound_Mix_Details() method.
    }

    public function Movie_Connections()
    {
        $Movie_Connections =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Movie_Connections,$this->Connection(),$result);
        $MovieConnectionsStepOne =  array_search("Movie Connections",$result[1]);
        return $this->Movie_Connections_Details($MovieConnectionsStepOne);
        // TODO: Implement Movie_Connections() method.
    }

    public function Movie_Connections_Details($var)
    {
        $Movie_Connections =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Movie_Connections, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Movie_Connections_Details() method.
    }


    public function Soundtracks()
    {

        $SoundTracks =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($SoundTracks,$this->Connection(),$result);
        $SoundTracksStepOne =  array_search("Soundtracks",$result[1]);
        return $this->Soundtracks_Details($SoundTracksStepOne);
        // TODO: Implement Soundtracks() method.
    }

    public function Soundtracks_Details($var)
    {
        $SoundTracks =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($SoundTracks, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;

        // TODO: Implement Soundtracks_Details() method.
    }

    public function Crazy_Credits()
    {

        $Crazy_Credits =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Crazy_Credits,$this->Connection(),$result);
        $CrazyCreditsStepOne =  array_search("Crazy Credits",$result[1]);
        return $this->Crazy_Credits_Details($CrazyCreditsStepOne);
        // TODO: Implement Crazy_Credits() method.
    }

    public function Crazy_Credits_Details($var)
    {
        $Crazy_Credits =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Crazy_Credits, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Crazy_Credits_Details() method.
    }

    public function Quotes()
    {
        $Quotes =   '@<td class="ipl-zebra-list__label">(.*?)</td>@si';
        preg_match_all($Quotes,$this->Connection(),$result);
        $QuotesStepOne =  array_search("Quotes",$result[1]);
        return $this->Quotes_Details($QuotesStepOne);
        // TODO: Implement Quotes() method.
    }

    public function Quotes_Details($var)
    {
        $Quotes =   '@<tr class="ipl-zebra-list__item">(.*?)</tr>@si';
        preg_match_all($Quotes, $this->Connection(),$result);
        $stepOne =  $result[0][$var];
        return $stepOne;
        // TODO: Implement Quotes_Details() method.
    }

    public function Poster()
    {
        $Poster =   '@<div class="titlereference-header">(.*?)</div>@si';
        preg_match_all($Poster,$this->Connection(),$result);
        $stepTwo = $result[0][0];
        preg_match('/src="([^"]*)"/',$stepTwo,$stepThree);
        return $stepThree[1];
        // TODO: Implement Poster() method.
    }

    public function Media($uri)
    {
        $Media = '<img src="https:\/\/m\.media-amazon\.com\/images\/M\/([a-zA-Z-0-9@._]*)">';
        preg_match_all($Media,$this->Connection($uri),$result);
        return $result;
        // TODO: Implement Media() method.
    }

    public function Cast()
    {
        $stepOne =   '@<table class="cast_list">(.*?)</table>@si';
        preg_match_all($stepOne,$this->Connection(),$result);

        $stepTwo =   '@<tr class="(.*?)">(.*?)</tr>@si';
        preg_match_all($stepTwo, $result[0][0], $stepThree);
        return $stepThree[2];
        // TODO: Implement Cast() method.
    }


}