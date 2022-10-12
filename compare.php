<?php

//error checking code
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

//added in classes and includes 
include ("./classes/Customer.class.php");
include ("./classes/Hotel.class.php");
include ("./includes/calc.inc.php");

session_start();

//check if confrim button is clicked and create user object
if (isset($_POST['confirmInfo'])) {

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

   
    
 //   var_dump($_SESSION['user']);
    
    

    /* $_SESSION['user'] = new Customer(
        rand(1000,9000), //random number for user id
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],

    );  */

    $user = new Customer(
        rand(1000,9000), 
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email']
    );

    $_SESSION['user'] = $user; 

    //create Hotel

    try {
        createHotel("./includes/hotelData.json");
    } catch (Exception $err) {
        echo " Error loading hotels.. '+ $err ";
    }

    //calculate duraption of trip
    try {
        $days = calcDuration($_POST['checkin'], $_POST['checkout']);
    } catch (Exception $err) {
        echo " Error calculating duration.. '+ $err ";
    }

    //session variables
    $_SESSION['days'] = $days;
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];

    //saving user info to session superglobal

    $_SESSION['customer'] = [
        'firstname' => $firstname,
        'surname' => $surname,
        'checkin' => $checkin,
        'checkout' => $checkout,
        'days' => $days,
        ]; 
        
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/styles.css">

    <title>Compare Page</title>
</head>


<body>

    <div class="welcomeMsg">
        <h3> Welcome <?php echo $_SESSION['user']->getFirstName() ?> </h3>
        <p>Please choose a Hotel that fits your Budget</p>

    </div>

    <div class="hotelBox">
     
        <div class="card">
    <?php foreach ($_SESSION['hotels'] as $hotel)
    {
        echo '  
        <img src="./images/'.$hotel->getImage() .'" alt="hotel" width="420px" height="280px" class="hotelDiplayPic">
        </div>

        <div class="HotelContainer">
            <p> '. $hotel->getName() .' </p>
        <div class="dates">
            <p>Number of Days: '. $days . ' </p>
            <p>Facilities:
                <ul>
                '; foreach ($hotel->getFacilities() as $facilities) {
                    echo "<li>$facilities</li>";
                }
                echo '
                </ul>
            </p>
            <p>Daily Rate: R '. $hotel->getCost() .' </p>
            <p>Total Cost: R '. $hotel->getCost() * $days .' </p>
            <form action="./checkout.php" method="post" class="hotelBookingForm">
            <input type="hidden" name="cost" value= '.$hotel->getCost().' >
            <input type="hidden" name="totalCost" value='. $hotel->getCost() * $days .'>
            <input type="hidden" name="hotelChoice" value=' .$hotel->getName().'>
            <input type="submit" name="book" value="Book" class="bookingBtn">
            </form >
        </div>
    </div>
    ';}?>

    </div>

   

</body>

</html>