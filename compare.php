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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Sketch&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./css/styles.css">

    <title>Compare Page</title>
</head>


<body>

    <div class="heroImage">
    <div class="welcomeMsg">
        <h2> Welcome <?php echo ucwords($_SESSION['user']->getFirstName()) ?> </h2>
        <h3 class="slogan">Adventure at your fingertips</h3>
        <h3 class="slogan">Choose the perfect destination that suits your pocket.</h3>
    </div>

    </div>

     <?php foreach ($_SESSION['hotels'] as $hotel)
        {
        echo '  

        <span class="contentContainer">

        <img src="./images/'.$hotel->getImage() .'" alt="hotel" width="420px" height="280px" class="hotelDiplayPic">
        
        <div class="detailsContainer>
        <div class="dates">
            <p> '. $hotel->getName() .' </p>
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
            </form>
        </div>
        </div>

        </span>
    
    ';}?>

    </div>
    </div>
    

   

</body>

</html>