<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = ' Project ABCD > Summary';
include('header.php');

  ?>

  <div class="right-content">
   <div class="container">
     <!--style="margin: 0 auto; position: relative; padding-left: 350px;"-->

       <h3 style = "color: #01B0F1;">Summary:</h3>

      <table class="datatable table table-striped table-bordered datatable-style"
             style="width: 50%; font-weight: bold;">

        <tr id="table-first-row">
          <td colspan="2">Status of Dresses</td>
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

    <div class="right-content">
   <div class="container">
     <!--style="margin: 0 auto; position: relative; padding-left: 350px;"-->

       <h3 style = "color: #01B0F1;">Summary:</h3>

      <table class="datatable table table-striped table-bordered datatable-style"
             style="width: 50%; font-weight: bold;">

        <tr id="table-first-row">
          <td colspan="2">Status of Type</td>
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


      </table>

    </div>
    
</body>
</html>
