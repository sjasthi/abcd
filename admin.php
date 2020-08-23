 
<?php $page_title = 'Admin'; ?>
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
    <h2 id="title">Admin</h2>
    <table class="center">
         <tr>
            <td><a href="users.php"><img src="https://cdn4.iconfinder.com/data/icons/universal-line/614/1017_-_User_Management-512.png" width="170" height="170"></td></a>
            <td><a href="import.php"><img src="https://cdn1.iconfinder.com/data/icons/modern-flat-app-gui-1/50/Download-512.png" width="220" height="220"></td></a>
            <td><a href="export.php"><img src="https://cdn3.iconfinder.com/data/icons/arrows-set2/32/arr32px076-512.png" width="80" height="80"></td></a>
        </tr>
    </table>

    <body>
    <table class="center">
         <tr>
         <td><a href="help.php"><img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/help-512.png" width="100" height="100"></td></a>
         
        </tr>
    </table>
     
</body>
</html>
 