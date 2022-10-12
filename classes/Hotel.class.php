<?php

class Hotel {

    private $id;
    private $name;
    private $cost;
    private $facilities;
    private $image;

    public function __construct( $id, $name, $cost, $facilities, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->facilities = $facilities;
        $this->image = $image;
    }

    //getters and setters

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }


    public function getFacilities()
    {
        return $this->facilities;
    }

    public function setFacilities($facilities)
    {
        $this->cost = $facilities;
        return $this;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

}

function createHotel() {

    $_SESSION['hotels'] = [];

    $jsonData = file_get_contents('./includes/hotelData.json');

    $hotelData = json_decode($jsonData);

    foreach($hotelData as $data) {

        $newHotel = new Hotel (
            $data->id,
            $data->name,
            $data->cost,
            $data->facilities,
            $data->image,
        );

     //   $data->newHotel = $newHotel;
      //  return $data;

      $_SESSION['newHotel'] = $newHotel;

        array_push($_SESSION['hotels'], $newHotel);
    }


}

?>
