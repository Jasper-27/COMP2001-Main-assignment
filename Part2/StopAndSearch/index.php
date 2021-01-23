<?php
header("Content-Type: application/json"); 

echo "{ \"@context\" : { \"Place\" : \"http://schema.org\", \"SaS\" : \"http://web.socem.plymouth.ac.uk\" }, \"Place\" : [ "; 
$fname = "../theData.csv"; 

//Opening the file
$f_pointer=fopen($fname,"r");

//turning the csv into a nice array 
$header = null; 
  $line = 1; 
  
while(! feof($f_pointer)){
    $ar=fgetcsv($f_pointer);
    
    if ($line == 1){
        $header = $ar; 
       
    }else{

        if ($line == 2){
            echo "{"; 
           
        }else{
            echo ",{"; 

        }

        echo  "\"@type\": \"Place\",";
        echo "\"geo\" : { "; 
            echo "\"@type\" : \"GeoCoordinates\", "; 
            echo "\"latitude\" : \"$ar[5]\", " ; 
            echo "\"longitude\" :  \"$ar[6]\" "; 
            echo "},";  

        echo "\"$header[0] \" : \"$ar[0]\", ";
        echo "\"SaS:$header[1] \" : \"$ar[1]\", "; 
        echo "\"SaS:$header[2] \" : \"$ar[2]\", "; 
        echo "\"SaS:$header[3] \" : \"$ar[3]\", "; 
        echo "\"SaS:$header[4] \" : \"$ar[4]\" "; 

        echo "}"; 
    }
    $line++; 
}

echo "]}"


?>