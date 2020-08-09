<<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

ob_start();
$page_title = ' Project ABCD > My favorite';
include('header.php'); 
require 'bin/functions.php';
require 'db_configuration.php';
$cookie_name = "favorite_dress";

?>
<html>
<body>
<h2 id="title">Favorite Dress</h2><br>
<?php

if(!isset($_COOKIE[$cookie_name])) {
     echo "Your favorite dress is not set. You can set your favorite dress in preferences.";
     echo "Using the system default.";
     $fav_status = "COOKIE_NOT_FOUND";
     $favoriteDressName = "Saree";
} 
else{
    $favoriteDressName = $_COOKIE[$cookie_name];
    $fav_status = "COOKIE_N_DRESS_ARE_FOUND";
    $sql_query = "SELECT `name` FROM dresses WHERE `name` = '$favoriteDressName'";
    $mysqli_result = $db->query($sql_query);
 
    // If the dress doesn't exist, we will get EMPTY result_set
    $num_rows = mysqli_num_rows($mysqli_result);
    if ( $num_rows == 0) {
        echo "Your favorite dress doesn't exist in the database";
        echo "Using the system default.";
        $fav_status = "DRESS_NOT_FOUND";
        $favoriteDressName = "Saree";
    } 
}

// By the time we come here, we will have either system default or correct preferrence from cookie
header('location: display_the_dress.php?name='.$favoriteDressName.'&fav_status='.$fav_status);

?>
</body>
</html>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>