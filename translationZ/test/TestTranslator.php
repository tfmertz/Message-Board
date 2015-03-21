<?php
    require_once "scr/Translate.php";

    class TestTranslator extends PHPUnit_Framework_TestCase
    {

        function test_NumberOne(){
        //Arrange
        $test_SingleWord = new Translate;
        $input = "a";



        //Act
        $result = $test_Singleword->makeTranslate($input);


        //Assert
        $this->assertEquals("d", $result);


    };
    };
?>
