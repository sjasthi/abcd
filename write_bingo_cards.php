<?php
	/*
	This code is used to write the bingo cards on the Bingo_Cards.php page.
	It does the following:
		1)  Writes the heading, which is just the title of the game.
		2)  Writes the bingo cards themselves using a loop.
	*/
	include ('BingoGame.php');
	
	//This is the main function that gets called from outside.
	function write_bingo_cards($game) {
		//write_heading($game->get_title());
		write_cards($game);
	}
	
	//This function writes the title of the game as an <h1> element.
	function write_heading($title) {
	//	echo("<h1 class=\"center_header\">$title</h1>");
	//		$configs = include('config.php');
	//		$silc_logo_url = $configs['silc_logo_url'];
			//echo("<header>");
			//echo("<a href='index.html'><img src='$silc_logo_url' style='float:left' width='312' height='116'> </a>");
			//echo("<a href='index.html'><img src='$silc_logo_url' style='float:left' width='116' height='58'> </a>");
			//echo("<a href='index.html'><img src='$silc_logo_url' style='float:left' width='58' height='29'> </a>");
			
	}
	
	//This function has the outer loop that writes the bingo cards.
	function write_cards($game) {
		for($i = 1; $i <= $game->get_number_of_boards(); $i++) {
			$title = $game->get_title();
			echo("<h1>$title - #$i</h1>");
			write_board($game);
			echo("<P style='page-break-before: always'>");
		}
	}
	
	//This function writes an individual bingo card.
	function write_board($game) {
		$rows = $game->get_rows();
		$columns = $game->get_columns();
		$words = $game->get_words();
		shuffle($words);
		echo("<table>");
		for($i = 0; $i < $rows; $i++) {
			echo("<tr>");
			for($j = 0; $j < $columns; $j++) {
				echo("<td class=\"bingo_card_cell\">");
				echo(current($words));
				next($words);
				echo("</td>");
			}
			echo("</tr>");
		}
		echo("</table>");
		echo("<br/>");
	}
?>