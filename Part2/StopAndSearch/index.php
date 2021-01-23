<!DOCTYPE html>
<html>

<head>
  <title>data</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
<?php



echo "{ \"@context\" : { \"Place\" : \"http://schema.org\", \"SaS\" : \"http://web.socem.plymouth.ac.uk\" }, \"Place\" : [ "; 




  $fname = "theData.csv"; 

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
            echo "{"; echo "<br/>" ; 
           
        }else{
            echo ", <br/> {"; echo "<br/>" ; 

        }

       

        echo  "\"@type\": \"Place\","; echo "<br/>" ; 
        echo "\"geo\" : { ";  echo "<br/>" ;
            echo "\"@type\" : \"GeoCoordinates\", "; 
            echo "\"latitude\" : \"$ar[4]\", " ; 
            echo "\"longitude\" :  \"$ar[5]\" "; 
            echo "},";  

        echo "\"$header[0] \" : \"$ar[0]\", "; echo "<br/>";
        echo "\"SaS:$header[1] \" : \"$ar[1]\", "; echo "<br/>"; 
        echo "\"SaS:$header[2] \" : \"$ar[2]\", "; echo "<br/>";
        echo "\"SaS:$header[3] \" : \"$ar[3]\" "; echo "<br/>";
        //echo "\"mdw:$header[4] \" : \"$ar[4], "; echo "<br/>";

        echo "}"; 
       


    }
 
    $line++; 

    //outputting as json-ld

    // echo "\"name\" : $ar[1]"

}

echo "]}"


?>

</head>

</html>



<!-- "name" : "Millbay Park",
                "mdw:area" : "0.17",
                "mdw:Site_Type" : "Amenity"},{ "@type" : "Place",
                "geo": {
                    "@type" : "GeoCoordinates",
                    "latitude" : 50.370332,
                    "longitude" : -4.138688
                 }, -->