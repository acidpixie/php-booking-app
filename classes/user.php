<?php 

class User {

    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email) 
    {
        $this->id = $id;
        $this->name = $name;
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

    public function getName() 
    {
        return $this->name;
    }

    public function setName($name) 
    {
        return $this->name;
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