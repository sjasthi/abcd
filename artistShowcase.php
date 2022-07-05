<?php

if(!isset($_SESSION))
{
    session_start();
}

require 'bin/functions.php';
require 'db_configuration.php';
include('header.php');

?>

<html>

<head>
    <title>ABCD</title>
</head>
<style>
    .image {
        /* width: 125px;
        height: 175px; */
       /* width: 250px;
        height: 350px;*/
        padding: 8px 8px 8px 8px;
        transition: transform .2s;
    }

    .image:hover {
        abc transform: scale(1.2)
    }

    #table_1 {
        border-spacing: 300px 0px;
    }

    #table_2 {
        margin-left: auto;
        margin-right: auto;
    }

    #silc {
        width: 300;
        height: 85;
    }

    #welcome {
        text-align: center;
    }

    #directions {
        text-align: center;
    }

    #title {
        color: black;
        text-align: center;
    }

    a:visited,
    a:link,
    a:active {
        text-decoration: none;
    }

    #title2 {
        text-align: center;
        color: darkgoldenrod;
    }
</style>

<body>

	<h1 id="title2">Product Showcase</h1>
    <h2 id="directions">Scroll down to view artists and their products available for purchase using the site art.</h2><br>
    
    <button name="artist_register" type="button" 
    
    
