<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Jasper's Linked data application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="myStyleSheet.css">
    <link rel="stylesheet" href="w3.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
</head>

<body>


<?php
$f_pointer=fopen("data.csv","r"); // file pointer

$num = 0; 

while(! feof($f_pointer)){
  $ar=fgetcsv($f_pointer);
  $num ++; 
  echo "Line $num "; 

  echo print_r($ar); // print the array 
  echo "<br>";
}
?>






  <!-- Page Container -->
  <div class="w3-content" >

    <div align="center">
      <h1>Jasper's linked data application </h1>
    </div>

    
     
  </div>



  <script>
   
  </script>

</body>
</html>