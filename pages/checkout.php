<?php

require "../classes/booking";
require "../classes/hotel";
require "../classes/user";
require "../includes/dataHotel.inc";

$pageTitle = "Checkout";
session_start();

$userHotelChoice;

if (isset($_POST['book'])) {

    try {
        createHotel("../includes/dataHotel.json");
     } catch (Exception $err) {
        echo "Error in loading hotels . + $err ";
    }

    //hotel choice on form
    foreach ($_SESSION['hotels'] as $hotel) {
        if ($hotel->getName() == $_POST['choice']) {

            $hotelChoice = $hotel;
        }
    }

    //creating booking option
    try {
        $newBooking = new Booking(
            rand(1000,9000),
            $_SESSION['checkIn'],
            $_SESSION['checkOut'],
            $_SESSION['duration'],
            $_SESSION['cost'],
            $hotelChoice->getName()
        );


    } catch (Exception $err) {
        echo "Error creating booking . + $err";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">

    <title>Confirm Booking</title>
</head>
<body>


<!-- add in customer and booking infromation to be included on email -->
    
</body>
</html>