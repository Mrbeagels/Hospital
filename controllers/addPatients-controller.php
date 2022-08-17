<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/Patient.php');

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

                //===================== email : Nettoyage et validation =======================
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if (!empty($mail)) {
        $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testMail) {
            $error["mail"] = "L'adresse email n'est pas au bon format!!";
        }
    } else {
        $error["mail"] = "L'adresse mail est obligatoire!!";
    }
//===================== phone : Nettoyage et validation =======================
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($phone)){
        $testRegex = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
        if (!$testRegex) {
            $error["phone"] = "Vous devez entrer un numéro de téléphone valide";
        }
    }
}

if(empty($error)){
    $patient = new patient;
    $patient->setFirstname($firstname);
    $patient->setLastname($lastname);
    $patient->setBirthdate($birthdate);
    $patient->setMail($mail);
    $patient->setPhone($phone);
    $error['save']=$patient->save();
} else {
    var_dump($error);
}


include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/addPatients.php');
include(__DIR__.'/../views/footer.php');
