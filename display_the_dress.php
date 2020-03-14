<html>

<style>
.head {
  font-family: "Times New Roman";
  color: rgb(200,55,0);
}

.title {
  font-family: "Times New Roman";
  color: rgb(0,200,55);
}

.words{
  font-family: "Times New Roman";
}
</style>

<body>
<?php
include('header.php');
include_once 'db_configuration.php';

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
      print( '<h1 class= "head">'.$row["name"]. '</h1>
              <h3 class= "title"> Description: </h3><p class= "words" >'.$row["description"]. '</p>
              <h3 class= "title"> Did You Know? </h3><p class= "words">' .$row["did_you_know"]. '</p>
              <h3 class= "title"> Category </h3><p class= "words">' .$row["category"]. '</p>
              <h3 class= "title"> Type </h3><p class= "words">' .$row["type"]. '</p>
              <h3 class= "title"> State Name </h3><p class= "words">' .$row["state_name"]. '</p>
              <h3 class= "title"> Key Words </h3><p class= "words">' .$row["key_words"]. '</p>');
    }
} else {
  print('no data');
}


?>
</body>
</html>
