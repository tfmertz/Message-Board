<?php

    class Message
    {
        private $text;
        private $id;

        function __construct($input_text, $id = null)
        {
            $this->text = $input_text;
            $this->id = $id;
        }

        function getText()
        {
            return $this->text;
        }

        function setText($new_text)
        {
            $this->text = $new_text;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }

        //save $this to the database
        function save()
        {

        }

        //get all our messages from the database
        static function getAll()
        {

        }
    }



 ?>
