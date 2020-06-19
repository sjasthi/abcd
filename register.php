<?php
/* User registers as a new user, (checks if user exists and password is correct) */
// require 'db_configuration.php';
// Escape email to protect against SQL injections
//include $db_configuration.php

$pass = $db->escape_string($_GET['password']);
$email = $db->escape_string($_GET['email']);
$sql = "INSERT INTO 'users' (`first_name`, last_name`, `email`, 'password')
                    VALUES ('$first_name', '$last_name', '$email', '$password')";
$result = $db->query($sql);
echo "$first_name', '$last_name', '$email', '$password";
header("location: index.php");
echo hello;

-- if ( $result->num_rows == 0 ){ // User doesn't exist
--     $_SESSION['message'] = "User with that email doesn't exist!";
--     header("location: error.php");
-- }
-- else { // User exists
--     $user = $result->fetch_assoc();

--     if ( password_verify($_POST['password'], $user['hash']) ) {

        
--         $_SESSION['first_name'] = $user['first_name'];
--         $_SESSION['last_name'] = $user['last_name'];
--         $_SESSION['email'] = $user['email'];
--         $_SESSION['password'] = $user['hash'];
--         $_SESSION['active'] = $user['active'];
--         $_SESSION['role'] = $user['role'];


--         // This is how we'll know the user is logged in
--         $_SESSION['logged_in'] = true;

        
--     }
--     else {
--         $_SESSION['message'] = "You have entered wrong password, try again!";
--         header("location: error.php");
--     }
-- }



