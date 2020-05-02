<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
require 'bin/functions.php';
require 'db_configuration.php';
include('header.php');
?>

<html>

<head>
    <title>ABCD</title>
</head>
<style>
    .image {
        /* width: 125px;
        height: 175px; */
        width: 250px;
        height: 350px;
        padding: 8px 8px 8px 8px;
        transition: transform .2s;
    }

    .image:hover {
        abc transform: scale(1.2)
    }

    #table_1 {
        border-spacing: 300px 0px;
    }

    #table_2 {
        margin-left: auto;
        margin-right: auto;
    }

    #silc {
        width: 300;
        height: 85;
    }

    #welcome {
        text-align: center;
    }

    #directions {
        text-align: center;
    }

    #title {
        color: black;
        text-align: center;
    }

    a:visited,
    a:link,
    a:active {
        text-decoration: none;
    }

    #title2 {
        text-align: center;
        color: darkgoldenrod;
    }
</style>

<body>
    <?php
    if (isset($_GET['preferencesUpdated'])) {
        if ($_GET["preferencesUpdated"] == "Success") {
            echo "<br><h3 align=center style='color:green'>Success! The Preferences have been updated!</h3>";
        }
    }
    ?>
    <h1 id="title2">Welcome to Project ABCD (A Bite of Culture in Dresses)</h1>
    <h2 id="directions">Select a dress to know more about it</h2><br>

    <?php

    //=============================================================================
    // Step 1: Get the row_count and dresses_count from COOKIE or from defaults
    //=============================================================================
    // Hard code these defaults for now; Ideally, we can get these from the database.

    $row_count = 5;
    $dresses_count = 200;
    $fav_dress = "Saree";

    // cookie name
    $row_count_cookie_name = "row_count";
    $dresses_count_cookie_name = "dresses_count";
    $favorite_dress_cookie_name = "favorite_dress";

    // if cookie is present, then use those values
    // if cookie is NOT present, then the defaults we set earlier will come into play
    if (isset($_COOKIE[$favorite_dress_cookie_name])) {
        $fav_dress = $_COOKIE[$favorite_dress_cookie_name];
    }

    if (isset($_COOKIE[$row_count_cookie_name])) {
        $row_count = $_COOKIE[$row_count_cookie_name];
    }

    if (isset($_COOKIE[$dresses_count_cookie_name])) {
        $dresses_count = $_COOKIE[$dresses_count_cookie_name];
    }


    //=============================================================================
    // Step 2: Get the $pic and $name for each of the dresses from the database
    // Refrence: https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
    //=============================================================================

    $name_sql = "SELECT `name` FROM `dresses`";
    $pic_sql = "SELECT `image_url` FROM `dresses`";
    

    $name_results = mysqli_query($db, $name_sql);
    $pic_results = mysqli_query($db, $pic_sql);

    if (mysqli_num_rows($name_results) > 0) {
        while ($row = mysqli_fetch_assoc($name_results)) {
            $dress_names[] = $row;
        }
    }

    if (mysqli_num_rows($pic_results) > 0) {
        while ($row = mysqli_fetch_assoc($pic_results)) {
            $dress_pics[] = $row;
        }
    }


    // === ignore: further optimizations are possible =========
//     $query = "SELECT * FROM `dresses`";
    
// if ($result = mysqli_query($db, $query)) {

//     /* fetch associative array */
//     while ($row = mysqli_fetch_assoc($result)) {
//         printf ("%s (%s)\n", $row["name"], $row["image_url"]);
//     }
//     /* free result set */
//     mysqli_free_result($result);
// }



    //=============================================================================
    // Step 3: Now, display the dresses in loop 
    //=============================================================================

    // echo "row count --> " . $row_count;
    // echo "<br>dresses count --> " . $dresses_count;


    echo "<table id = 'table_2'>
        <!--Links to each dress can be put inside the href = -->";
        echo "<tr>";
        for ($a = 0; $a < $dresses_count; $a) {
            for ($b = 0; $b < $row_count; $b++) {
                if ($b >= $row_count) {
                    break;
                } else {
                    $dress = $dress_names[$a]['name'];
                    $pic = $dress_pics[$a]['image_url'];
                    $pic = "images/dress_images/" . $pic;
                    echo "
                    <td>
                        <a href = 'display_the_dress.php?name=$dress' title = '$dress'>
                            <image class = 'image' src = $pic> </image>
                            <div id = 'title'>$dress </div>
                            
                        </a>
                    </td>
                    ";    
                    $a++;  
                }
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>

</body>

</html>