<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="./analytics.css">
    
    <link rel="stylesheet" href="./style.css">

  <head>
    <body>
<div class="main">     
<form method="post" action="search_function.php">
  <input type="text" name="search" id="search" placeholder="Enter keyword...">
  <button type="submit">Search</button>

  <div class="button">
		 	<a href="./dash.php" class="btn">BACK</a>
  </div>
</body>
</form>
</html>
  <?php
// Connect to MySQL database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "modeldb";
$conn = mysqli_connect("localhost:3307","root", "", "modeldb");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, $dbname);

if (isset($_POST['search'])) {

// Get search term from form
$search_term = mysqli_real_escape_string($conn, $_POST['search']);}

if (empty($_POST['name'])) {
        $errors['name'] = 'Name required';
    }

// Construct SQL query
$sql = "SELECT * FROM details WHERE Name LIKE '%$search_term%'";

// Execute SQL query
$result = mysqli_query($conn, $sql);

// Retrieve results
//Display table
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['customer_id'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Status'] . "</td>";
  echo "<td>" . $row['Amount'] . "</td>"; 
  echo "<td>" . $row['Contact']. "<td>";
  echo "</tr>";
}
echo "</table>";

// Close database connection
mysqli_close($conn);

?>



