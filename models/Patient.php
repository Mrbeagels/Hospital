<?php
class Patient
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;

    public function __construct($id = 0)
    {
        $this->id = $id;
        $this ->id = $id ++;
    }
        // get / set Id

        public function getId() : string
        {
            return $this -> id;
        }
    
        public function setId(string $id) : void
        {
            $this ->id = $id;
        }

        // get / set lastname
        public function getLastname() : string
        {
            return $this -> lastname;
        }

        public function setLastname( string $lastname) : void
        {
            $this ->lastname = $lastname;
        }

        // get / set firstname
        public function getFirstname() : string
        {
            return $this -> firstname;
        }

        public function setFirstname(string $firstname) : void
        {
            $this ->firstname =$firstname;
        }

        // get / set birthdate

        public function getBirthdate() : string
        {
            return $this -> birthdate;
        }

        public function setBirthdate( string $birthdate) : void
        {
            $this ->birthdate =$birthdate;
        }

        // get / set phone

        public function getPhone() : string
        {
            return $this -> phone;
        }

        public function setPhone( string $phone) : void
        {
            $this ->phone =$phone;
        }

        // get / set mail
        public function getMail() : string
        {
            return $this -> mail;
        }

        public function setMail( string $mail) :void
        {
            $this ->mail =$mail;
        }

}

?>