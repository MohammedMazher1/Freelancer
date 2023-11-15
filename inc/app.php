<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Starting a session

echo 
session_start();

// In-memory user data
$users = [
    'john' => 'password123',
    'jane' => 'secret456',
];

// Function to authenticate user
function signin($username, $password)
{
    global $users;

    // Check if user exists and password matches
    if (isset($users[$username]) && $users[$username] === $password) {
        // Start a session and store the username
        // session_start();
        // $_SESSION['username'] = $username;
        $_SESSION['isSignedIn'] = true;
        return true; // Authentication successful
    }

    return false; // Authentication failed
}

// Function to check if user is logged in
function isUserSignedIn()
{
    return isset($_SESSION['isSignedIn']);
}

// Function to log out user
function signout()
{
    // session_start();
    session_unset();
    session_destroy();
}

// // Redirect to index.php
// header("Location: index.php");
// exit;