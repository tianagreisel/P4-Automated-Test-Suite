<?php

/*
* This file tests the foodTruck.php file and all its functions.
*
*
* @author Tiana Greisel
* @title P4 testing
*
*/


//foodTruck_test1.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';
include 'Item.php';

/*
* This class tests the foodTruck.php file and all its major 
* functions and functionality of the form, including all 
* major paths through the code (aka, invalid form input, valid 
* form input, etc.) to make sure the foodTruck.php file is 
* functioning properly.
*
*/
class FoodTruckFormTests extends WebTestCase {

    /*
    * This functions tests the contact form to make sure that
    * when the input fields are set to certain values and the 
    * submit button is hit, that the form goes to the correct page
    * and that those field values are set to what the user enters.
    */
    function testContactSubmit() {
        
        $this->get(VIRTUAL_PATH . '/foodTruck.php');

        $this->assertResponse(200);

        $this->setField("itemType[]", "burrito");
        $this->setField("quantity['burrito']", 3);
        
        $this->clickSubmitByName("submit");

        $this->assertResponse(200);
        
    }

    /**
     * This function tests that when the user enters
     * invalid data that the correct error messages 
     * get displayed. Checks that when the user enters no values
     * into the fields and hits submit that the correct error
     * message gets displayed.
     *
     */
    function testNofields(){
        $this->get(VIRTUAL_PATH . '/foodTruck.php');
        $this->clickSubmitByName("submit");
        $this->assertResponse(200);
        $this->assertText("Please select at least one item to purchase");
    }

    /*
    * This function test that when the user enters invalid data
    * data, enters a string instead of a number for the quantity
    * field that the correct error message is displayed.
    *
    */
    function testBadData(){
        $this->get(VIRTUAL_PATH. '../../foodTruck.php');
        $this->setField('itemType[]','burrito');
        $this->setField('quantity["burrito"]','r');
        $this->clickSubmitByName("submit");
        $this->assertResponse(200);
        $this->assertText("Please select at least one item to purchase");
    }

    /*
    * This function test that when the user enters invalid data
    * data, enters a quantity of zero for the quantity
    * field that the correct error message is displayed.
    *
    */
    function testBadData2(){
        $this->get(VIRTUAL_PATH. '../../foodTruck.php');
        $this->setField('itemType[]','burrito');
        $this->setField('quantity["burrito"]', 0);
        $this->clickSubmitByName("submit");
        $this->assertResponse(200);
        $this->assertText("Please select at least one item to purchase");
    }
    
      /*
    * This function test that when the user enters invalid data
    * data, enters a quantity of zero for the quantity
    * field that the correct error message is displayed.
    *
    */
    function testBadData3(){
        $this->get(VIRTUAL_PATH. '../../foodTruck.php');
        $this->setField('itemType[]','burrito');
        $this->setField('quantity["burrito"]', -1);
        $this->clickSubmitByName("submit");
        $this->assertResponse(200);
        $this->assertText("Please select at least one item to purchase");
    }
    
 
    /*
    * This fucntion makes sure that when the user enters
    * values in the fields that those field values are 
    * being set correctly.
    *
    *
    */
    function testInvalidSubmit(){  
        $this->assertFieldValue('itemType[]',"burrito","burrito","message goes here.");
        $this->assertFieldValue('quantity["burrito"]',3,3,"another message");
    }

}