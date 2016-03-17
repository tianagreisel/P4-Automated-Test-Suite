<?php
//calculator_test.php

//required to run a test case
require_once 'simpletest/autorun.php';
include 'Item.php';

class TestOfItem extends UnitTestCase 
{


    function testConstructor()
    {
        $myItem = new Item("Burrito", "Includes awesome sauce!", 7.95);
        $this->assertEqual($myItem->name, "Burrito");
        $this->assertEqual($myItem->description, "Includes awesome sauce!");
        $this->assertEqual($myItem->price, 7.95);
    
    }
    
     /* function testMultiply()
    {
        $myCalc = new Calculator();
        $this->assertEqual($myCalc->multiply(2,4), 8, 'Multiplies 2 and 4');
    
    }*/










}