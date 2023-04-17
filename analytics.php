
<?php include "sidebar.php"?>
<?php
// Connect to the MySQL database and retrieve data
$conn = mysqli_connect("localhost:3307","root", "", "modeldb");
$result = $conn->query(" SELECT Status, SUM(Amount) AS total_revenue FROM details GROUP BY Status");

// Organize the data into arrays
$labels = array();
$data1 = array();
$data2 = array();
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['Status'];
    $data1[] = $row['Status'];
    $data2[] = $row['total_revenue'];
}

// Close the MySQL connection
$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="stylesheet" href="./analytics.css">
    <link rel="stylesheet" href="./style.css">
    <!-- Include Chart.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
<div>

		 	
		 	
		</div>
<div class="main">
<!-- Create canvas element for the charts -->
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>

</div>
<div class="graphtwo">
<canvas id="myChart1" style="width:100%;max-width:700px"></canvas>
</div>

</div>
<!-- Initialize Chart.js and configure the chart options -->
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Data 1',
            data: <?php echo json_encode($labels); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },{
            label: 'Data 2',
            data: <?php echo json_encode($data2); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        title: {
            display: true,
            text: 'My Chart'
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

      const ctx1 = document.getElementById('myChart1').getContext('2d');
      
      const myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
          labels: <?php echo json_encode($data1); ?>,
          datasets: [{
            label: 'Data from MySQL Database',
            data: <?php echo json_encode($data2); ?>,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        },
        options: {
          maintainAspectRatio: false,

          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
    
    
    </body>

    </html>