<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* require "../classes/Customer.class.php";
require "../classes/Hotel.class.php";
require "../classes/Booking.class.php";
require "../includes/hotel.inc.php";
require "../includes/calc.inc.php";
include "../includes/autoloader.inc.php"; */

include './classes/Customer.class.php';
include './includes/hotel.inc.php';
include './classes/Hotel.class.php';
include './includes/calc.inc.php';
include './classes/Booking.class.php';

$pageTitle = "checkout";
session_start();
$hotelChoice;

if (isset ($_POST['book'])) {
    //create hotels
try {
    createHotel("./includes/hotel.json");
} catch (Exception $err) {
    echo " Error loading hotels.. '+ $err ";
}

//pull in user choice from compare page
foreach ($_SESSION['hotels'] as $hotel) {
    if ($hotel->getName() == $_POST['choice']) {

        $hotelChoice = $hotel;
    }
}

//booking information
try {
    $newBooking = new Booking(
        rand(100,999), //generate random number for booking id
        $_SESSION['checkin'],
        $_SESSION['checkout'],
        $_SESSION['duration'],
        $_POST['cost'],
        $hotelChoice->getName()
    );

} catch (Exception $err) {
    echo " Error creating booking.. '+ $err "; }
}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script type="text/javascript" src="./js/script.js" defer> </script>

    <title>Checkout Page</title>
</head>

<body>

<div class="checkoutContainer">

    <div>
    <h4>Thank you for using Quest.</h4>
    <p>The following information about your booking will be sent through to the Hotel Manager</p>
    </div>

    <div class="customerInformation">
        <p>Customer Information:</p>
        <div class="email">
            <?php
            echo '
                <li> Customer Id: #'.$_SESSION['user']->getId().' </li>
                <li> Name: '.$_SESSION['user']->getFirstname().' '.$_SESSION['user']->getSurname().' </li>
                <li> Email Address: '.$_SESSION['user']->getEmail().' </li>            
            '
            ?>
        </div>

    <div class="bookingInformation">
        <p>Booking Information</p>
        <div class="email">
            <?php
            echo '
                <li> Booking Id: #'.$newBooking->getId().' <li>
                <li> Duration: '.$newBooking->getDuration().'<li>
                <p> Start Date: '.$newBooking->getcheckIn().'</p>
                <p> End Date: '.$newBooking->getcheckOut().'</p>
                <li> Total: R '.$newBooking->getCost().',00 <li>          
            ';         
            ?>
        </div>

        <div>
            <button class="checkoutBtn">Confirm Booking</button>
        </div>

    </div>
    </div>
</div>


</body>
</html>