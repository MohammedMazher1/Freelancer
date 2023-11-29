<?php

// Define a constant
define('ROOT_PATH', '/freelancer');

require_once('inc/app.php');
require_once('core/database.php');
$pageName = $_SERVER['REQUEST_URI'];
$pageName = str_replace(ROOT_PATH,"",$pageName);
 
if($pageName == "/"){
    $pageName = "/home";
}
// echo isset($_POST["username"])?"<h1>".$_POST["username"]."</h1>":'';
// echo "<h1>".$_POST["username"]."</h1>";

if($pageName == "/siginin"){
    if(isUserSignedIn()){
        // Redirect to /
        header("Location: ".ROOT_PATH);
        exit;
    }else if(isset($_POST['username']) &&(isset($_POST['password']))){
        if(signin($_POST['username'], $_POST['password'])){
            // Redirect to /
            header("Location: ".ROOT_PATH."/dashbord");
            exit;
        }else{
            header("Location: ".ROOT_PATH."/siginin");
            exit;
        }
    }
    
}else if($pageName == "/signout"){
    signout();
    // Redirect to /
    header("Location: ".ROOT_PATH);
    exit;
}
else if ($pageName == "/createProject") {
    if(isUserSignedIn()){
        if(isset($_POST['name']) &&(isset($_POST['description']))){
            if(addproject($_POST['name'], $_POST['description'],$_SESSION['user_id'])){
                // Redirect to /
                header("Location: ".ROOT_PATH."/dashbord");
                exit;
            }
        }else{
            header("Location: ".ROOT_PATH."/project");
            exit;
        }
    }
    else{
        header("Location: ".ROOT_PATH.'/signout');
                exit;
    }
}else if ($pageName == "/proposal") {
    if(isUserSignedIn()){
        if(isset($_POST['proposal']) && (isset($_POST['project_id'])) && $_POST['proposal']!=""){
            echo $_POST['project_id'];
            if(proposal($_POST['proposal'], $_POST['project_id'],$_SESSION['user_id'])){
                // Redirect to /
                header("Location: ".ROOT_PATH);
                exit;
            }
        }else{
            header("Location: ".ROOT_PATH."/viewAllProjects");
            exit;
        }
    }
    else{
        header("Location: ".ROOT_PATH.'/login');
                exit;
    }
}else if ($pageName == "/projectPoroposal") {
    if(!isUserSignedIn()){
        header("Location: ".ROOT_PATH.'/login');
        exit;
    }
}



// Construct the file path
$filePath = 'pages' . $pageName . '.php';


// Check if the file exists
if (file_exists($filePath)) {
    require_once('layout/header.php');
    // Include or require the file
    require_once($filePath);
    require_once('layout/footer.php');
} else {
    require_once('layout/header.php');
    // File not found, handle the error
    require_once('pages/notfound.php');
    require_once('layout/footer.php');
}
// require_once('./layout/header.php');

// require_once('home.php');

// require_once('./layout/footer.php');