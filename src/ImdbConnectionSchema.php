<?php


namespace qwerty\ImdbCurl;

Interface  ImdbConnectionSchema{

    public function __construct($url);

    public function Connection();
    public function All();
    public function AllContinue();
    public function Also_Known_As();
    public function Aka_one();
    public function Aka_two();
    public function Awards();
    public function Title();
    public function Rating();
    public function Vote();
    public function Budget();
    public function Country();
    public function Language();
    public function LanguageDetail($var);
    public function Color();
    public function ColorDetail($var);
    public function Aspect_Ratio();
    public function Aspect_Ratio_Detail($var);
    public function Official_Sites();
    public function Official_Sites_Detail($var);
    public function Runtime();
    public function Runtime_Details($var);
    public function Locations();
    public function Locations_Details($var);
    public function Certification();
    public function Certification_Details($var);
    public function Plot_Summary();
    public function Plot_Summary_Details($var);
    public function Plot_Keywords();
    public function Plot_Keywords_Details($var);
    public function Taglines();
    public function Taglines_Details($var);
    public function Genres();
    public function Genres_Details($var);
    public function Sound_Mix();
    public function Sound_Mix_Details($var);
    public function Movie_Connections();
    public function Movie_Connections_Details($var);
    public function Soundtracks();
    public function Soundtracks_Details($var);
    public function Crazy_Credits();
    public function Crazy_Credits_Details($var);
    public function Quotes();
    public function Quotes_Details($var);
    public function Poster();
    public function Media($uri);
    public function Cast();



}