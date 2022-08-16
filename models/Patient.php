<?php
class Patient
{
    protected $id;
    protected $lastname;
    protected $firstname;
    protected $birthdate;
    protected $phone;
    protected $mail;

    public function __construct($id =0)
    {
        $this->id = $id;
        $this ->id = 0;
    }
        // get / set Id

        public function getId()
        {
            return $this -> id;
        }
    
        public function setId($id)
        {
            $this ->id = $id;
        }

        // get / set lastname
        public function getLastname()
        {
            return $this -> lastname;
        }

        public function setLastname($lastname)
        {
            $this ->lastname =$lastname;
        }

        // get / set firstname
        public function getFirstname()
        {
            return $this -> firstname;
        }

        public function setFirstname($firstname)
        {
            $this ->firstname =$firstname;
        }

        // get / set birthdate

        public function getBirthdate()
        {
            return $this -> birthdate;
        }

        public function setBirthdate($birthdate)
        {
            $this ->birthdate =$birthdate;
        }

        // get / set phone

        public function getPhone()
        {
            return $this -> phone;
        }

        public function setPhone($phone)
        {
            $this ->phone =$phone;
        }

        // get / set mail
        public function getMail()
        {
            return $this -> mail;
        }

        public function setMail($mail)
        {
            $this ->mail =$mail;
        }

}

?>