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
    public function getDateHour() : string
    {
        return $this -> dateHour;
    }

    public function setDateHour (string $dateHour) : void
    {
        $this ->dateHour = $dateHour;
    }
    // get / set idPatients
    public function getIdPatients() : int
    {
        return $this -> idPatients;
    }

    public function setIdPatients( int $idPatients) : void
    {
        $this ->idPatients = $idPatients;
    }

    public function save () : bool
    {
        try{
            $sql ='INSERT INTO appointments ( `dateHour`, `idPatients`) VALUE (
                :dateHour,
                :idPatients
                )';
                $sth=$this->pdo->prepare($sql);
                $sth->bindValue(':dateHour', $this->dateHour, pdo::PARAM_STR);
                // Voir si ici le probléme n'est pas le $this car il symbolise le fait que je recherche dans cette taable, or, ici il y a une jointure
                $sth->bindValue(':idPatients', $this->idPatients, pdo::PARAM_INT);
                $result=$sth->execute();
                if(!$result){
                    throw new PDOException("problémes lors de l'enregistrement SQL");
                }
                return true;
        }catch (PDOException $ex){
            echo'mdr' .$ex->getMessage();
            return false;
        }
    }
}

?>