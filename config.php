<?php 
//This is the configuration file for the site.
//It stores the basic default information in a form that should be easily changeable later.

return array(
	//The silc_logo_url is the location where the site will look for the image of the SILC logo it will display
    'silc_logo_url' => "bingo_logo.png",
	
	//min_number_of_boards is the minimum number of boards that will be created as part of creating a game.
    'min_number_of_boards' => '2',
	
	//max_number_of_boards is the maxiumum number of boards that will be created as part of creating a game.
	'max_number_of_boards' => '50',
	
	//default_number_of_boards is the pre-set number of boards that will be created as part of creating a game.
	'default_number_of_boards' => '50',
	
	//min_height_of_board is the minimum number of rows in a game board.
	'min_height_of_board' => '2',
	
	//max_height_of_board is the maximum number of rows in a game board.
	'max_height_of_board' => '10',
	
	//default_height_of_board is the pre-set number of rows in a game board.
	'default_height_of_board' => '5',
	
	//min_width_of_board is the minimum number of columns in a game board.
	'min_width_of_board' => '2',
	
	//max_width_of_board is the maximum number of columns in a game board.
	'max_width_of_board' => '10',
	
	//default_width_of_board is the pre-set number of rows in a game board.
	'default_width_of_board' => '5',
	
	//minimum_word_number_multiplier is the number of words above and beyond the minumum number needed to fill a game board
	//which the game creator will have to enter before the game is allowed to proceed.  For example, on a 5x5 board, a minimum
	//of 25 words will be needed just to fill the board.  With a multiplier of 1.25, the game creator will be required to enter
	//1.25 x 25 words, or 31.25 words rounded up to 32.
	'minimum_word_number_multiplier' => '1.25',
);

?>