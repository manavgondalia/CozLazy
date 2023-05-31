<?php

$username = "root";
$password = "";
$server = 'localhost';
$dbname = 'userinfo';

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>