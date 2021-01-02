<?php

//PDO Connection
$servername = "localhost";
$username = "root";
$passworddb = "root";
$dbname = "local";

try {
    $dbh = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
