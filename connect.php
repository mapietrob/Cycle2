<?php

// Connection parameters
$dsn= "mysql:host=localhost;dbname=csci375fa23";
$user = "csci375fa23";
$pass = "csci375fa23!";

// Creates a PDO instance
$pdo = new PDO($dsn,$user,$pass);

// Sets PDO attributes for error reporting
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>