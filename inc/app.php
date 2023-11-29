<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('core/database.php');

$db_server = "localhost:3307";
$db_user = "root";
$db_user_pass = "";
$db_name = "freelancer";

// echo "<h1>".$rootUri ."</h1>";
$connection = db_connect($db_server, $db_user, $db_user_pass, $db_name);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Function to authenticate user
function signin($username, $password)
{
    global $connection;
    $sql = "select * from users where name = '$username' and password = '$password'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row["id"];
        $_SESSION['isSignedIn'] = true;
        return true;
      } else {
        echo "0 results";
        return false; // Authentication failed

      }
    // Check if user exists and password matches
}

function addproject($name , $description,$user_id){
    global $connection;

    $data = array(
        'name' => $name,
        'description' => $description,
        'user_id'=> $user_id
    );
    var_dump($data);
    $result = db_insert($connection, 'projects', $data);
    return $result;
}

function proposal($propsal , $project_id,$user_id){
    global $connection;

    $data = array(
        'proposal' => $propsal,
        'project_id' => $project_id,
        'user_id'=> $user_id
    );
    $result = db_insert($connection, 'proposals', $data);
    return $result;
}

// Function to check if user is logged in
function isUserSignedIn()
{
    return isset($_SESSION['isSignedIn']);
}

// Function to log out user
function signout()
{
    // Starting a session
    // session_start();
    session_unset();
    session_destroy();
}

// // Redirect to index.php
// header("Location: index.php");
// exit;