<?php $page_title = 'Bingo'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    //verifyLogin($page);
?>

<html>
<header>
<link rel="stylesheet" href="css/bingo_style.css">
</header>
<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
</style>

<body>
    <h2 id="title">Bingo</h2>

    <form action="resolve.php" method="post">

	<div class="left_column">
    
        <table class="configuration_table">
            <tr>
            <td class="configuration_cell_left">Title</td>
            <td class="configuration_cell_right"><input type="text" name="title" placeholder="Bingo Fun!"/></td>
            </tr>
            
            <tr>
            <td class="configuration_cell_left">Number of Boards</td>
            <td class="configuration_cell_right"><input type="text" name="number_of_boards" placeholder="50 (2 to 50 permitted; 50 default)" /></td>
            </tr>
            
            <tr>
            <td class="configuration_cell_left">Height of the board</td>
            <td class="configuration_cell_right"><input type="text" name="rows" placeholder="5 (2 to 10 permitted; 5 default)" /></td>
            </tr>
            
            <tr>
            <td class="configuration_cell_left">Width of the board</td>
            <td class="configuration_cell_right"><input type="text" name="columns" placeholder="5 (2 to 10 permitted; 5 default)" /></td>
            </tr>   
        </table>
        
        <table class="buttons_table">
            <tr>
            <td class="buttons_cell"><input type="submit" class="my_button" value="Generate Bingo Cards" name="generate_bingo_cards"/></td class="buttons_cell">
            <td><input type="submit" value="Generate Bingo Word List" class="my_button" name="generate_bingo_word_list"/></td>
            </tr>
            
            <tr>
            <td></td>
            <td><input type="checkbox" name="randomize"/>Randomize Word List</td>
            </tr>
        </table>
    </div>		
    
    <div class="right_column">
        <p>Word List (one word per line)</p>
        <textarea rows="10" cols="50" name="word_list" placeholder="Enter Words Here, one per line"></textarea>
    </div>
    
    </form>

</body>
</html>

