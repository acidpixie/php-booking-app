<?php

//error checking code
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

include ("./classes/Customer.class.php");
include ("./classes/Hotel.class.php");
include ("./includes/calc.inc.php");
include ("./classes/Booking.class.php");

session_start();

$hotelChoice;

if (isset ($_POST['book'])) {
    //create Hotel

    try {
        createHotel("./includes/hotelData.json");
    } catch (Exception $err) {
        echo " Error loading hotels.. '+ $err ";
    }

    //get hotel choice and display on checkout form
    foreach ($_SESSION['hotels'] as $hotel) {
        if ($hotel->getName() == $_POST['hotelChoice']) {
            $hotelChoice = $hotel;
        }
    }

    //create booking object
    try {
        $newBooking = new Booking (
            rand(1000,9000),
            $_SESSION['checkin'],
            $_SESSION['checkout'],
            $_SESSION['days'],
            $_SESSION['totalCost'],  //undefined array key
            $hotelChoice['hotel'] //undefined variable
        );

        $_SESSION['newBooking'] = $newBooking;

    } catch (Exception $err) {
        echo " Error creating booking.. '+ $err ";
    }

    if ($_SESSION['totalCost'] * $_SESSION['days']) {
        return $totalCost;
    }


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
    <h4>Thank you for using Quest <?php echo $_SESSION['user']->getFirstName() ?>.</h4>
    <p>The following information about your booking will be sent through to the Hotel Manager</p>
    </div>

    <div class="customerInformation">
        <p>Customer Information:</p>
        <div class="email">
        <?php 
        echo '
                <li> Customer Id: #'. $_SESSION['user']->getId() .' </li>
                <li> Name: '. $_SESSION['user']->getFirstName() .' '. $_SESSION['user']->getSurname() .' </li>
                <li> Email Address: '. $_SESSION['user']->getEmail() .' </li>            
        ';
        ?>
        </div>

    <div class="customerInformation">
        <p>Hotel Information:</p>
        <div class="email">
        <?php 
        echo '
                <li> Hotel Id: #'.$hotel->getId().' </li>
                <li> Hotel Name: '.$hotel->getName().' </li>
                <li> Daily Cost: '.$hotel->getCost().' </li>            
        ';
        ?>
        </div>

    <div class="bookingInformation">
        <p>Booking Information</p>
        <div class="email">
            <?php 
            echo '
                <li>Booking Id: '. $newBooking->getId() .' </li>
                <li> Duration: '. $newBooking->getDuration() .' </li>
                <p> Start Date: '. $newBooking->getStartDate() .'</p>
                <p> End Date: '. $newBooking->getEndDate() .'</p>
                <li> Total Cost: R '. $hotel->getCost() * $newBooking->getDuration() .'</li>  
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