<?php

require_once(dirname(__FILE__) . '/../helpers/connexion.php');

class Patient
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private $pdo;

    public function __construct()
    {
        $this->pdo =DBconnect();
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
        // ici je créer une fonction save qui est call dans le addpatient-controller afin de sauvegarder les patient
        public function save (){
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
                    $sth->bindValue(':phone', $this->phone, pdo::PARAM_INT);
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

        public function getAll(){
            $allPatients = [];
            try{
                // connexion a la BDD
                $pdo=DBconnect();
                // La requete en elle meme 
                $sql="SELECT * FROM `Patients` ORDER BY `lastname` DESC";
                // préparation de la requete
                $stmt=$pdo->prepare($sql);
                // on exécute la requete
                if($stmt->execute()){
                    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $key => $row) {
                    $this->rows = $rows;
                    $allPatients[$key][0]=$row->lastname;
                    $allPatients[$key][1]=$row->firstname;
                    $allPatients[$key][2]=$row->birthdate;
                    $allPatients[$key][4]=$row->phone;
                    $allPatients[$key][3]=$row->mail;
                }
                return $allPatients;
                } else {
                    return false;
                }
            } catch (PDOException $ex){
                echo 'erreur dans la requête' . $ex->getMessage();
            }
        }

}

?>