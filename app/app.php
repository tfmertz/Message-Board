<?php

    require_once __DIR_.'/../vendor/autoload.php';


    $app = new Silex\Application();


    $app->get("/", function() {

        return "HEYHEYHEY";
    });


    return $app;

 ?>
