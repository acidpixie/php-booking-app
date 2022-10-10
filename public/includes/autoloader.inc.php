<?php  
spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    $path = "./public/classes/";
    $extention = ".class.php";
    $fullPath = $path . $className . $extention;

    include $fullPath;

}

//include "./classes/Booking.class.php"

// ./public/includes/hotel.json