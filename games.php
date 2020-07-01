<?php $page_title = 'Games'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    //verifyLogin($page);
?>

<html>

<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }

    #img {
        height: 250px;
        width: 250px;
    }

    table.center {
        margin-left: auto;
        margin-right: auto;
    }

    td {
        padding: 10px;
    }

</style>

<body>
    <h2 id="title">Games</h2>
    <br>
    <table class="center">
        <tr>
            <td><a href="/abcd/bingo.php"><img src="https://cdn.onlinewebfonts.com/svg/img_562572.png" id="img"></th></a>
            <td><a href="quiz.php"><img src="https://cdn3.iconfinder.com/data/icons/brain-games/1042/Quiz-Games-grey.png" id="img"></td></a>
        </tr>
    </table>



</body>
</html>

