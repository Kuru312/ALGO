<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '287290570947-i0lfpgfq38n59b04l4ugj9i47lrj6fcd.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/finals/Archidashboard.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "loginotp";

$conn = mysqli_connect($hostname, $username, $password, $database);