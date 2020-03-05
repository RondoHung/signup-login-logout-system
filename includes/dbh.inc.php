<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "website_project";

//Connect Database
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

//If no connection, return error
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}