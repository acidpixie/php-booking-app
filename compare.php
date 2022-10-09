<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pageTitle = "Compare Hotels";
session_start();

require "./classes/Customer.class.php";
require "./includes/hotel.inc.php";
require "./classes/Hotel.class.php";
require "./includes/calc.inc.php";

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
        createHotel("./includes/hotel.json");
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

    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script type="text/javascript" src="./js/script.js" defer> </script>

    <title>Compare Page</title>
</head>


<body>

    <div>
        <h4> Welcome <?php echo $_SESSION['user']->getFirstname() ?>! </h4>
        <p>Please choose a Hotel that fits your Budget</p>

    </div>

    <div class="hotelBox">
        <?php foreach ($_SESSION['hotels'] as $hotel) {

    echo '
        <div class="card">
            <img src="./images/' . $hotel->getImage() . '" alt="hotel">
        </div>
        <div class="HotelContainer">
            <p>' . $hotel->getName() . '</p>
        </div>
        <div class="dates">
            <p>Number of Days: ' . $duration . '</p>
            <p>Facilities:
                <ul>
                ';
                 foreach ($hotel->getFacilities() as $facilities) {
                echo "<li>$facilities</li>";}
                echo '
                </ul>
            </p>
            <p>Daily Rate: R ' . $hotel->getCost() . ',00</p>
            <p>Total Cost: R ' . $hotel->getCost() * $duration . '</p>
            <form action="./checkout.php" method="post" class="hotelBookingForm">
            <input type="hidden" name="cost" value= "' . $hotel->getCost() . '">
            <input type="hidden" name="TotalCost" value= "' . $hotel->getCost() * $duration . '">
            <input type="hidden" name="hotelChoice" value= "' . $hotel->getName() . '">
            <input type="submit" name="book" value="Book" class="bookingBtn">
            </form >';
    } ?>

    </div>

    </div>

</body>

</html>