<!DOCTYPE html>
<html>

<head>
  <title>Data - Stop and Search Plymouth</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="myStyleSheet.css">
  <script src="Resources/chartMin.js"></script>

    
<?php

  $fname = "../theData.csv"; 

  $f_pointer=fopen($fname,"r"); // file pointer

  //Getting the ages for the chart 
  $under10 = 0; 
  $under20 = 0; 
  $under30 = 0; 
  $under40 = 0; 
  $under50 = 0; 
  $over50 = 0; 


  while(! feof($f_pointer)){
    $ar=fgetcsv($f_pointer);

    if (is_numeric($ar[2])){

      if ((0 <= $ar[2]) && ($ar[2] <= 9)){
        $under10++; 
      }

      if ((10 <= $ar[2]) && ($ar[2] <= 19)){
        $under20++; 
      }

      if ((20 <= $ar[2]) && ($ar[2] <= 29)){
        $under30++; 
      }

      if ((30 <= $ar[2]) && ($ar[2] <= 39)){
        $under40++; 
      }

      if ((40 <= $ar[2]) && ($ar[2] <= 49)){
        $under50++; 
      }

      if ((50 <= $ar[2])){
        $over50++; 
      }

    }

  }


  function printTable($fname){
    $row = 1;
    if (($handle = fopen($fname, "r")) !== FALSE) {
      
        echo '<table width=80%>';
      
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

</head>

<body>

<?php 
  include "header.php"; 
?>


<!-- Page Container -->
<div paddding="3px" align="center">

  <br>
  <div width=80%> 

    <div>
      <h2>Data in table form:</h2>
      <?php printTable($fname) ?>
    </div>

    <br/>

    <div  class="container" >
      <h2>Age of suspect in a piechart</h2>
      <canvas id="myChart" style="display: block; float: center;"></canvas> 
    </div>
        
  </div>

  <!-- Adds a little bit of a buffer at the bottom -->
  <br/>
  <br/>
  <br/>

</div>



<!-- Script for generating the pie chart -->
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['0-9', '10-19', '20-29', '30-39', '40-49', '50+'],
          datasets: [{
              label: 'Age of person',
              data: [
                <?php echo $under10 ?> ,
                <?php echo $under20 ?>, 
                <?php echo $under30 ?>, 
                <?php echo $under40 ?>, 
                <?php echo $under50 ?>, 
                <?php echo $over50 ?>],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(10, 206, 86, 0.5)',
                  'rgba(99, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)',
                  'rgba(255, 159, 64, 0.5)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
</script>


</body>
</html>



