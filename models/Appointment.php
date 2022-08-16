<?php
class Appointment
{
    private int $id;
    private string $dateHour;
    private int $idPatients;

    public function __construct()
    {

    }
    // get / set Id

    public function getId() : string
    {
        return $this -> id;
    }

    public function setId( string $id) : void
    {
        $this ->id = $id;
    }
    // get / set dateHour
    public function getdateHour() : string
    {
        return $this -> dateHour;
    }

    public function setdateHour ( string $dateHour) : void
    {
        $this ->dateHour = $dateHour;
    }
    // get / set idPatients
    public function getidPatients() : int
    {
        return $this -> idPatients;
    }

    public function setidPatients( string $idPatients) : void
    {
        $this ->idPatients = $idPatients;
    }
}

?>