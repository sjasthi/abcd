<!DOCTYPE HTML>
<html>  
<body>

<?php include('header.php'); ?> 


<form action="bingo_code.php" method="post">
Title: <br> <input type="text" name="title"><br><br>
List (separate with comma): <br> <input type="text" name="list"><br>
Randomize List <input type="checkbox" name="randomize"><br><br>
Number of colums/rows: <br> <input type="text" name="number"><br><br>
Number of cards to generate: <br> <input type="text" name="cards"><br><br>
**Please enter more than enough words to ensure no errors. <br><br>
<input type="submit" value="Generate Bingo Cards" name="generate_bingo_cards"/>
<input type="submit" value="Generate Bingo List" name="generate_bingo_list"/>
</form>

</body>
</html>