<?php
class User{
    private $_id;
    private $_lastname;
    private $_firstname;
    private $_email;
    private $_birthdate;
    private $_password;
    private $_pp;
    private $_active;
    private $_categorie;

    function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    // Getters
    public function getId(){
        return $this->_id;
    }

    public function getLastname(){
        return $this->_lastname;
    }

    public function getFirstname(){
        return $this->_firstname;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getBirthdate(){
        return $this->_birthdate;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getPp(){
        return $this->_pp;
    }

    public function getActive(){
        return $this->_active;
    }

    public function getCategorie(){
        return $this->_categorie;
    }

    // Setters
    public function setId($id){
        $this->_id = $id;
    }

    public function setLastname($lastname){
        $this->_lastname = $lastname;
    }

    public function setFirstname($firstname){
        $this->_firstname = $firstname;
    }

    public function setEmail($email){
        $this->_email = $email;
    }

    public function setBirthdate($birthdate){
        $this->_birthdate = $birthdate;
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function setPp($pp){
        $this->_pp = $pp;
    }

    public function setActive($active){
        $this->_active = $active;
    }

    public function setCategorie($categorie){
        $this->_categorie = $categorie;
    }




}
?>