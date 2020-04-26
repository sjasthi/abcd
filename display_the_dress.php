<html>

<style>
.head {
  font-family: "Times New Roman";
  color: darkgoldenrod;
  text-align: center;
}

.title {
  font-family: "Times New Roman";
  color: rgb(0,200,55);
  font-size: 1.5rem;
}

.words{
  font-family: "Times New Roman";
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.image {
    height: 300px;
    padding: 8px 8px 8px 8px;
}
</style>

<body>
<div class="container">
<?php
include('header.php');
include_once 'db_configuration.php';

if (isset($_GET['fav_status'])) {

  $fav_status = mysqli_real_escape_string($db, $_GET['fav_status']);
  if ($fav_status == "COOKIE_NOT_FOUND")
  {
    echo "Cookie Not Found. Using the system's default";
  }
  if ($fav_status == "DRESS_NOT_FOUND")
  {
    echo "Dress Not Found. Using the system's default";
  }
}

if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($db, $_GET['id']);
    $sql = "SELECT * FROM `dresses` WHERE id = " . $id;
    $GLOBALS['row_data'] = mysqli_query($db, $sql);
} 
else if(isset($_GET['name'])) {

    $name = mysqli_real_escape_string($db, $_GET['name']);
    $sql = "SELECT * FROM `dresses` WHERE name = '" . $name ."'";
    $GLOBALS['row_data'] = mysqli_query($db, $sql);
}

if ($row_data->num_rows > 0) {
    // fetch row_data from $_Globals
    while($row = $row_data->fetch_assoc()) {
      print( '<h2 class= "head">'.$row["name"]. '</h2>');
      echo("<image class = 'image' src = images/dress_images/".$row["image_url"]. "></image>");    
      print( '<h3 class= "title"> Description: </h3><p class= "words" >'.$row["description"]. '</p>
              <h3 class= "title"> Did You Know? </h3><p class= "words">' .$row["did_you_know"]. '</p>
              <h3 class= "title"> Category </h3><p class= "words">' .$row["category"]. '</p>
              <h3 class= "title"> Type </h3><p class= "words">' .$row["type"]. '</p>
              <h3 class= "title"> State Name </h3><p class= "words">' .$row["state_name"]. '</p>
              <h3 class= "title"> Key Words </h3><p class= "words">' .$row["key_words"]. '</p>
              <h3 class= "title"> Status </h3><p class= "words">' .$row["status"]. '</p>
              <h3 class= "title"> Notes </h3><p class= "words">' .$row["notes"]. '</p>' );
    }
} else {
  print('no data');
}

?>
</div>
</body>
</html>
