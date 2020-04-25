<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

ob_start();
$page_title = ' Project ABCD > My favorite';
include('header.php'); 
$cookie_name = "favorite_dress";
?>
<html>
<body>
<h2 id="title">Favorite Dress</h2><br>
<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Your favorite dress is not set, go to preferences and enter your favorite dress.";
} else {
     $favoriteDressName = $_COOKIE[$cookie_name];
    header('location: display_the_dress.php?name='.$favoriteDressName);
}
?>
</body>
</html>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>
