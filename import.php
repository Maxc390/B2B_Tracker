<?php 
/*include_once("dbconfig.php");*/

$conn=mysqli_connect("localhost:3307","root","","modeldb");

if(isset($_POST["importcsv"])){

    $file = $_FILES["csv_file"]["tmp_name"];
    $handle = fopen($file,"r");

    while ($row = fgetcsv($handle)) {

        $id = $row[0];
        $response = $row[1];

        $sql = "UPDATE table SET response = ? WHERE id = ?";
        $update_data_stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($update_data_stmt, $sql)){
            die("Something went wrong with the upload. " . mysqli_error($connection));
        } else {
            mysqli_stmt_bind_param($update_data_stmt, "ss", $response, $id);
            mysqli_stmt_execute($update_data_stmt);
            if ($id == "ID" && $response == "Response"){
                echo "";
            } else {
                echo "Lead <b>{$id}</b>'s response was updated to <b>{$response}</b>.</p>";
            }
        }

    }

}

?>

<form class ="form-horizoontal" actions="" method="post" name ="uploadCsv" enctype="multipart/form-data">
<div> 
<label> Choose CSV File</label> 
<input type="file" name="file" accept=".csv">
<button type="submit" name="import">import</button>

</div>

</form>
