<?php
require_once(dirname(__FILE__) . '/../models/Patient.php');
// Je recupere les données envoyé dans l'url, ici l'id du patient

// je sanitize la données pour eviter les injection de code
$id= intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
// J'applique ma methode show patient a cette id sanitize
// passage de $idpatient  vers objPatient
$objPatient = Patient::showProfil($id);
if (!$objPatient){
    $error = "le patient n'existe pas";
}

// Je traite une deuxieme fois le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //===================== Lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
        // On vérifie que ce n'est pas vide
        if (!empty($lastname)) {
            $testRegex = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$testRegex) {
                $error["lastname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom n'est pas bon";
                }
            }
        } else { // Pour les champs obligatoires, on retourne une erreur
            $error["lastname"] = "Vous devez entrer un nom!!";
        }

        //===================== firstname : Nettoyage et validation =======================
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($firstname)) {
        $testRegex = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["firstname"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["firstname"] = "Vous devez entrer un prénom!!";
    }

        //===================== birthdate : Nettoyage et validation =======================
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($birthdate)) {
            $birthdateObj = DateTime::createFromFormat('Y-m-d', $birthdate);
            $currentDateObj = new DateTime();
            if(!$birthdateObj){
                $error["birthdate"] = "La date entrée n'est pas valide!";
            } else {
                $diff = $birthdateObj->diff($currentDateObj);
                $age = $diff->days/365;
                if (!$birthdateObj || $diff->invert == 1 || $birthdateObj->format('Y-m-d') !== $birthdate || $age==0 || $age>120) {
                    $error["birthdate"] = "La date entrée n'est pas valide!";
                }
            }
        }
//===================== phone : Nettoyage et validation =======================
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($phone)){
        $testRegex = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
        if (!$testRegex) {
            $error["phone"] = "Vous devez entrer un numéro de téléphone valide";
        }
    }
                    //===================== email : Nettoyage et validation =======================
                    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
                    if (!empty($mail)) {
                        $testmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
                        if (!$testmail) {
                            $error["mail"] = "L'adresse mail n'est pas au bon format!!";
                        }
                    } else {
                        $error["mail"] = "L'adresse mail est obligatoire!!";
                    }
                    

                if(empty($error)){
                    $patient = new patient;
                    $patient->setLastname($lastname);
                    $patient->setFirstname($firstname);
                    $patient->setBirthdate($birthdate);
                    $patient->setPhone($phone);
                    $patient->setMail($mail);
                    $patient->setId($id);
                    $errorSave=$patient->update($id);
                    if($errorSave){
                        header('location: confirmation-controller.php');
                    }
                } else {
                    var_dump($error);
                }
                }




include_once __DIR__ . '/../views/header.php';
include_once __DIR__ . '/../views/profilPatients.php';
include_once __DIR__ . '/../views/footer.php';