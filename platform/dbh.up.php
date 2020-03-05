<?php

//session_start();

$servername = "localhost";
$dbUsername = $_SESSION['userUid'];
$dbPassword = $_SESSION['pwd'];
$dbName = "website_project";

//database connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}