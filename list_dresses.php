<?php

require 'bin/functions.php';
require 'db_configuration.php';

$query = "SELECT * FROM dresses";

$GLOBALS['data'] = mysqli_query($db, $query);
// $GLOBALS['topic'] = mysqli_query($db, $query);
// $GLOBALS['Dress'] = mysqli_query($db, $query);
// $GLOBALS['choice_1'] = mysqli_query($db, $query);
// $GLOBALS['choice_2'] = mysqli_query($db, $query);
// $GLOBALS['choice_3'] = mysqli_query($db, $query);
// $GLOBALS['choice_4'] = mysqli_query($db, $query);
// $GLOBALS['answer'] = mysqli_query($db, $query);
// $GLOBALS['image_name'] = mysqli_query($db, $query);
?>


<?php $page_title = 'Project ABCD > dresses'; ?>

<?php include('header.php'); 
    $page="dresses_list.php";
   // verifyLogin($page);
?>

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

<!-- Page Content -->
<br><br>
<div class="container-fluid">
    <?php
        if(isset($_GET['createDress'])){
            if($_GET["createDress"] == "Success"){
                echo '<br><h3>Success! Your Dress has been added!</h3>';
            }
        }

        if(isset($_GET['DressUpdated'])){
            if($_GET["DressUpdated"] == "Success"){
                echo '<br><h3>Success! Your Dress has been modified!</h3>';
            }
        }

        if(isset($_GET['DressDeleted'])){
            if($_GET["DressDeleted"] == "Success"){
                echo '<br><h3>Success! Your Dress has been deleted!</h3>';
            }
        }

        if(isset($_GET['createTopic'])){
            if($_GET["createTopic"] == "Success"){
                echo '<br><h3>Success! Your topic has been added!</h3>';
            }
        }
    ?>
   
    <h2 id="title">Dresses List</h2><br>
    
    <div id="customerTableView">
        <button><a class="btn btn-sm" href="create_dress.php">Create a Dress</a></button>
        <table class="display" id="ceremoniesTable" style="width:100%">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Did you know?</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>State Name </th>
                    <th>Key Words</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Image</th>
                    <th>Display</th>
                    <th>Modify</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <strong>Hide: </strong>
                <input type="checkbox" class="hidecol" value="id" id="col_1" />&nbsp;Id&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="name" id="col_2" />&nbsp;Name&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="description" id="col_3" />&nbsp;Description&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="did_you_know" id="col_4" />&nbsp;Did You Know&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="category" id="col_5" />&nbsp;Category&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="type" id="col_6" />&nbsp;Type&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="state_name" id="col_7" />&nbsp;State Name&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="key_words" id="col_8" />&nbsp;Key Words&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="status" id="col_9" />&nbsp;Status&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="notes" id="col_10" />&nbsp;Notes&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="image" id="col_11" />&nbsp;Image&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="display" id="col_12" />&nbsp;Display&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="modify" id="col_13" />&nbsp;Modify&nbsp;&nbsp;
                <input type="checkbox" class="hidecol" value="delete" id="col_14" />&nbsp;Delete&nbsp;&nbsp; <br> <br>



                <?php
                // fetch the data from $_GLOBALS
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row["id"].'</td>
                                <td> </span> <a href="display_the_dress.php?id='.$row["id"].'">'.$row["name"].'</a></td>
                                <td>'.$row["description"].'</td>
                                <td>'.$row["did_you_know"].'</td>
                                <td>'.$row["category"].' </span> </td>
                                <td>'.$row["type"].'</td>
                                <td>'.$row["state_name"].'</td>
                                <td>'.$row["key_words"].' </span> </td>
                                <td>'.$row["status"].' </span> </td>
                                <td>'.$row["notes"].' </span> </td>
                                <td><img class="thumbnailSize" src="' . "images/dress_images/" .$row["image_url"]. '" alt="'.$row["image_url"].'"></td>
                                <td><a class="btn btn-info btn-sm" href="display_the_dress.php?id='.$row["id"].'">Display</a></td>
                                <td><a class="btn btn-warning btn-sm" href="modify_dress.php?id='.$row["id"].'">Modify</a></td>
                                <td><a class="btn btn-danger btn-sm" href="deleteDress.php?id='.$row["id"].'">Delete</a></td>
                            </tr>';
                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
    <p>Created for ICS 325 Summer Project "Team Alligators"</p>
</footer>

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<!--Data Table-->
<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#ceremoniesTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#ceremoniesTable thead tr').clone(true).appendTo( '#ceremoniesTable thead' );
        $('#ceremoniesTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#ceremoniesTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

    $(document).ready(function(){

// Checkbox click
$(".hidecol").click(function(){

    var id = this.id;
    var splitid = id.split("_");
    var colno = splitid[1];
    var checked = true;
     
    // Checking Checkbox state
    if($(this).is(":checked")){
        checked = true;
    }else{
        checked = false;
    }
    setTimeout(function(){
        if(checked){
            $('#ceremoniesTable td:nth-child('+colno+')').hide();
            $('#ceremoniesTable th:nth-child('+colno+')').hide();
        } else{
            $('#ceremoniesTable td:nth-child('+colno+')').show();
            $('#ceremoniesTable th:nth-child('+colno+')').show();
        }

    }, 0000);

});
});







</script>
</body>
</html>
