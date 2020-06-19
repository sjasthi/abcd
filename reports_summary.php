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

  <!-- ==================      Status of Dresses Table   -->

  <div class="right-content">
    <div class="container">
      <table class="datatable table table-striped table-bordered datatable-style" style="width: 50%; font-weight: bold;">

        <h3 style='color: #01B0F1;'>Status Summary:</h3>
        <tr>
          <th>Status</th>
          <th>Count</th>
        </tr>


        <tr>
          <td>Proposed</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE status='proposed'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

        <tr>
          <td>Approved</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE status='approved'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

        <tr>
          <td>Write-Up Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='writeup_done'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

        <tr>
          <td>Art Work Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='art_work_done'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

        <tr>
          <td>Design Done</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='designed'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

        <tr>
          <td>Completed</td>
          <td>
            <?php
              $result = mysqli_query($db, "SELECT * FROM dresses WHERE status='completed'");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?>
          </td>
        </tr>

      </table>

    </div>  
    <!-- End Status Table -->

    <!-- ==================      Key Words Table   -->
    <br>
    <div class="right-content">

      <div class="container">

        <table class="datatable table table-striped table-bordered datatable-style" style="width: 50%; font-weight: bold;">


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

      </div> <!-- // end key words table -->

      <!--=========== Type table ==================-->
      <br>
      <div class="right-content">
        <div class="container">

          <table class="datatable table table-striped table-bordered datatable-style" style="width: 50%; font-weight: bold;">


            <h3 style='color: #01B0F1;'>Status of Type:</h3>
            <tr>
              <th>Type</th>
              <th>Count</th>
            </tr>


            <tr>
              <td>Boys</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE type='boys'");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
                ?>
              </td>
            </tr>

            <tr>
              <td>Men</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM `dresses` WHERE type='men'");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
                ?>
              </td>
            </tr>

            <tr>
              <td>Women</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='women'");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
                ?>
              </td>
            </tr>

            <tr>
              <td>Girls</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='girls'");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
                ?>
              </td>
            </tr>

            <tr>
              <td>Other</td>
              <td>
                <?php
                $result = mysqli_query($db, "SELECT * FROM dresses WHERE type='other'");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
                ?>
              </td>
            </tr>

        </div>
        <br>
        <!-- End Type Table -->

        <!-- ==================      Category Table   -->
        <br>
        <div class="right-content">

          <div class="container">

            <table class="datatable table table-striped table-bordered datatable-style" style="width: 50%; font-weight: bold;">


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

          </div> <!-- // end category table -->

          <!-- End Category Table -->

</body>

</html>