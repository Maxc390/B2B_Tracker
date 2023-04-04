<!DOCTYPE html>
<html>
  <head>
    <title>Chart.js Example</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
  <div class="main">  
    <div class="header">
  <h1>Data Visualisations</h1></div>
    
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    <script>
      // Use PHP to fetch data from MySQL database and pass it to JavaScript as a JSON object
      <?php
        // Connect to your MySQL database
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "modeldb";
        $conn = mysqli_connect("localhost:3307","root", "", "modeldb");
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // Fetch data from table
        $sql = "SELECT * FROM details";
        $result = $conn->query($sql);
        
        // Convert data to JSON format
        $data = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $data[] = $row["Amount"];
          }
        }
        $conn->close();
        $json_data = json_encode($data);
      ?>
      
      // Use JavaScript to create chart with data from MySQL database
      const data = <?php echo $json_data; ?>;
      const ctx = document.getElementById('myChart').getContext('2d');
      
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Amount', 'Name'],
          datasets: [{
            label: 'Data from MySQL Database',
            data: data,
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
   
  <div> 
    <h2> Partitions </h2></div>
    </div>
</body>
</html>
