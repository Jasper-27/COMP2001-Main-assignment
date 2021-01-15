<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Jasper's Linked data application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- <link rel="stylesheet" href="w3.css"> -->
    <link rel="stylesheet" href="myStyleSheet.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color:  #212121 ;
}

tr:nth-child(odd) {
  background-color: #3f3f3f;
}
</style>
</head>

<?php

$fname = "theData.csv"; 

function csvToJson($fname) {
  // open csv file
  if (!($fp = fopen($fname, 'r'))) {
      die("Can't open file...");
  }

  //read csv headers
  $key = fgetcsv($fp,"1024",",");

  // parse csv rows into array
  $json = array();
  while ($row = fgetcsv($fp,"1024",",")) {
      $json[] = array_combine($key, $row);
  }

  // release file handle
  fclose($fp);

  // encode array to json
  return json_encode($json);
}

function printTable($fname){
  $row = 1;
  if (($handle = fopen($fname, "r")) !== FALSE) {
    
      echo '<table>';
    
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          if ($row == 1) {
              echo '<thead><tr>';
          }else{
              echo '<tr>';
          }
        
          for ($c=0; $c < $num; $c++) {
              //echo $data[$c] . "<br />\n";
              if(empty($data[$c])) {
                $value = "&nbsp;";
              }else{
                $value = $data[$c];
              }
              if ($row == 1) {
                  echo '<th>'.$value.'</th>';
              }else{
                  echo '<td>'.$value.'</td>';
              }
          }
        
          if ($row == 1) {
              echo '</tr></thead><tbody>';
          }else{
              echo '</tr>';
          }
          $row++;
      }
    
      echo '</tbody></table>';
      fclose($handle);
  }
}

?>


<body>

<?php 
  include "header.php"; 
?>


<!-- Page Container -->
<div width="200" align="center">

  <br>

  <div align="center">
    <h1>Jasper's linked data application </h1>
  </div>
  
  <br>
  <br>
  <br>

  <div width="100">
    <?php printTable($fname) ?>
  </div>

</div>

        <script>
        </script>

</body>
</html>