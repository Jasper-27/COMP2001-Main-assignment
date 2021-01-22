<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Home - Stop and Search Plymouth</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <!-- <link rel="stylesheet" href="w3.css"> -->
  <link rel="stylesheet" href="myStyleSheet.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
  <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="Resources/chartMin.js"></script>


    
<?php



echo "{ \"@context\" : { \"Place\" : \"http://schema.org\", \"SaS\" : \"http://web.socem.plymouth.ac.uk\" }, \"Place\" : [ { \"@type\" : \"Place\","; 

echo   "\"geo\": {
    \"@type\" : \"GeoCoordinates\",
    \"latitude\" : ,
    \"longitude\" : 
}, " ; echo "<br/>"; 



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
        echo "\"$header[0] \" : \"$ar[0]\", "; echo "<br/>";
        echo "\"mdw:$header[1] \" : \"$ar[1], "; echo "<br/>"; 
        echo "\"mdw:$header[2] \" : \"$ar[2], "; echo "<br/>";
        echo "\"mdw:$header[3] \" : \"$ar[3], "; echo "<br/>";
        //echo "\"mdw:$header[4] \" : \"$ar[4], "; echo "<br/>";
        echo "\"geo\" : { ";  echo "<br/>" ;
        echo "\"@type\" : \"GeoCoordinates\", "; 
        echo "\"latitude\" : \"$ar[4]\", " ; 
        echo "\"longitude\" :  \"$ar[5]\", "; 
        echo "},";  


    }
 
    $line++; 

    //outputting as json-ld

    // echo "\"name\" : $ar[1]"

}

echo "]"


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