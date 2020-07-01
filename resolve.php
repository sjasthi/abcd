<?php
	/*
	This is the php form called when EITHER button is pressed on Bingo.php.
	Therefore, it needs to: 
		1) Validate the user's input (adding defaults if needed), and
		2) Redirect the user to the appropriate page.
	*/
	
	
	include ('BingoGame.php');
	session_start();
	//Get the configuration variables
	$configs = include('config.php');
	$word_list = $_POST['word_list'];
	$_SESSION['word_list'] = $_POST['word_list'];
	$title = $_POST['title'];
	$_SESSION['title'] = $_POST['title'];
	
	//Create the $number_of_boards variable and set it as either the $_POST array value or the default.
	$number_of_boards = null;
	if($_POST['number_of_boards'] == null) {
		$number_of_boards = $configs['default_number_of_boards'];
		$_SESSION['number_of_boards'] = $configs['default_number_of_boards'];
	} else {
		$number_of_boards = $_POST['number_of_boards'];
		$_SESSION['number_of_boards'] = $_POST['number_of_boards'];
	}
	

	//Create the $columns variable and set it as either the $_POST array value or the default.
	$columns = null;
	if($_POST['columns'] == null) {
		$columns = $configs['default_width_of_board'];
		$_SESSION['columns'] = $configs['default_width_of_board'];
	} else {
		$columns = $_POST['columns'];
		$_SESSION['columns'] = $_POST['columns'];
	}
	
	//Create the $rows variable and set it as either the $_POST array value or the default.
	$rows = null;
	if($_POST['rows'] == null) {
		$rows = $configs['default_height_of_board'];
		$_SESSION['rows'] = $configs['default_height_of_board'];
	} else {
		$rows = $_POST['rows'];
		$_SESSION['rows'] = $_POST['rows'];
	}
	$error_message = null;
	$word_array = null;
	$game = null;
	//Call the validate() function to see if the variables supplied create a valid bingo game.
	$valid = validate($configs, $title, $word_list, $number_of_boards, $columns, $rows, $error_message, $word_array);
	if($valid) {
		//This is a valid bingo game.  In $_SESSION, save it as a BingoGame object and set error_message to null.
		$game = new BingoGame($title, $rows, $columns, $number_of_boards, $_POST['randomize'], $word_array);
		$_SESSION['error_message'] = null;
		$_SESSION['game'] = $game;
		//Where do we go next?  Redirect, depending on which button was clicked.
		if(array_key_exists('generate_bingo_cards', $_POST)) {
			header("Location: bingo_cards.php");
		} else if(array_key_exists('generate_bingo_word_list', $_POST)) {
			header("Location: bingo_word_list.php");
		}
	} else {
		//Something was wrong.  In $_SESSION, set the error message to the message received and set the game to null.
		$_SESSION['error_message'] = $error_message;
		$_SESSION['game'] = null;
		//Redirect back to Bingo.php to sort out the problem.
		header("Location: Bingo.php");
	}
	
	//The main validate() function.  Checks the title, rows, columns, and word list, in that order.
	//If any of them fail, return false immediately and the error_message will have the appropriate reason.
	function validate($configs, $title, $word_list, $number_of_boards, $columns, $rows, &$error_message, &$word_array) {
		//Does this game have a title?
		if(validate_title($title, $error_message)) {
			//Is the number of rows between the minimum and the maximum?
				if(validate_rows($rows, $configs['min_height_of_board'], $configs['max_height_of_board'], $error_message)) {			
				//Is the number of columns between the minimum and the maximum?
				if(validate_columns($columns, $configs['min_width_of_board'], $configs['max_width_of_board'], $error_message)) {
					//Are there enough words in the word list?
					$number_of_spaces = ($rows * $columns);
					$min_number_of_words = round($number_of_spaces * $configs['minimum_word_number_multiplier']);
					if(validate_number_of_words($word_list, $min_number_of_words, $rows, $columns, $error_message, $word_array)) {
						//Is the number of boards between the minimum and the maximum?
						if(validate_number_of_boards($number_of_boards, $configs['min_number_of_boards'], $configs['max_number_of_boards'], $error_message)) {
							return true;
						}
					}		
				}	
			}
		}
		return false;
	}
	
	
	//Function to make certain that the title is valid.  Basically just makes sure there is one.
	function validate_title($title, &$error_message) {
		if($title != null) {
			return true;
		} else {
			$error_message = "Need to enter a title for this bingo game.";
			return false;
		}
	}
	
	//Function to validate the chosen number of rows.  Checks that 1) there is a chosen value,
	//2) it is a number, 3) it is less than or equal to max, and 4) greater than or equal to min.
	function validate_rows($rows, $min, $max, &$error_message) {
		if($rows != null) {
			if(!filter_var($rows, FILTER_VALIDATE_INT) === false) {
				if($rows <= $max) {
					if($rows >= $min) {
						return true;
					} else {
						$error_message = "Not enough rows!  The minimum height of the board is $min.";
						return false;
					}
				} else {
					$error_message = "Too many rows!  The maximum height of the board is $max.";
					return false;
				}
			} else {
				$error_message = "That is not an integer!  The height of the board must be an integer.";
				return false;
			}
		} else {
			$error_message = "Must specify the height of the board!";
			return false;
		}		
	}
	
	//Function to validate the chosen number of columns.  Checks that 1) there is a chosen value,
	//2) it is a number, 3) it is less than or equal to max, and 4) greater than or equal to min.
	function validate_columns($columns, $min, $max, &$error_message) {
		if($columns != null) {
			if(!filter_var($columns, FILTER_VALIDATE_INT) === false) {
				if($columns <= $max) {
					if($columns >= $min) {
						return true;
					} else {
						$error_message = "Not enough columns!  The minimum width of the board is $min.";
						return false;
					}
				} else {
					$error_message = "Too many columns!  The maximum width of the board is $max.";
					return false;
				}
			} else {
				$error_message = "That is not an integer!  The width of the board must be an integer.";
				return false;
			}
		} else {
			$error_message = "Must specify the width of the board!";
			return false;
		}		
	}
	
	//Function to validate the word list.  It 1) trims the list to remove leading or trailing whitespace
	//or \n characters, 2) calls explode() to create an array of strings, 3) trims each word to make sure
	//there are no pesky \n characters hanging on (testing revealed that there was sometimes), 4) selects 
	//only the unique values, and then 5) counts the words.  Returns true if there are enough words, or
	//false with an error message if not enough.
	function validate_number_of_words($word_list, $min, $rows, $columns, &$error_message, &$word_array) {
		if($word_list != null) {
			$test_word_array = explode("\n",trim($word_list));
			//remove any hidden delimiters
			$no_delimiters_array = array();
			foreach($test_word_array as $word) {
				array_push($no_delimiters_array, trim($word));
			}
			$unique_word_array = array_unique($no_delimiters_array, SORT_STRING);
			$count = count($unique_word_array);
			if($count >= $min) {
				$word_array = $unique_word_array;
				return true;
			} else {
				$more = $min - $count;
				$error_message = "Not enough words.  Please enter at least $more more word(s).";
				return false;
			}
		} else {
			$error_message = "Must enter a list of at least $min words for a $rows x $columns board.";
			return false;
		}
	}
	
	//Function to validate the chosen number of boards.  Checks that 1) there is a chosen value,
	//2) it is a number, 3) it is less than or equal to max, and 4) greater than or equal to min.
	function validate_number_of_boards($number_of_boards, $min, $max, &$error_message) {
		if($number_of_boards != null) {
			if(!filter_var($number_of_boards, FILTER_VALIDATE_INT) === false) {
				if($number_of_boards <= $max) {
					if($number_of_boards >= $min) {
						return true;
					} else {
						$error_message = "Not enough boards!  The minimum number of boards is $min.";
						return false;
					}
				} else {
					$error_message = "Too many boards!  The maximum number of boards is $max.";
					return false;
				}
			} else {
				$error_message = "That is not an integer!  The number of boards must be an integer.";
				return false;
			}
		} else {
			$error_message = "Must specify the number of boards!";
			return false;
		}		
	}
?>