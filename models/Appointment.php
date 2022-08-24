<?php
class Appointment
{
    private int $id;
    private string $dateHour;
    private int $idPatients;
    private $pdo;

    public function __construct(string $dateHour='', int $idPatients= 0)
    {
        $this->dateHour = $dateHour;
        $this->idPatients = $idPatients;
        $this->pdoConnect = Database::DBconnect();

    }
    // get / set Id

    public function getId() : int
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

    // ENREGISTREMENT D'UN RENDEZ VOUS ASSOCIE AU PATIENT
    public function save () : bool { 
        try {
            $sth = $this->pdoConnect->prepare("INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)");
            $sth->bindValue(':dateHour', $this->getDateHour(), PDO::PARAM_STR);
            $sth->bindValue(':idPatients', $this->getidPatients(), PDO::PARAM_INT);
            return $sth->execute();
        }
        catch (PDOException $ex) {
            return false;
        }                
    }

    // LECTURE D'UN RENDEZ VOUS DANS LA BDD
    public static function select (int $idSelected) : mixed {
        $pdoConnect = Database::DBconnect();
        try {
            $sql = "SELECT `id`, `dateHour`, `idPatients` FROM `appointments` WHERE `id` = $idSelected;";
            $sth = $pdoConnect->query($sql);
            $arrayAppointment = $sth->fetch(PDO::FETCH_OBJ);
            return $arrayAppointment;
        }
        catch (PDOException $ex) {
            return false;
        }                
    }

    // LECTURE DE TOUS LES RENDEZ-VOUS DANS LA BDD
    public static function selectAll () : array {
        $arrayAppointments = [];
        $pdoConnect = Database::DBconnect();
        try {
            $sql = "SELECT `id`, `dateHour`, `idPatients` FROM `appointments` WHERE 1;";
            $sth = $pdoConnect->query($sql);
            $appointments = $sth->fetchAll(PDO::FETCH_OBJ);
            foreach ($appointments as $key => $appointment) {
                $arrayAppointments[$key][0] = $appointment->id;
                $arrayAppointments[$key][1] = $appointment->dateHour;
                $arrayAppointments[$key][2] = $appointment->idPatients;                        
            }
            return $arrayAppointments;
        }
        catch (PDOException $ex) {
            return $arrayAppointments = [];
        }                
    }  

    // MODIFICATION D'UN RENDEZ VOUS EN BDD
    public function update (int $idSelected) : bool {
        try {
            $sth = $this->pdoConnect->prepare("UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients WHERE id = $idSelected;"); 
            $sth->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
            $sth->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_INT);
            if(!$sth->execute()) {
                throw new PDOException("Problème lors de la mise à jour");
            } else {
                return true;
            }
        }
        catch (PDOException $ex) {
            return false;
        }                  
    }   
    
    // LECTURE DE LE OU LES RENDEZ VOUS D'UN MEME PATIENT
    public static function selectFromPatient (int $idSelected) : array {
        $arrayAppointment = [];
        $pdoConnect = Database::DBconnect();
        try {
            $sql = "SELECT `id`, `dateHour` FROM `appointments` WHERE `idPatients` = $idSelected;"; 
            $sth = $pdoConnect->query($sql);
            $appointments = $sth->fetchAll(PDO::FETCH_OBJ);
            foreach ($appointments as $key => $appointment) {
                $arrayAppointment[$key][0] = $appointment->id;
                $arrayAppointment[$key][1] = $appointment->dateHour;                        
            }
            return $arrayAppointment;
        }
        catch (PDOException $ex) {
            return $arrayAppointment = [];
        }                
    }  

    // SUPPRESSION DU RENDEZ-VOUS CIBLE DANS LA BDD
    public static function delete (int $idSelected) : bool {
        $pdoConnect = Database::DBconnect();
        try {
            $sql = "DELETE FROM `appointments` WHERE `id` = $idSelected;"; 
            $sth = $pdoConnect->query($sql);
            return true;
        }
        catch (PDOException $ex) {
            return false;
        }                
    }

    // SUPPRESSION DES RENDEZ-VOUS DANS LA BDD AVEC L'ID DU PATIENT
    public static function deleteFromPatient (int $idSelected) : bool {
        $pdoConnect = Database::db_Connect();
        try {
            $sql = "DELETE FROM `appointments` WHERE `idPatients` = $idSelected;"; 
            $sth = $pdoConnect->query($sql);
            return true;
        }
        catch (PDOException $ex) {
            return false;
        }                
    }
}

?>