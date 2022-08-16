<?php
class Appointment
{
    private $id;
    private $dateHour;
    private $idPatients;

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
    // get / set dateHour
    public function getdateHour()
    {
        return $this -> dateHour;
    }

    public function setdateHour($dateHour)
    {
        $this ->dateHour = $dateHour;
    }
    // get / set idPatients
    public function getidPatients()
    {
        return $this -> idPatients;
    }

    public function setidPatients($idPatients)
    {
        $this ->idPatients = $idPatients;
    }
}

?>