<?php
// hostname

$hostname = 'ec2-54-163-255-1.compute-1.amazonaws.com';

//database name
$dbname = 'd87lfs6r51nbqq';

//database credentials
$username = 'jpftrvirwzsljg';
$password = 'd882a05c25b405ec75365f29f98ce998e2fdaefedfc1e1a3114d66471c4b40a1';

//DSN specifies the host computer for the MySQL database
$dsn = "pgsql:host=$hostname;port=5432;dbname=$dbname;user=$username;password=$password";

//connect to a database
try {
    $db = new PDO($dsn);
}
catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e) {
    $error_message = $e->getMessage();
    echo "<p> Error message: $error_message </p>";
}