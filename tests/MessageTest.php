<?php

    /**
        @backupGlobals disabled
        @backupStaticAttribute disabled
    */

    require_once 'src/Message.php';
    require 'setup.config';

    $DB = new PDO('pgsql:host=localhost;dbname=message_test', $DB_USER, $DB_PASS);

    class MessageTest extends PHPUnit_Framework_TestCase
    {
        function tearDown() {
            Message::deleteAll();
        }

        function test_save()
        {
            //arrange
            $new_message = new Message("This is a message");

            //act
            $new_message->save();
            $result = Message::getAll();

            //assert
            $this->assertEquals($new_message, $result[0]);

        }

        function test_getAll()
        {
            //arrange
            $new_message = new Message("Message1");
            $new_message2 = new Message("Message2");
            $new_message->save();
            $new_message2->save();

            //act
            $result = Message::getAll();

            //assert
            $this->assertEquals([$new_message, $new_message2], $result);
        }

        function test_deleteAll()
        {
            //arrange
            $new_message = new Message("Message1");
            $new_message->save();

            //act
            Message::deleteAll();

            $result = Message::getAll();

            //assert
            $this->assertEquals([], $result);
        }

        function test_getText()
        {
            //arrange
            $new_message = new Message("Hello");

            //act
            $text = $new_message->getText();

            //assert
            $this->assertEquals("Hello", $text);
        }

        function test_setText()
        {
            //arrange
            $new_message = new Message("Hello");

            //act
            $new_message->setText("Bye");
            $text = $new_message->getText();

            //assert
            $this->assertEquals("Bye", $text);
        }

        function test_getId()
        {
            //arrange
            $new_message = new Message("Hello", 3);

            //act
            $result = $new_message->getId();

            //assert
            $this->assertEquals(3, $result);
        }

        function test_setId()
        {
            //arrange
            $new_message = new Message("Hello", 3);

            //act
            $new_message->setId(10);
            $result = $new_message->getId();

            //assert
            $this->assertEquals(10, $result);
        }
    }


 ?>
