<?php
// link to hotel class
// create function to load hotel data from json file

function createHotel($url) {

    $SESSION['hotels'] = [];
    $hotelData = json_decode(file_get_contents($url));

    foreach($hotelData as $hotelInfo) {

        $newHotel = new Hotel(
            $hotelInfo->id,
            $hotelInfo->name,
            $hotelInfo->cost,
            $hotelInfo->facilities,
            $hotelInfo->image,
        );

        array_push($_SESSION['hotels'], $newHotel);
    }  
}



?>