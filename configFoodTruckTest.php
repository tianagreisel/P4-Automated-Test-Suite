<?php
/**
 *  This file tests the configFoodTruck.php file in the P2_foodTruck
 * application.  
 *
 *
 *@author Tiana Greisel
 *@title P4 testing
 *
 */

include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';
require_once 'simpletest/unit_tester.php';
include 'Item.php';
include 'configFoodTruck.php';


/*
* This class tests the configFoodTruck.php file and 
* tests all the functions within the file.
*
*/
class configFoodTruckTest extends WebTestCase
{

    /**
    *  This fucntion tests the calculateTotal() function making sure
    * that the function properly calculates the total of an order based
    * on the array of Item objects and the quantity purchased supplied
    * as parameters to the function.
    *
    *
    */
    function testCalculateTotal()
    {
        //$this->get(VIRTUAL_PATH . '../../configFoodTruck.php');

        $itemsTest = array(
            new Item('burrito', 'burrito', 6),
            new Item('taco', 'taco', 4)
        );

        $purchased = array(
            'burrito' => 3,
            'taco' => 2
        );

       $this->assertEqual(calculateTotal($purchased, $itemsTest), 26);
    }
    /**
    *
    * This function test the display order function to make sure it
    * displays the output of the form input correctly calculating
    * total, subtotal, and so forth.
    *
    */
    function testDisplayOrder(){
       //array to hold items
$itemsTest[] = new Item("Burrito", "Includes awesome sauce!", 7.95);
$itemsTest[] = new Item("Taco", "Includes cheese and lettuce", 3.95);
$itemsTest[] = new Item("Fried Ice Cream", "Includes free sprinkles!", 2.95);
        
           $itemsPurchased = array(
            'Burrito' => 1,
            'Taco' => 1,
            'Fried Ice Cream'  => 1
        );


        
        $formAfterSubmit = '<table border="1" style="width:50%">
    <tr>
    <td>Quantity</td>
    <td>Item</td>
    <td>Price</td>
    <td>Item Total</td>
    </tr><tr><td>1</td>
    <td>Burrito</td>
    <td>7.95</td>
    <td>$7.95</td>
    
    </tr><tr><td>1</td>
    <td>Taco</td>
    <td>3.95</td>
    <td>$3.95</td>
    
    </tr><tr><td>1</td>
    <td>Fried Ice Cream</td>
    <td>2.95</td>
    <td>$2.95</td>
    
    </tr><tr><td></td><td></td><td>Subtotal</td><td>$14.85</td></tr>
                <tr><td></td><td></td><td>Tax</td><td>$1.41</td></tr>
        <tr><td></td><td></td><td>Total</td><td>$16.26</td></tr></table>';
        
    
    
    $this->assertEqual(trim($formAfterSubmit),trim(displayOrder($itemsPurchased, $itemsTest)));
                       
    }
}