<?php

class Booking {

    private $id;
    private $startDate;
    private $endDate;
    private $duration;
    private $totalCost;
    private $hotelName;

    public function __construct( $id, $startDate, $endDate, $duration, $totalCost, $hotelName) 
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->duration = $duration;
        $this->totalCost = $totalCost;
        $this->hotelName = $hotelName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }


    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }


    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }


    public function getTotalCost()
    {
        return $this->totalCost;
    }

    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
        return $this;
    }


    public function getHotelName()
    {
        return $this->hotelName;
    }

    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
        return $this;
    }
}

// $hotel->getCost() * $days = $totalCost;

if (isset ($_POST['book'])) {

    try {
        createHotel("./includes/hotelData.json");
    } catch (Exception $err) {
        echo " Error loading hotels.. '+ $err ";
    }

    //get hotel choice and display on checkout form
    foreach ($_SESSION['hotels'] as $hotel) {
        if ($hotel->getName() == $_POST['hotelChoice']) {
            $hotelChoice = $hotel;
        }
    };


}