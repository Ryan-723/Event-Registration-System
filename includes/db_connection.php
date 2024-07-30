<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'eventregistration';

// Creating a new connection to the database
$db = new mysqli($servername, $username, $password, $dbname);


// Checking if there are errors while establishing the connection
if ($db->connect_error) {
    die('oopps... try again please');
}
