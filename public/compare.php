<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include("./classes/Customer.class.php");
// include("./includes/hotel.inc.php");
include("./classes/Hotel.class.php");
include("./includes/calc.inc.php");
include("./includes/autoloader.inc.php");


//if submit button is clicked, create user object.

if (isset($_POST['confirmInfo'])) {

    $_SESSION['user'] = new Customer(

        rand(100, 999), //generate random number for customer id
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
    );

    //create hotels

    try {
        createHotel("./public/includes/hotel.json");
    } catch (Exception $err) {
        echo " Error loading hotels.. '+ $err ";
    }

    //calculate duration
    try {
        $duration = calcDuration($_POST['checkin'], $_POST['checkout']);
    } catch (Exception $err) {
        echo " Error calculating duration.. '+ $err ";
    }

    //session varilable 
    $_SESSION['duration'] = $duration;
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script type="text/javascript" src="./js/script.js" defer> </script>

    <title>Compare Page</title>
</head>


<body>

    <div class="welcomeMsg">
        <h3> Welcome  <?php echo $_SESSION['user']->getFirstname() ?> </h3>
        <p>Please choose a Hotel that fits your Budget</p>

    </div>

    <div class="hotelBox">
        <?php foreach ($_SESSION['hotels'] as $hotelData) {

    echo ' -->
        <div class="card">
        <img src=".../public/resource/brokenAnvil.jpg" alt="hotel" width="420px" height="280px" class="hotelDiplayPic">
        </div>
        <div class="HotelContainer">
            <p> . $hotel->getHotel() . </p>
        <div class="dates">
            <p>Number of Days: ' . $duration . '</p> 
            <p>Facilities:
                <ul>
                ';
                 foreach ($hotelData->getFacilities() as $facilities) {
                echo "<li>$facilities</li>";}
                echo '
                </ul>
            </p>
            <p>Daily Rate: R ' . $hotelData->getCost() . ',00</p>
            <p>Total Cost: R ' . $hotelData->getCost() * $duration . '</p>
            <form action="/public/checkout.php" method="post" class="hotelBookingForm">
            <input type="hidden" name="cost" value= "' . $hotelData->getCost() . '">
            <input type="hidden" name="TotalCost" value= "' . $hotelData->getCost() * $duration . '">
            <input type="hidden" name="hotelChoice" value= "' . $hotelData->getHotel() . '">
            <input type="submit" name="book" value="Book" class="bookingBtn">
            </form >
            </div>';
    } ?>

    </div>

    </div>

</body>

</html>