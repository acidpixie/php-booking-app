<?php 

class Hotel {

    private $id;
    private $hotel;
    private $cost;
    private $facilities;
    private $image;

    public function __construct($id, $hotel, $cost, $facilities, $image)
    {
        $this->id = $id;
        $this->hotel = $hotel;
        $this->cost = $cost;
        $this->facilities = $facilities;
        $this->image = $image;
        
    }

    //getter and setter for id
    public function getId() {

        return $this->id;
    }

    public function setId($id) {

        $this->id = $id;

        return $this;
    }

    //getter and setter for hotel
    public function getHotel() {

        return $this->hotel;
    }

    public function setHotel($hotel) {

        $this->hotel = $hotel;
        
        return $this;
    }

    //getter and setter for price
    public function getCost() {

        return $this->cost;
    }

    public function setCost($cost) {

        $this->id = $cost;
        
        return $this;
    }

    //getter and setter for facilities
    public function getFacilities() {

        return $this->facilities;
    }

    public function setFacilities($facilities) {

        $this->id = $facilities;
        
        return $this;
    }

    //getter and setter for picture
    public function getImage() {

        return $this->image;
    }

    public function setImage($image) {

        $this->id = $image;
        
        return $this;
    }
}

function createHotel() {

    $SESSION['hotels'] = [];

    $jsonData = file_get_contents('./includes/hotel.json');

    $hotelData = json_decode($jsonData);


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

    $newHotel = $hotelData;
};

?>