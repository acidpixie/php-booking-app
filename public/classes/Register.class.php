<?php

class Registration {

    private $id;
    private $firstname;
    private $surname;
    private $email;
    private $password;

    private $storage = "data.json";
    private $storedUsers;
    private $newUser;

    public $error;
    public $success;

    public function __construct($id, $firstname, $surname, $email, $password) 
    {
        
        $this->id = $id;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;

        $this->storedUsers = json_decode(file_get_contents($this->storage),true);

        $this->newUser = [
            "id"=> $this->id,
            "firstname" => $this->firstname,
            "surname" => $this->surname,
            "email" => $this->email,
            "password" => $this->password,
        ];

        if ($this->checkFieldInputs()){
            $this->insertUser();
        }

    }

    public function checkFieldInputs(){
        if(empty($this->email) || empty($this->password) || empty($this->firstname) || empty($this->surname)){
            $this->error = "All fields are required.";
            return false;
        }else{
            return true;
        }
    }

    public function userExists(){
        foreach($this->storedUsers as $user){
            if($this->email == $user['email']){
                $this->error = "Email is already registered. Please login.";
                return true;
            }
        }
        return false;
    }

    public function insertUser(){
        if($this->userExists() == FALSE){
            array_push($this->storedUsers, $this->newUser);
            if(file_put_contents($this->storage, json_encode($this->storedUsers, JSON_PRETTY_PRINT))){
                return $this->success = "Registration Successful";
            }else{
                return $this->success = "Error Occured. Please try again.";
            }
        }
    }
}

   
?>