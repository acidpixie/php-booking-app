<?php
// link to hotel class
//create function to load hotel data from json data

function createHotel($url) {

    $SESSION['hotels'] = [];
    $hotelData = json_decode(file_get_contents($url));

    foreach($hotelData as $data) {

        $newHotel = new Hotel(
            $data->id,
            $data->name,
            $data->cost,
            $data->facilities,
            $data->image,

        );

        array_push($_SESSION['hotels'], $newHotel);
    }  
}



?>