<?php

    require_once 'src/Message.php';

    class MessageTest extends PHPUnit_Framework_TestCase
    {

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
    }


 ?>
