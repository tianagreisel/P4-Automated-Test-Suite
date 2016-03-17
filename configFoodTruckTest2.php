<?php
/**
 *  This file tests the configFoodTruck.php file in the P2_foodTruck
 * application.  This function needs to be fixed because it is
 * failing.
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
   * This function tests the makeForm() method making sure it
   * dynamically creates a form based on the Item objects supplied
   * as an array as a parameter to the function.
   * 
   *
   *
   */
   function testMakeForm(){
        //$this->get(VIRTUAL_PATH . '../../configFoodTruck.php');
 

        $form = '<form method="post" action="THIS_PAGE"> 
        
        <table border="1" style="width:50%"> <tr>
    <td>Select Items</td>
    <td>Quantity</td>
    <td>Item</td>
    <td>Description</td>
    <td>Price</td>
    </tr><tr><td><input type="checkbox" name="itemType[]" value="Burrito"</td>
    <td><input type="text" name="quantity[Burrito]" /></td>
    <td>Burrito</td>
    <td>Includes awesome sauce!</td>
    <td>$7.95</td>
    </tr><tr><td><input type="checkbox" name="itemType[]" value="Taco"</td>
    <td><input type="text" name="quantity[Taco]" /></td>
    <td>Taco</td>
    <td>Includes cheese and lettuce</td>
    <td>$3.95</td>
    </tr><tr><td><input type="checkbox" name="itemType[]" value="Fried Ice Cream"</td>
    <td><input type="text" name="quantity[Fried Ice Cream]" /></td>
    <td>Fried Ice Cream</td>
    <td>Includes free sprinkles!</td>
    <td>$2.95</td>
    </tr><tr><td></td><td></td><td></td><td></td><td><input type="submit" name="submit" value="Submit Order" /></td></tr></table></form>';
       
       
       
       
        //array to hold items
$itemsTest[] = new Item("Burrito", "Includes awesome sauce!", 7.95);
$itemsTest[] = new Item("Taco", "Includes cheese and lettuce", 3.95);
$itemsTest[] = new Item("Fried Ice Cream", "Includes free sprinkles!", 2.95);

        
        
        
        $this->assertEqual(trim($form), trim(makeForm($itemsTest)));

    }

    
}