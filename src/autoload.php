<?php

spl_autoload_register(function ($classname){

    include_once str_replace("\\","/", $classname) . '.php';

});

?>