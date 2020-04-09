<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = ' Project ABCD > Preferences';
include('header.php'); 
    $page="questions_list.php";
    //verifyLogin($page);

$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_DISPLAY'";

$results = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
print_r($results);
echo mysqli_num_rows($results);
if(mysqli_num_rows($results)>0){
    while($row = mysqli_fetch_assoc($results)){
        $row_count_array[] = $row;
    }
}
$row_count = $row_count_array[0]['value'];

if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $dresses_count_array[] = $row;
    }
}
$dresses_count = $dresses_count_array[0]['value'];
// Getting fav dress from cookie
$cookie_name = "favorite_dress";
$fav_dress = "";
if(isset($_COOKIE[$cookie_name])){
    $fav_dress = $_COOKIE[$cookie_name];
}
$form_action = "set_cookie.php";
if (isset($_SESSION['role'])){
    $form_action = "modify_the_preferences.php";
}
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
            <td><input required type="int" name="row_count" maxlength="2" size="13" title="Enter a number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Number of Dresses to Display:</td>
            <td><input disabled type="int" maxlength="2" size="13" value="<?php echo $dresses_count; ?>" title="Current value"></td> 
            <td><input required type="int" name="dresses_count" maxlength="2" size="13" title="Enter in another number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Name of Favorite Dress:</td>
            <td><input disabled type="text" maxlength="10" size="13" value="<?php echo $fav_dress; ?>" title="Current value"></td> 
            <td><input required type="text" name="fav_dress" maxlength="20" size="13" title="Enter your favorite dress!"></td>
        </tr>
        </table><br>
        <?php
            if (isset($_SESSION['role'])){
                echo '<button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>';
            } else {
                echo '<button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Set Cookie</button>';
            }
        ?>
        </form>
    </div>
    </body>
</html>

