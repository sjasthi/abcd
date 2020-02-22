
<?php $page_title = 'Modify Dress'; ?>
<?php $page_title = 'ABCD Master > Modify Dresses'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="list_dresses.php";
    //verifyLogin($page);

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>

<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM dresses
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
      }

      echo '<h2 id="title">Modify Dress</h2><br>';
      echo '<form action="modify_the_dress.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>'.$row["name"].' </h3> <br>
      
      <div>
        <label for="id">Id</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="category">Description</label>
        <input type="text" class="form-control" name="description" value="'.$row["description"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="level">Did you know? 1</label>
        <input type="text" class="form-control" name="did_you_know" value="'.$row["did_you_know"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="facilitator">Category</label>
        <input type="text" class="form-control" name="category" value="'.$row["category"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="description">Type</label>
        <input type="text" class="form-control" name="type" value="'.$row["type"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="required">State name</label>
        <input type="text" class="form-control" name="state_name" value="'.$row["state_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="optional">Key words</label>
        <input type="text" class="form-control" name="key_words" value="'.$row["key_words"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div class="form-group col-md-4">
        <label for="cadence">New Image Path (Not Required)</label>
        <input type="file" name="fileToUpload" id="fileToUpload" maxlength="255">
      </div>
      <input type="hidden" class="form-control" name="oldimage" value="'.$row["image_url"].'" maxlength="255" required>
      <br>
      <div class="text-left">
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Dress</button>
      </div>
      <br> <br>
      
      </form>';
    
    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


