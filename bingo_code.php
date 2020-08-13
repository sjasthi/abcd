<html>
<body>

<?php include('header.php'); ?> 

<?php

function Bingo() {

    $words = array();

    if (!isset($_POST['submit'])){

      $number = $_POST['number'];
      $cards = $_POST['cards'];
      $total = $number * $number;
      $added = explode(',',$_POST['list']);
      $words = array_merge($words, $added);

    if(array_key_exists('generate_bingo_cards', $_POST)) {

      for($i = 0; $i < $cards; $i++) {
      shuffle($words);

      $bingocard = "<table id='bingo'>";
      $bingocard .= "<thead><tr>";
      $bingocard .= "</tr></thead>";
      $bingocard .= "<tbody>";
      $bingocard .= "<tr>";
  
      for($cell=0; $cell<$total; $cell++)
      {
        $rowend = ($cell + 1) % $number;
        $bingocard .= "<td>"  . $words[$cell] . "</td>";
        if($rowend == 0) {
          $bingocard .= "</tr><tr>";
        }
      }
  
      $bingocard .= "</tr>";
      $bingocard .= "</tbody>";
      $bingocard .= "</table>";
  
      echo $bingocard . "<br>";
    }
    } 
    
    else if(array_key_exists('generate_bingo_list', $_POST)) {

 
      if(isset($_POST['randomize']) )
   {
       shuffle($words);
       echo "<h1>Here is the list:</h1>\n<ul>\n";
      foreach($words as $t){
      echo "<li>".trim($t)."</li>\n";  
      } echo"</ul>"; 
   }
   else
   {
    echo "<h1>Here is the list:</h1>\n<ul>\n";
    foreach($words as $t){
    echo "<li>".trim($t)."</li>\n";  
    } echo"</ul>"; 
   }

    }
 


    }
  }


?>
<?php Bingo(); ?>
</body>
</html>