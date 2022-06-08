<?php 
require 'bin/functions.php';
require 'db_configuration.php';
include('header.php');
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "abcd_db");

if(isset($_POST["upload"])){
    $fileName = $_FILES["file"]["tmp_name"];
    $deleterecords = "TRUNCATE TABLE dresses";
    mysqli_query($conn, $deleterecords);
    $count = 0;
    if($_FILES["file"]["size"] > 0){
        $file = fopen($fileName, "r");
        
        
        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            if($count >= 1) {
                $sqlInsert = "Insert into dresses (id, name, description, did_you_know, category, type, state_name, key_words, image_url, status, notes) values ('" . $column[0] . "', '" . $column[1]. "', '" . $column[2]. "', '" . $column[3]. "', '" . $column[4]. "', '" . $column[5]. "', '" . $column[6]. "', '" . $column[7]. "', '" . $column[8]. "', '" . $column[9]. "', '" . $column[10]. "')";
            
                $result = mysqli_query($conn, $sqlInsert);
            
                if(!empty($result)){
                    continue;
                }else{
                    echo "Error occured while importing csv";
                }
            }
            $count = $count + 1;
        }
        fclose($file);
    }
}

?>

<form class="form-horizontal" action="" method="post" name="uploadCSV" enctype="multipart/form-data">

<div>
<label> Import CSV File </label>
<input type="file" name="file" accept=".csv">
<button type="submit" name="upload">Upload</button>

</div>
</form>
