<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Message.php';
    require __DIR__.'/../setup.config';

    $app = new Silex\Application();

    $app['debug'] = true;

    //include a 'setup.confg' php file with variables $DB_USER and $DB_PASS to connect to your
    //local database, this file will be ignored from commits
    $DB = new PDO('pgsql:host=localhost;dbname=message_db', $DB_USER, $DB_PASS);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {

        //grab all our messages to display on our homepage
        $messages = Message::getAll();
        return $app['twig']->render('homepage.twig', array('message_array' => $messages));
    });

    $app->post("/add_message", function() use ($app) {

        $new_message = new Message(htmlspecialchars($_POST['message']));
        $new_message->save();

        $messages = Message::getAll();

        return $app['twig']->render('homepage.twig', array('message_array' => $messages));
    });

    $app->post("/delete_messages", function() use ($app) {
        Message::deleteAll();

        return $app['twig']->render('homepage.twig', array('message_array' => []));
    });


    return $app;

 ?>
