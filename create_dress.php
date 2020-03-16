<?php $page_title = 'Dresses > Create A Dress'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="list_dresses.php";
    //verifyLogin($page);

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','Project_ABCD');
    $resultset = $mysqli->query("SELECT DISTINCT topic FROM topics ORDER BY topic ASC");   
?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    // if(isset($_GET['createQuestion'])){
    //     if($_GET["createQuestion"] == "fileRealFailed"){
    //         echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
    //     }
    // }
    // if(isset($_GET['createQuestion'])){
    //     if($_GET["createQuestion"] == "answerFailed"){
    //         echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
    //     }
    // }
    // if(isset($_GET['createQuestion'])){
    //     if($_GET["createQuestion"] == "fileTypeFailed"){
    //         echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
    //     }
    // }
    // if(isset($_GET['createQuestion'])){
    //     if($_GET["createQuestion"] == "fileExistFailed"){
    //         echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
    //     }
    // }
  
    ?>
    <form action="create_the_dress.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create A Dress</h3> <br>
        
        <table>
            <tr>
                <td style="width:100px">Name:</td>
                <td><input type="text"  name="name" maxlength="100" size="50" required title="Please enter a question."></td>
            </tr>
            <tr>
                <td style="width:100px">Description</td>
                <td><input type="text"  name="description" maxlength="50" size="50" required title="Please enter answer 1."></td>
            </tr>
            <tr>
                <td style="width:100px">Did You Know</td>
                <td><input type="text"  name="did_you_know" maxlength="50" size="50" required title="Please enter answer 2."></td>
            </tr>
            <tr>
                <td style="width:100px">Category</td>
                <td><input type="text"  name="Category" maxlength="50" size="50" required title="Please enter answer 3."></td>
            </tr>
            <tr>
                <td style="width:100px">Type</td>
                <td><input type="text"  name="type" maxlength="50" size="50" required title="Please enter answer 4."></td>
            </tr>
            <tr>
                <td style="width:100px">State Name</td>
                <td><input type="text"  name="state_name" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
            <tr>
                <td style="width:100px">Key Words</td>
                <td><input type="text"  name="key_words" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
            <tr>
                <td style="width:100px">Image:</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" maxlength="50" size="50" title="Please enter the Image Name."></td>
            </tr>
            <tr>
                <td style="width:100px">Status</td>
                <td><input type="text"  name="status" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
            <tr>
                <td style="width:100px">Notes</td>
                <td><input type="text"  name="notes" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
        </table>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Question</button>
        </div>
        <br> <br>

    </form>
</div>

