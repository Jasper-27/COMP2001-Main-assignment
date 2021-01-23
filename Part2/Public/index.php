<!DOCTYPE html>
<html>

<head>
    <title>Home - Stop and Search Plymouth</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Resources/myStyleSheet.css">
</head>

<body>

<?php 
  include "header.php"; 
?>


  <!-- Page Container -->
  <div class="w3-content" align="center">


    <div align="center">
      <h1>Jasper's linked data application </h1>
    </div>
    <!-- Links --> 
    <div class="container" align="left">
      <h2> Data: </h2> <a href="https://plymouth.thedata.place/dataset/plymouth-stop-search-data/resource/57e2507e-7342-4cb1-b284-014caaa463a2" target="_blank">Plymouth stop and search by www.dataplymouth.co.uk.</a> 
    </div>

    <!-- Project vision --> 
    <div class="container" align="left" >
      <h3> Project vision </h3>
      <p>
        This project is designed to show which ages groups are subject to stop and searches more than others. It does this by providing an easy to read pie chart. 
      </p>
    </div>

    <div class="container" align="center">
      <button class="button" onclick="window.location.href='data.php'">
        View the data
      </button>
    </div>

</body>
</html>