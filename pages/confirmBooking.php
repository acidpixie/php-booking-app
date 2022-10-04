<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pageTitle ="Compare Hotels";
session_start();

require "../classes/booking.php";
require "../classes/hotel.php";
require "../classes/user.php";
require "../includes/calc.inc.php";
require "../includes/hotel.inc.php";

if (isset($_POST['clientInfo'])) {

    //create user
    $_SESSION['client'] = new User (
        rand(1000,9000),
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
    );

    //create Hotels

    try {
        createHotel("..includes/dataHotel.json");
    } catch (Exception $err) {
        echo "Error in loading Hotels . + $err";
    }

    //calculate duration
    try {
        $duration = calc( $_POST['checkIn'], $POST['checkOut']);
    } catch (Exception $err) {
        echo "Error occurred in calculation of lenght of stay . + $err";
    }

    //save session info

    $_SESSION['duration'] = $duration;
    $_SESSION['checkIn'] = $_POST['checkIn'];
    $_SESSION['checkOut'] = $_POST['checkOut'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">


    <title>Compare Hotels</title>
</head>
<body>

 <h4> Welcome <?php echo $_SESSION['client']->getFirstname() ?> ! </h4> 

<div>

<?php

foreach ($_SESSION['hotels'] as $hotel) {

    echo '

    <div class="bookingInfo">

        <img src="../../public/resource/'. $hotel->getImage() .'" alt="Placeholder image">
        <p>'. $hotel->getName() .'</p>
        <p>Duration of stay:'.$duration.'</p>
        <p>Cost: R'. $hotel->getCost(). ',00</p>
        <p>Facilities:</p>
        <ul>
        ';
        foreach ($hotel->getFacilities() as $facility) {
            echo "<li>$facility</li>";
        }
         echo '
        </ul>
        <p>Total Cost: R '. $hotel->getCost() * $duration .' </p>

        <form action="./checkout.php" method="post" >
        <input type="hidden" name="cost" value="'. $hotel->getCost() .'">
        <input type="hidden" name="totalCost" value="'. $hotel->getCost() * $duration .'">
        <input type="hidden" name="choice" value="'. $hotel->getName() .'">
        <input type="submit" name="book" value="Book">
        </form>
        

    </div>
    ';
} ?>

</div>
    
</body>

</html>