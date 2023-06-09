<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "ApexDB";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Ups! Coś nie wyszło...;");
}
