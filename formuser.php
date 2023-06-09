<?php

require("database.php");

$cpu = $_POST['cpu'];
$gpu = $_POST['gpu'];
$dysk = $_POST['dysk'];


$sql= mysqli_query($conn,"INSERT INTO `panel`(`cpu`, `gpu`, `dysk`) VALUES ('$cpu','$gpu','$dysk')");