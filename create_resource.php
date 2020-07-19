<?php $page_title = 'Resources > Create A Resource'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="resources.php";
    //verifyLogin($page);

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','abcd_db');
    //$resultset = $mysqli->query("SELECT DISTINCT topic FROM topics ORDER BY topic ASC");   
?>

<div class="container">
<style>

    #title {
        text-align: center; 
        color: darkgoldenrod;
}

    #guidance {
        color: grey;
        font-size: 10px;
    }

</style>
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
    <form action="create_the_resource.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create A Resource</h3> <br>
        
        <div>
            <label>Name</label> <br>
            <input style=width:400px class="form-control" type="text" name="name" maxlength="100" size="50" required title="Please enter a name"></input>
        </div>

        <div>
            <label>Url</label> <br>
            <input style=width:400px class="form-control" type="text" name="url" maxlength="100" size="50" required title="Please enter a url"></input>
        </div>

        <div>
            <label>Type</label> <label id="guidance"> (image, video, wiki, pdf, doc, audio, other)</label> <br>
            <input style=width:400px class="form-control" type="text" name="type" maxlength="100" size="50" required title="Please enter a type"></input>
        </div>


        <div>
            <label>Notes</label> <br>
            <input style=width:400px class="form-control" type="text" name="notes" maxlength="100" size="50" required title="Please enter additional notes or N/A to represent none"></input>
        </div>
        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Resource</button>
        </div>
        <br> <br>
        
    </form>
</div>

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

</script>