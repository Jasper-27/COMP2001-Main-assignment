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
  <div class="mainContainer" align="center">


    <div>
      <h1>Plymouth Stop and Search</h1>
    </div>

    <br/>

    <!-- Project vision --> 
    <div>
      <h3> Project Vision </h3>
      <p>
        This project is designed to show which ages groups are subject to stop and searches more than others. It does this by providing an easy to read pie chart. 
      </p>
    </div>

    <br/>

    <!-- Links --> 
    <div>
      <h3>The Data </h3> 
      <p>This application uses the Plymouth Stop and Search data 2019 dataset provided by Devon and Cornwall police. It can be found at: </p>
      <a href="https://plymouth.thedata.place/dataset/plymouth-stop-search-data/resource/57e2507e-7342-4cb1-b284-014caaa463a2" target="_blank">Plymouth stop and search by www.dataplymouth.co.uk.</a>
      <br/><br/>
      <p>This data is also available in JSON-LD format <a href="../StopAndSearch/index.php">here</a></p>
    </div>

    <br/>

    <div>
      <button class="button" onclick="window.location.href='data.php'">
        View the data
      </button>
    </div>

  </div>  

</body>
</html>