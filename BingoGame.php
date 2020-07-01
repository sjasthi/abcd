<?php
	/*
	This is the custom class created to store the data that will be in a typical bingo game.
	No need for setters at this time; all properties can be read-only for now.
	*/
	class BingoGame
	{
		private $title;  //The title of the game
		private $rows;  //The number of rows
		private $columns;  //The number of columns
		private $number_of_boards;  //The number of boards
		private $randomize_word_list;  //Whether the word list is supposed to be randomized
		private $word_array;  //The word list
		//Constructor:
		function __construct($game_title, $game_rows, $game_columns, $game_number_of_boards, $game_randomize_word_list, $game_word_array) {
			$this->title = $game_title;
			$this->rows = $game_rows;
			$this->columns = $game_columns;
			$this->number_of_boards = $game_number_of_boards;
			$this->randomize_word_list = $game_randomize_word_list;
			$this->word_array = $game_word_array;
		}
		//Get the title
		function get_title() {
			return $this->title;
		}
		//Get the words
		function get_words() {
			return $this->word_array;
		}
		//Get the rows
		function get_rows() {
			return $this->rows;
		}
		//Get the columns
		function get_columns() {
			return $this->columns;
		}
		//Get the number of boards
		function get_number_of_boards() {
			return $this->number_of_boards;
		}
		//Get whether the word list is supposed to be randomized
		function get_randomize_word_list() {
			return $this->randomize_word_list;
		}
	}
?>