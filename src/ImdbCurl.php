<?php


namespace slvler\Imdb;

class ImdbCurl extends ImdbConnection {


    public $url;

    public $res = "";
    public $query = "";
    public $control = "";

    public function __construct($url)
    {
        $this->url = $url;

        parent::__construct($this->control());
    }

    public function control(){
        $control = explode("/", $this->url);
        return $control[4];
    }
    public function Conn(){
        parent::Connection();
    }


    public function All()
    {
        $res =  parent::All(); // TODO: Change the autogenerated stub

        if (empty($res)){
            return '<pre><b>All:</b> Not found </pre>';
        }
        return $res;
    }

    public function Also_Known_As()
    {
        $res =  parent::Also_Known_As(); // TODO: Change the autogenerated stub

        if (empty($res)){
            return '<pre><b>Aka:</b> Not found </pre>';
        }
        return $res;

    }

    public function Awards()
    {
        $result =  parent::Awards(); // TODO: Change the autogenerated stub

        $ArrOne = [];

        foreach ($result[0] as $item){
         array_push($ArrOne,trim(strip_tags($item)));
         }

        $stepOne = implode("Awards",$ArrOne);
        $stepTwo = explode("Awards:",$stepOne);

        if (!isset($stepTwo[1])){
            return '<pre><b>Award:</b> Not found </pre>';
        }
        $stepThree = explode("See",$stepTwo[1]);
        return $stepThree[0];


    }

    public function Director()
    {
       $result = parent::Director(); // TODO: Change the autogenerated stub

        $ArrOne = [];
        foreach ($result[0] as $item){
            array_push($ArrOne,trim(strip_tags($item)));
        }
        $stepOne = implode("path",$ArrOne);
        $stepTwo = explode("Director:",$stepOne);

        if (!isset($stepTwo[1])){
            return '<pre><b>Director:</b> Not found </pre>';
        }
        $stepThree = explode("path",$stepTwo[1]);
        return $stepThree[0];
    }

    public function Writers()
    {
        $result = parent::Writers(); // TODO: Change the autogenerated stub

        $ArrOne = [];
        foreach ($result[0] as $item){
            array_push($ArrOne,trim(strip_tags($item)));
        }
        $stepOne = implode("path",$ArrOne);
        $stepTwo = explode("Writers:",$stepOne);
        if (!isset($stepTwo[1])){
            return '<pre><b>Writers:</b> Not found </pre>';
        }

        $stepThree = explode("path",$stepTwo[1]);

        if (!isset($stepThree[0])){
            return $stepTwo[1];
        }else {
            return $stepThree[0];
        }
    }

    public function Stars(){
        $result = parent::Stars(); // TODO: Change the autogenerated stub
        $ArrOne = [];
        foreach ($result[0] as $item){
            array_push($ArrOne,trim(strip_tags($item)));
        }
        $stepOne = implode("path",$ArrOne);
        $stepTwo = explode("Stars:",$stepOne);
        if (!isset($stepTwo[1])){
            return '<pre><b>Stars:</b> Not found </pre>';
        }
        $stepThree = explode("path",$stepTwo[1]);
        if (!isset($stepThree[0])){
            return $stepTwo[1];
        }else {
            $stepFour = explode("See ",$stepThree[0]);
            return $stepFour[0];
        }
    }

    public function Title()
    {
        $result = parent::Title(); // TODO: Change the autogenerated stub
        $this->query = explode("(", $result[0]);
        if ($this->query == ""){
            return '<pre><b>Title:</b> Not found </pre>';
        }else{
            return $this->query[0];
        }

    }

    public function Rating()
    {
        $result =  parent::Rating(); // TODO: Change the autogenerated stub
        $this->query = explode("(", $result[0]);
        if ($this->query == ""){
            return '<pre><b>Rating:</b> Not found </pre>';
        }else{
            return $this->query[0];
        }
    }

    public function Vote()
    {
        $result =  parent::Vote(); // TODO: Change the autogenerated stub
        $this->query = array_shift($result);
        if ($this->query == ""){
            return '<pre><b>Vote:</b> Not found </pre>';
        }else{
            return $this->query;
        }
    }

    public function Budget()
    {
        $result =  parent::Budget(); // TODO: Change the autogenerated stub
        $patternOne = "/Budget/i";
        if (!isset($result[0])){
            return '<pre><b>Budget:</b> Not found </pre>';
        }
        $stepOne = preg_match_all($patternOne, $result[0]);

        if ($stepOne > 0){
            $SearchOne  = ["\n", "\r", "Box Office"];
            $replaceOne = [ '', '', '',];
            $resultOne   = str_replace($SearchOne, $replaceOne,  $result[0]);
            return $resultOne;
        }else{
            return '<pre><b>Budget:</b> Not found </pre>';
        }
    }

    public function Country()
    {
        $result =  parent::Country(); // TODO: Change the autogenerated stub
        $this->query = array_shift($result);
        if ($this->query == ""){
            return '<pre><b>Country:</b> Not found </pre>';
        }else{
            return strip_tags($this->query);
        }
    }

    public function Language()
    {
        $result = parent::Language(); // TODO: Change the autogenerated stub
        if (!isset($result)){
            return '<pre><b>Language:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','Language','__item', "\n", "\r",];
        $replaceOne = ['', '','','', '', '','',];

        $stepTwo   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepTwo);
    }

    public function Color()
    {
        $result = parent::Color(); // TODO: Change the autogenerated stub
        if (!isset($result)){
            return '<pre><b>Color:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item', "\n", "\r",];
        $replaceOne = ['', '','','', '', '','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Aspect_Ratio()
    {
        $result = parent::Aspect_Ratio(); // TODO: Change the autogenerated stub
              if (!isset($result)){
                  return '<pre><b>Color:</b> Not found </pre>';
              }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Aspect Ratio", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];
        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Official_Sites()
    {
        $result =  parent::Official_Sites(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Offical Sites:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Official Sites", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Runtime_M()
    {
        $result =  parent::Runtime(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Runtime Sites:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Runtime", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Locations()
    {
        $result =  parent::Locations(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Locations Sites:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Filming Locations", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Certification()
    {
        $result =  parent::Certification(); // TODO: Change the autogenerated stub
        if (!isset($result)){
            return '<pre><b>Certification Sites:</b> Not found </pre>';
        }

        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Certification", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Plot_Summary()
    {
        $result =  parent::Plot_Summary(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Plot Summary Sites:</b> Not found </pre>';
        }

        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Plot Summary", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Plot_Keywords()
    {
        $result =  parent::Plot_Keywords();  // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Plot Keywords:</b> Not found </pre>';
        }

        $stepOne = explode("See", $result);
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See All (368) &raquo;', "Plot Keywords", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepTwo   = str_replace($SearchOne, $replaceOne, $stepOne[0]);
        return self::Clean($stepTwo);
    }

    public function Taglines()
    {
        $result = parent::Taglines();  // TODO: Change the autogenerated stub
         if (!isset($result)){
             return '<pre><b>Taglines:</b> Not found </pre>';
         }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Taglines", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Genres()
    {
        $result =  parent::Genres(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Genres:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Genres", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);

    }

    public function Sound_Mix()
    {
        $result =  parent::Sound_Mix();  // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Sound Mix:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Sound Mix", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Movie_Connections()
    {
        $result =  parent::Movie_Connections(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Sound Mix:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Movie Connections", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }


    public function Soundtracks()
    {
        $result =  parent::Soundtracks(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Soundtracks:</b> Not found </pre>';
        }
        $SearchOne  = [ 'ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Soundtracks", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Crazy_Credits()
    {
        $result =  parent::Crazy_Credits(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Crazy Credits:</b> Not found </pre>';
        }
        $SearchOne  = ['ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Crazy Credits", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Quotes()
    {
        $result = parent::Quotes(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Quotes :</b> Not found </pre>';
        }
        $SearchOne  = ['ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "Quotes", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);
    }

    public function Poster()
    {
        $result = parent::Poster(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Poster:</b> Not found </pre>';
        }
        $SearchOne  = ['ipl-inline-list', 'ipl-zebra-list__label',  'ipl-zebra-list__item','__item','See more &raquo;', "src", "\n", "\r",];
        $replaceOne = ['', '','','', '', '','','','',];

        $stepOne   = str_replace($SearchOne, $replaceOne, $result);
        return self::Clean($stepOne);

    }

    public function Media($uri)
    {
        $result =  parent::Media($uri); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Media:</b> Not found </pre>';
        }

        $stepOne = "https://m.media-amazon.com/images/M/".$result[1][0];
        return $stepOne;
    }

    public function Cast()
    {
        $result = parent::Cast(); // TODO: Change the autogenerated stub

        if (!isset($result)){
            return '<pre><b>Cast:</b> Not found </pre>';
        }


        $ArrOne = [];

        $count = count($result);

        for ($i = 0; $i < $count; $i++)
        {
            array_push($ArrOne, strip_tags($result[$i]));
        }

        return $ArrOne;
    }


    public static function Clean($data){
        $data = trim($data);
        $data = rtrim($data);
        $data = ltrim($data);
        $data = strip_tags($data);

        return $data;

    }


}


?>
