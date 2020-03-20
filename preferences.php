<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = 'Quiz Master > Preferences';
include('header.php'); 
    $page="questions_list.php";
    //verifyLogin($page);
//This file is going to be edited by Vishnu
$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_DISPLAY'";
$sql3 = "SELECT `value` FROM `preferences` WHERE `name`= 'NAME_OF_FAVORITE_DRESS'";

$results = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
$results3 = mysqli_query($db,$sql3);

if(mysqli_num_rows($results)>0){
    while($row = mysqli_fetch_assoc($results)){
        $column[] = $row;
    }
}
$rows = $column[0]['value'];

if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $question[] = $row;
    }
}
$questions = $question[0]['value'];


if(mysqli_num_rows($results3)>0){
    while($row = mysqli_fetch_assoc($results3)){
        $favoritedress[] = $row;
    }
}
$favoritedress =$favoritedress[0]['value'];
?>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
    <head>
        <title>QuizMaster Quiz</title>
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
        
        <form action="modify_the_preferences.php" method="POST">
        <table style="width:600px">
        <tr>
            <th style="width:300px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:300px">Number of Dresses Per Row:</td>
            <td><input disabled type="int" maxlength="2" size="13" value="<?php echo $rows; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_rows" maxlength="2" size="13" title="Enter a number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Number of Dresses to Display:</td>
            <td><input disabled type="int" maxlength="2" size="13" value="<?php echo $questions; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_questions" maxlength="2" size="13" title="Enter in another number!"></td>
        </tr>
        <tr>
            <td style="width:300px">Name of Favorite Dress:</td>
            <td><input disabled type="text" maxlength="10" size="13" value="<?php echo $favoritedress; ?>" title="Current value"></td> 
            <td><input required type="text" name="new_rows" maxlength="20" size="13" title="Enter your favorite dress!"></td>
        </tr>
        </table><br>
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>
        </form>
    </div>
    </body>
</html>

