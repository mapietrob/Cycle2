<?php
//start the session - used for login
session_start();

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');

//Include Files
require_once "connect.php";

//Initial Variable
$currentFile = basename($_SERVER['SCRIPT_FILENAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Color Palette Generator</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<header>
    <div id="branding">
        <img src='media/logo.png' alt='BG Logo' width='50' height='50'>
        <h1>Color Palette Generator</h1>
    </div>

    <?php
    // Displays project name
    echo "<p>Your Creative Color Solutions</p>";
    ?>

    <nav>
        <?php
        // Navigation Links
        echo ($currentFile == "index.php") ? "Home " : "<a href='index.php'>Home</a>";
        echo ($currentFile == "viewPalettes.php") ? "View " : "<a href='viewPalettes.php'>View</a>";
        ?>
    </nav>
</header>
<main>
    <h2><?php if(isset($pageName)) echo $pageName;?></h2>