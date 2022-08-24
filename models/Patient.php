<?php

require_once(dirname(__FILE__) . '/../helpers/connexion.php');

class Patient
{
    // les attibuts

    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private $pdo;

    // Le construct

    public function __construct(string $lastname = '', string $firstname = '', string $birthdate = '', string $phone = '', string $mail = '')
    {       $this->setLastname($lastname);
            $this->setfirstname($firstname);
            $this->setBirthdate($birthdate);
            $this->setPhone($phone);
            $this->setMail($mail);
        $this->pdo = DATABASE::DBconnect();
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

        // Création d'une méthode afin de voir un mail est déjà enregistrer 
        public static function isMailExists(string $mail) : mixed
        {
            try{
                
                $pdo =DATABASE::DBconnect();
                $sql = "SELECT `id` FROM `patients` WHERE `mail` =:mail";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
                if( $sth->execute()){
                    $row = $sth->fetch();
                    return($row)?1:0;
                }
                else{
                    return 2;
                }
                }catch(PDOException $ex){
                        return 2;
                }
        }

        public static function getByMail (string $mail) : mixed
        {
            $pdo = DATABASE::DBconnect();
            try{
                $sql="SELECT * FROM `patients` WHERE `mail` = :mail";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
                if(!$sth->execute()) {
                    throw new PDOException(("probleme dans la requete"));
                }else{
                    return  $sth->FETCH();
                }
            }
            catch (PDOException $ex){
                return false;
            }
        }

        // ici je créer une fonction save qui est call dans le addpatient-controller afin de sauvegarder les patient
        public function save () : bool 
        {
            try{
                $sql ='INSERT INTO patients ( `lastname`,`firstname`, `birthdate`,`phone` ,`mail`) VALUE (
                    :lastname,
                    :firstname,
                    :birthdate,
                    :phone,
                    :mail
                    )';
                    $sth=$this->pdo->prepare($sql);
                    $sth->bindValue(':lastname', $this->lastname, pdo::PARAM_STR);
                    $sth->bindValue(':firstname', $this->firstname, pdo::PARAM_STR);
                    $sth->bindValue(':birthdate', $this->birthdate, pdo::PARAM_STR);
                    $sth->bindValue(':phone', $this->phone, pdo::PARAM_STR);
                    $sth->bindValue(':mail', $this->mail, pdo::PARAM_STR);
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

         // LECTURE DE TOUS LES PATIENTS DANS LA BDD
        public static function getAll () : array {
            $arrayPatients = [];
            $pdoConnect = Database::DBconnect();
            try {
                $sql = "SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE 1;";
                $sth = $pdoConnect->query($sql);
                $patients = $sth->fetchAll(PDO::FETCH_OBJ);
                foreach ($patients as $key => $client) {
                    $arrayPatients[$key][0] = $client->id;
                    $arrayPatients[$key][1] = $client->lastname;
                    $arrayPatients[$key][2] = $client->firstname;
                    $arrayPatients[$key][3] = $client->birthdate;
                    $arrayPatients[$key][4] = $client->phone;
                    $arrayPatients[$key][5] = $client->mail;                            
                }
                return $arrayPatients;
            }
            catch (PDOException $ex) {
                return $arrayPatients = [];
            }                
        }   

        public static function showProfil($id) : object
        {
            try{
                // connexion a la BDD
                $pdo = DATABASE::DBconnect();
                 // La requete en elle meme 
                $sql="SELECT * FROM `Patients` WHERE `id` = :id ";
                 // préparation de la requete
                $sth=$pdo->prepare($sql);
                $sth->bindValue(':id', $id, pdo::PARAM_INT);
                // on exécute la requete
                if($sth->execute()){
                    $idPatient=$sth->fetch();
                        return $idPatient;
                } else {
                    return[];
                }
            }
            catch  (PDOException $ex)
            {
                return [];
            }
        }

        // LECTURE D'UN PATIENT DANS LA BDD
        public static function select (int $idSelected) : mixed {
            $pdoConnect = Database::DBconnect();
            try {
                $sql = "SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = $idSelected;";
                $sth = $pdoConnect->query($sql);
                $arrayPatient = $sth->fetch(PDO::FETCH_OBJ);
                return $arrayPatient;
            }
            catch (PDOException $ex) {
                return false;
            }                
        }

        public function update($id){
            try{
                    $sql=   "UPDATE `patients` 
                            SET `lastname`=:lastname,
                            `firstname`=:firstname,
                            `birthdate`=:birthdate,
                            `phone`=:phone ,
                            `mail`=:mail 
                            WHERE `id`= :id";

                    $sth=$this->pdo->prepare($sql);
                    $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
                    $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
                    $sth->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
                    $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
                    $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
                    $sth->bindValue(':id',$id,PDO::PARAM_INT);
                    $result=$sth->execute();
                    if(!$result){
                        throw new PDOException("problémes lors de la modification de votre profil");
                    }
                    return true;
            }catch (PDOException $ex){
                echo'mdr' .$ex->getMessage();
                return false;
            }
        }

        // SUPPRESSION DU RENDEZ-VOUS CIBLE DANS LA BDD function de stephane, a voir si il faut la mofifier
        public static function delete (int $idSelected) : bool {
            $pdoConnect = Database::dbConnect();
            try {
                $sql = "DELETE FROM `patients` WHERE `id` = $idSelected;"; 
                $sth = $pdoConnect->query($sql);
                return true;
            }
            catch (PDOException $ex) {
                return false;
            }                
        }
    
}

?>