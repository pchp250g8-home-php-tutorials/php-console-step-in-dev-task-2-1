<?php
    // Data input
    print("Enter the safety limits for readings\r\n"); 
    print("Lower limit: "); 
    $a = intval(fgets(STDIN)); 
    print("Upper limit: "); 
    $b = intval(fgets(STDIN)); 
    print("Enter orbital station sensor readings\r\n"); 
    print("0 - end data input\r\n"); 
    $n = intval(fgets(STDIN)); // Input the first interference level value
    $c = 0; // Counter for safe readings
    $d = 0; // Variable to store the length of the safe reading segment
    $max_len = 0; // Maximum length of the safe reading segment
    while ($n != 0)  // Input readings until the value is 0
    {
        if (($n >= $a) && ($n <= $b))  // Condition for safe readings
        {
            $c++; // Increment safe reading counter
        }
        else
        {
            $d = $c; // If readings are unsafe, store the count of safe ones
            $c = 0; // and reset the counter
        }
        /* Determine the maximum length of the segment
        where readings are safe. If the counter was reset
        (breaking the chain of safe data), the maximum length
        is the old counter value (variable "d"). 
        Otherwise, it is the current (new) counter value
        (variable "c"). Intermediate result */
        if ($d > $c)
        {
            $m = $d; 
        }
        else
        {
            $m = $c; 
        }
        // Maximum length of the segment where readings are safe. 
        // Final answer. 
        if ($m > $max_len)
        {
            $max_len = $m; 
        }
            
        $n = intval(fgets(STDIN)); // input the next batch of data
    }
    // Output information to the screen. 
    print("Length of the interval where all readings are safe: " . 
         $max_len . "\r\n");
?>