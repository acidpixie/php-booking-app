<?php session_start();?>

<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
?>

<?php
include './classes/user.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Login Page</title>
</head>
<body>

<div class="pageContainer">
<div class="displayImage">
    <img src="./images/hot_air_baloons.jpg" alt="hot_air_baloons"></div>


<div class="loginForm">

    <form action="./pages/home.php" method="post">
        
        <label for 1>Name:</label>
        <input type="text" name="firstname" class="userInput" id="1">
        <label for 2>Surname:</label>
        <input type="text" name="surname" class="userInput" id="2">
        <label for 3>Email Address:</label>
        <input type="email" name="email" class="userInput" id="3">

        <button type="submit" name="loginBtn" id="button1">Login</button>

        <button type="button" name="registerBtn" id="button2">Register</button>
    </form>

    <?php

    if (isset ($_POST['loginBtn'])) {
        
    // Create instance of new User in user
    $_SESSION['user'] = new User(
        rand(1000,9000),
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email']
    );
    
    header("location: ./pages/home.php");

    }

  /*  if (isset($_POST["loginBtn"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];

        header("location: login.php");
    }

    //add in getters and setters
    //call getter to display name on login page */

    ?>

</div>


    
</body>
</html>

