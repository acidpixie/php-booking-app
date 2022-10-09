<?php
// link to hotel class
// create function to load hotel data from json file

function createHotel($url) {

    $SESSION['hotels'] = [];
    $hotelData = json_decode(file_get_contents($url));

    foreach($hotelData as $info) {

        $newHotel = new Hotel(
            $info->id,
            $info->name,
            $info->cost,
            $info->facilities,
            $info->image,
        );

        array_push($_SESSION['hotels'], $newHotel);
    }  
}