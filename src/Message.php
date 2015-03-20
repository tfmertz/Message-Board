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
            $statement = $GLOBALS['DB']->query("INSERT INTO messages (text) VALUES ('{$this->getText()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        //get all our messages from the database
        static function getAll()
        {
            $rows = $GLOBALS['DB']->query("SELECT * FROM messages;");
            $messages = array();
            foreach($rows as $row)
            {
                $id = $row['id'];
                $text = $row['text'];
                $new_message = new Message($text, $id);
                array_push($messages, $new_message);
            }
            return $messages;
        }

        //delete all the information from our messages table
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM messages *;");
        }
    }



 ?>
