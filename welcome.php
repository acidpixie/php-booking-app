<?php session_start();?>

<?php 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
?>

<?php

include './includes/autoloader.inc.php';

//create user object from input data
$_SESSION['user'] = new Customer(
    
    rand(100,999), //generate random number for customer id
    $_POST['firstname'],
    $_POST['surname'],
    $_POST['email'],

    $_SESSION['user'] = $user
);

var_dump($_SESSION['user']);



?>

<?php 

//store date variables in session
$_SESSION['duration'] = $duration; //variable undefinded
$_SESSION['checkin'] = $_POST['checkin'];
$_SESSION['checkout'] = $_POST['checkout'];

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

<h4>Welcome <?php echo $_SESSION['user']->getFirstname() ?></h4>

<p>Find your perfect destination stay</p>

<div class="dateForm">

<form class="form2" action="#" method="post">
    <label>Check-In Date:</label>
    <input type="date" name="checkin" required>

    <label>Check-Out Date:</label>
    <input type="date" name="checkout" required>

    <input type="submit" name="confirmDateBtn" value="confrim">
</form>

</div>

<div>


<?php

if ( isset($_POST['confirmDateBtn'])) {

echo "Your checkin date is" . $_POST['checkin']; 

echo "Your checkout date is" . $_POST['checkout'];

}
?>



</div>



</body> 