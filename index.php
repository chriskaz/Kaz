<?php
/* This class reads a set of over 50 numbers, rejects any duplicates, 
 *then prints out the count of numbers, the least, greatest, and average.
 *------------------------------------------------------------------------------
 *Displays text, input field, and a submit button. After the user submits, 
 *"userData" and "submitButton" will be stored as superglobals in the
 *$_GET and $_POST arrays.  
 *----------------------------------------------------------------------------*/ 
if (!isset($_POST['submitButton'])){    //If submitButton isn't stored in $_POST       
    print("<h2>Enter Data</h2>");     
    print("<form method=\"post\">\n"); 
    print("Enter Data: <input type=\"text\" name=\"userData\"/><br />");
    print("<input type=\"submit\" name=\"submitButton\" value=\"Submit\" />");
    print("</form>\n");
}/* End If bracket
//------------------------------------------------------------------------------
/* Places user submited data 'userData' as a parameter in getValues() function,
 * which returns the float values ($count,$max,$min,$avg), places them into
 * a list, and finally prints out the returned values.
 * @param float $count
 * @param float $max
 * @param float $min
 * @param float $avg
 *----------------------------------------------------------------------------*/ 
else{       
    list($count,$max,$min,$avg) = getValues($_POST['userData']); 
    echo "Counted Value: $count Max Value: $max Min Value: $min 
            Average Value: $avg";        
}/* End If bracket    
 *------------------------------------------------------------------------------
 * Gets the the values for count, max, min, and avg for the user. * 
 * @param string @userData
 * @return array of floats containing needed values ($count,$max,$min,$avg) 
 *----------------------------------------------------------------------------*/
function getValues ($userData) {  
    //Removes all whitespace characters via pattern matching, then places 
    //the substring that now hold the proper numerical value into $stringArray 
    $stringArray = preg_split("/[\s,]+/", $userData);
    
    //Converts string values to float values, placing them into $tempArray
    $tempArray = [];     
    foreach($stringArray as $element)
        $tempArray[] = floatval($element);
    
    //Removes duplicate numbers, places the final values into $dataArray
    $dataArray = array_unique($tempArray);
    //Sorts $dataArray
    asort($dataArray);    
    /*/*Obtains needed float values by using built-in functions, then returns 
     * float values in the following order ($count,$max,$min,$avg)*/
    return array((count($dataArray)),(max($dataArray)),
        (min($dataArray)),((array_sum($dataArray))/(count($dataArray)))); 
}//End getValues bracket
?>