<html>
<body>

<?php echo $_POST["title"]; ?><br>
<?php

function Bingo() {

    $words = array();

    if (!isset($_POST['submit'])){
    
      $added = explode(',',$_POST['list']);
      $words = array_merge($words, $added);
      //shuffle($words);

    if(array_key_exists('generate_bingo_cards', $_POST)) {
      shuffle($words);

      $bingocard = "<table id='bingo'>";
      $bingocard .= "<thead><tr>";
      $bingocard .= "</tr></thead>";
      $bingocard .= "<tbody>";
      $bingocard .= "<tr>";
  
      for($cell=0; $cell<9; $cell++)
      {
        $rowend = ($cell + 1) % 3;
        $bingocard .= "<td>" 
         . $words[$cell] . "</td>";
        if($rowend == 0 && $cell < 8) {
          $bingocard .= "</tr><tr>";
        }
      }
  
      $bingocard .= "</tr>";
      $bingocard .= "</tbody>";
      $bingocard .= "</table>";
  
      echo $bingocard;
    } 
    
    else if(array_key_exists('generate_bingo_list', $_POST)) {
      echo "<p>Here is the list:</p>\n<ul>\n";
      foreach($words as $t){
      echo "<li>".trim($t)."</li>\n";  
        } echo"</ul>"; 
    }



    }
  }


?>

<?php Bingo(); ?>
</body>
</html>