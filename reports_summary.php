<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = ' Project ABCD > Summary';
include('header.php');
?>


<html>
<body>

<!-- Start Status of Dresses Table -->
  <div class="right-content">
    <div class="container">
      <table class="datatable table table-striped table-bordered datatable-style" style="width: 40%; font-weight: bold;">
        <h3 style='color: #01B0F1;'>Status Summary:</h3>
        <center>
        <span class = "a">
        <tr>
          <th>Status</th>
          <th>Count</th>
        </tr>


        <tr>
          <td>Proposed</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE status='proposed'");
              $proposed = mysqli_num_rows($result);
              echo $proposed;
            ?>
          </td>
        </tr>

        <tr>
          <td>Approved</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE status='approved'");
              $approved = mysqli_num_rows($result);
              echo $approved;
            ?>
          </td>
        </tr>

        <tr>
          <td>Write-Up Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='writeup_done'");
              $writeUPdone = mysqli_num_rows($result);
              echo $writeUPdone;
            ?>
          </td>
        </tr>

        <tr>
          <td>Art Work Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='art_work_done'");
              $artWORKdone = mysqli_num_rows($result);
              echo $artWORKdone;
            ?>
          </td>
        </tr>

        <tr>
          <td>Design Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='designed'");
              $designDONE = mysqli_num_rows($result);
              echo $designDONE;
            ?>
          </td>
        </tr>

        <tr>
          <td>Completed</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='completed'");
              $completed = mysqli_num_rows($result);
              echo $completed;
            ?>
          </td>
        </tr>
      </table>
      </span>
      </center>
    </div>  
<!-- End Dresses Table -->

<!-- Start Pie Chart for Status of Dresses -->
<center>
      <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
    
      //Setting value of javascript variables to the php ones in table 
      var proposed = "<?php echo $proposed ?>"; 
      var approved = "<?php echo $approved ?>"; 
      var writeUPdone = "<?php echo $writeUPdone ?>";
      var artWORKdone = "<?php echo $artWORKdone ?>";
      var designDONE = "<?php echo $designDONE ?>";
      var completed = "<?php echo $completed ?>";

      //Creating array 
      var dresses_array = [
          ['Status', 'Count'],
          ['Proposed', proposed],
          ['Approved', approved],
          ['Art Work Done', artWORKdone],
          ['Write-Up Done', writeUPdone],
          ['Design Done', designDONE],
          ['Completed', completed]
        ];

      google.load("visualization", "1", { packages: ["table", "corechart"] });
      google.charts.setOnLoadCallback(function() { 
            drawChart( dresses_array, 'piechart_3d');
        });
      
      //Calling array and the 3d pie chart in the function
      function drawChart(dresses_array, div_id) {
            var data_dresses = new google.visualization.DataTable();
        
              //Calling 'Status' and 'Count' from the 2d array above
              data_dresses.addColumn('string', dresses_array[0][0]);
              data_dresses.addColumn('number', dresses_array[0][1]);
                
                //Dynamic way of finding length of array no matter how much data is entered
                for (var i = 1; i < dresses_array.length; i++) {
                  // Accessing elements of array
                  data_dresses.addRow([ dresses_array[i][0], parseInt(dresses_array[i][1])]); 
                }

            var options_dresses = {
              is3D: true
            };

            var chart_dresses = new google.visualization.PieChart(document.getElementById(div_id));
              chart_dresses.draw(data_dresses, options_dresses);

            }
        </script>
      </head>
    <body>
      <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </body>
</span>
</center>
<!-- End of Status of Dresses Pie Chart -->


<!-- Start Key Words Table -->
    <br>
    <div class="right-content">

      <div class="container">
        <table class="datatable table table-striped table-bordered datatable-style" style="width: 40%; font-weight: bold;">


          <?php
          $result = mysqli_query($db, "SELECT key_words FROM `dresses` WHERE key_words != '' or key_words != ' '");

          $db_values = array();
          $key_words = array();

          while ($key_result = mysqli_fetch_assoc($result)) {
            while (list($key, $val) = each($key_result)) {
              array_push($db_values, explode(",",  $val));
            }
          }

          while (list($key,  $val) = each($db_values)) {
            while (list($t, $p) = each($val)) {
              array_push($key_words, $p);
            }
          }

          $trimmed_key_words = array_map('trim', $key_words);
          sort($trimmed_key_words);
          $count = array_count_values($trimmed_key_words);

          arsort($count);

          echo "
        <h3 style = 'color: #01B0F1;'>Key Word Summary:</h3>
        <center>
        <tr>
          <th>Key Words</th>
          <th>Frequency</th>
        </tr> ";

          while (list($key,  $val) = each($count)) {
            echo "
         <tr>
          <td>$key</td>
          <td>$val</td>
          </tr> ";
          }
          ?>
        </table>

      </div> 
      </center>
<!--End Key Words Table-->

<!-- Start Type table -->
      <br>
      <div class="right-content">
        <div class="container">

          <table class="datatable table table-striped table-bordered datatable-style" style="width: 40%; font-weight: bold;">
          

            <h3 style='color: #01B0F1;'>Status of Type:</h3>
            <center>
            <tr>
              <th>Type</th>
              <th>Count</th>
            </tr>


            <tr>
              <td>Boys</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE type='boys'");
                $boys = mysqli_num_rows($result);
                echo $boys;
                ?>
              </td>
            </tr>

            <tr>
              <td>Men</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE type='men'");
                $men = mysqli_num_rows($result);
                echo $men;
                ?>
              </td>
            </tr>

            <tr>
              <td>Women</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='women'");
                $women = mysqli_num_rows($result);
                echo $women;
                ?>
              </td>
            </tr>

            <tr>
              <td>Girls</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='girls'");
                $girls = mysqli_num_rows($result);
                echo $girls;
                ?>
              </td>
            </tr>

            <tr>
              <td>Other</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='other'");
                $other = mysqli_num_rows($result);
                echo $other;
                ?>
              </td>
            </tr>

        </div>
        </center>
<!-- End Type Table -->

<!-- Start Pie Chart for Type Table -->
<center>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      //Setting value of javascript variables to the php ones in table 
      var boys = "<?php echo $boys ?>"; 
      var men = "<?php echo $men ?>"; 
      var women = "<?php echo $women ?>";
      var girls = "<?php echo $girls ?>";
      var other = "<?php echo $other ?>";

        var type_array = [
          ['Type', 'Count'],
          ['Boys', boys],
          ['Men', men],
          ['Women', women],
          ['Girls', girls],
          ['Other', other]
        ];

      google.charts.load("visualization", "1", { packages: ["table", "corechart"] });
      google.charts.setOnLoadCallback(function() { 
            drawChart(type_array, 'piechart_2d');
        });

    </script>
  <body>
    <div id="piechart_2d" style="width: 900px; height: 500px;"></div>
  </body>
</center>
<!-- End Pie Chart for Type Table -->

<!-- Start Category Table -->
        <br>
        <center>
        <div class="right-content">

          <div class="container">

            <table class="datatable table table-striped table-bordered datatable-style" style="width: 40%; font-weight: bold;">


              <?php
              $result = mysqli_query($db, "SELECT category FROM `dresses` WHERE category != '' or category != ' '");

              $db_values = array();
              $key_words = array();

              while ($key_result = mysqli_fetch_assoc($result)) {
                while (list($key, $val) = each($key_result)) {
                  array_push($db_values, explode(",",  $val));
                }
              }

              while (list($key,  $val) = each($db_values)) {
                while (list($t, $p) = each($val)) {
                  array_push($key_words, $p);
                }
              }

              $trimmed_key_words = array_map('trim', $key_words);
              sort($trimmed_key_words);
              $count = array_count_values($trimmed_key_words);

              arsort($count);

              echo "
        <h3 style = 'color: #01B0F1;'>Category Summary:</h3>
        <tr>
          <th>Category</th>
          <th>Frequency</th>
        </tr> ";

              while (list($key,  $val) = each($count)) {
                echo "
         <tr>
          <td>$key</td>
          <td>$val</td>
          </tr> ";
              }
              ?>
            </table>

          </div> 
          </center>
<!-- End Category Table -->

</body>
</html>