<?php
$name = 'root';
$database = 'theriver';
$pass = '';
$host = 'localhost';
// $host = 'localhost:3307'; za skolski racunar

$con = mysqli_connect($host, $name, $pass, $database);

if (!$con) die($con);
