<?php session_start();?>

<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
?>

<?php

require ("./classes/customer.php");

//create user object from input data
$_SESSION['user'] = new Customer(
    
    rand(100,999), //generate random number for customer id
    $_POST['firstname'],
    $_POST['surname'],
    $_POST['email']
);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script type="text/javascript" src="./js/script.js" defer> </script>  

    <title>Welcome Page</title>   
</head>


<body>

Welcome <?php echo $_SESSION['user']->getFirstname() ?> <br>
Your email address is <?php echo $_POST['email']; ?>


</body>