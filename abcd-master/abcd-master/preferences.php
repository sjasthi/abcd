<?php 
$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = ' Project ABCD > Preferences';
include('header.php'); 
    $page="preferences.php";
    //verifyLogin($page);

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
if(isset($_COOKIE[$favorite_dress_cookie_name])){
    $fav_dress = $_COOKIE[$favorite_dress_cookie_name];
}

if(isset($_COOKIE[$row_count_cookie_name])){
    $row_count = $_COOKIE[$row_count_cookie_name];
}

if(isset($_COOKIE[$dresses_count_cookie_name])){
    $dresses_count = $_COOKIE[$dresses_count_cookie_name];
}


// we will rely only on cookie; ditch the db values for updates
$form_action = "set_cookie.php";
// if (isset($_SESSION['role'])){
//     $form_action = "modify_the_preferences.php";
// }
?>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
    <head>

        <title>Project ABCD</title>

        <style>
        input {
            text-align: center;
        }
        </style>
    </head>
    <body>
    <br>
    <h3 id="title">Update Preferences</h3><br>
    </body>
    <div class="container">
        <!--Check the CeremonyCreated and if Failed, display the error message-->
        
        <form action="<?php echo $form_action ?>" method="POST">
        <table style="width:600px">
        <tr>
            <th style="width:300px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:300px">Number of Dresses Per Row:</td>
            <td><input disabled type="int" maxlength="2" size="13" value="<?php echo $row_count; ?>" title="Current value"></td> 
            <td><input required type="int" name="row_count" maxlength="2" size="13" value="<?php echo $row_count; ?>" title="Enter a number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Number of Dresses to Display:</td>
            <td><input disabled type="int" maxlength="3" size="13" value="<?php echo $dresses_count; ?>" title="Current value"></td> 
            <td><input required type="int" name="dresses_count" maxlength="3" size="13" value="<?php echo $dresses_count; ?>" title="Enter in another number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Name of Favorite Dress:</td>
            <td><input disabled type="text" maxlength="10" size="13" value="<?php echo $fav_dress; ?>" title="Current value"></td> 
            <td><input required type="text" name="fav_dress" maxlength="20" size="13" value="<?php echo $fav_dress; ?>" title="Enter your favorite dress!"></td>
        </tr>
        </table><br>
        <?php
            // we will ditch the database persistance and rely on only the cookie for preferences
            // if (isset($_SESSION['role'])){
            //     echo '<button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>';
            // } else {
                echo '<button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Set Cookie</button>';
            // }
        ?>
        </form>
    </div>
    </body>
</html>

