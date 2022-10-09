<?php

class Booking {

    private $id;
    private $checkIn;
    private $checkOut;
    private $duration;
    private $cost;
    private $hotelName;

    public function __construct($id, $checkIn, $checkOut, $duration, $cost, $hotelName) 
    {
        $this->id = $id;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->duration = $duration;
        $this->cost = $cost;
        $this->hotelName = $hotelName;

    }

    //getter and setter for id

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;

    }

    //getter and setter for checkin

    public function getCheckIn() {
        return $this->checkIn;
    }

    public function setCheckIn($checkIn) {
        $this->id = $checkIn;

        return $this;

    }

    //getter and setter for checkout

    public function getCheckOut() {
        return $this->checkOut;
    }

    public function setCheckOut($checkOut) {
        $this->id = $checkOut;

        return $this;

    }

    //getter and setter for duration

    public function getDuration() {
        return $this->duration;
    }

    public function setDuration($duration) {
        $this->id = $duration;

        return $this;

    }

    //getter and setter for cost

    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->id = $cost;

        return $this;

    }

    //getter and setter for hotel name

    public function getHotelName() {
        return $this->hotelName;
    }

    public function setHotelName($hotelName) {
        $this->id = $hotelName;

        return $this;

    }
    
}
