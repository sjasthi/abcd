<?php
/*
	This code is used to write the bingo word list on the Bingo_Word_List.php page.
	It does the following:
		1)  Writes the heading, which is just the title of the game.
		2)  Writes the list of words.
	*/
	include ('BingoGame.php');
	
	//This is the main function that gets called from outside.
	function write_bingo_word_list($game) {
		write_heading($game->get_title());
		write_word_list($game);
	}
	
	//This function writes the title of the game as an <h1> element.
	function write_heading($title) {
		echo("<h1 class=\"center_header\">$title - Word List</h1>");
	}
	
	//This function writes the word list, randomizing it if that was requested.
	function write_word_list($game) {
		$words = $game->get_words();
		if($game->get_randomize_word_list()) {
			shuffle($words);
		}
		$counter = 1;
		echo("<table>");
		foreach($words as $word) {
			echo("<tr>");
			echo("<td class=\"word_list_left_td\">$counter</td>");
			$counter++;
			echo("<td class=\"word_list_right_td\">$word</td>");
			echo("</tr>");
		}
		echo("</table>");
	}
?>