<?php
// link to hotel class
// create function to load hotel data from json file

function createHotel($hotelData) {

    $SESSION['hotels'] = [];

    $jsonData = file_get_contents('hotel.json');

    $hotelData = json_decode($jsonData);

    
    ;

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