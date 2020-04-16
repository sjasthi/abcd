<?php
if (isset($_POST['row_count'])){
    $rows =  $_POST['row_count'];
}

if (isset($_POST['dresses_count'])){
    $dress_count = $_POST['dresses_count'];
}

if (isset($_POST['fav_dress'])){
    $dress = $_POST['fav_dress'];
}
$row_count_cookie_name = "row_count";
$dresses_count_cookie_name = "dresses_count";
$favorite_dress_cookie_name = "favorite_dress";

setcookie($row_count_cookie_name, $rows, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie($dresses_count_cookie_name, $dress_count, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie($favorite_dress_cookie_name, $dress, time() + (86400 * 30), "/"); // 86400 = 1 day
    
header('location: index.php?preferencesUpdated=Success');

?>
