<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'fast';


$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection Failed: $con->connect_error");
} else {
    return $con;
}
?>