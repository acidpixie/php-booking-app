<?php 

class User {

    private $id;
    private $firstname;
    private $surname;
    private $email;

    public function __construct($id, $firstname, $surname, $email) 
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
       
    }

    //Getter and Setter for id

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        return $this->id;
    }

    //Getter and Setter for name

    public function getFirstname() 
    {
        return $this->firstname;
    }

    public function setFirstname($firstname) 
    {
        return $this->firstname;
    }

    //Getter and Setter for surname

    public function getSurname() 
    {
        return $this->surname;
    }

    public function setSurname($surname) 
    {
        return $this->surname;
    }


     //Getter and Setter for email

     public function getEmail($email) 
     {
         return $this->email;
     }
 
     public function setEmail() 
     {
         return $this->email;
     }

}

?>