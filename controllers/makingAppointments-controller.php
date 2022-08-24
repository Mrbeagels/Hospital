<?php
// REGEX & CONNECTION
require_once(dirname(__FILE__) . '/../config/config.php');
//------------- APPOINTMENT CLASS -------------//
require_once(dirname(__FILE__) . '/../models/Appointment.php');
    //------------- PATIENT CLASS -------------//
    require(__DIR__.'/../models/Patient.php');
     //------------- ERROR MESSAGES -------------//
    $errRegister = [];
    $errAdding = [];

     //------------- INIT OF VARIABLE -------------//
    $listOfMail = '';




if ($_SERVER["REQUEST_METHOD"]=="POST"){

    // filtrage de l'adresse du patient
    $mailAppoint = trim(filter_input(INPUT_POST, 'mailAppoint', FILTER_SANITIZE_EMAIL));

    if(empty($mailAppoint)){
        $errRegister['mail']=ERROR_EMPTY;
    } else {
        $result = filter_var($mailAppoint, FILTER_VALIDATE_EMAIL);
        if($result == false){
            $errRegister['mail'] = ERROR_REGEX;
        }
    }


    // filtrage de la date du rendez-vous
    $dateAppoint = filter_input(INPUT_POST, 'dateAppoint', FILTER_SANITIZE_NUMBER_INT);
    if(!empty($dateAppoint)){
        $dateAppointObj = DateTime::createFromFormat('Y-m-d', $dateAppoint);
        if(!$dateAppointObj){

            $errRegister["dateAppoint"]= ERROR_REGEX;
        }
    } else {
        $errRegister['dateAppoint'] = ERROR_EMPTY;
    }



    // Filtrage du créneau horaire
    $hourAppoint = trim(filter_input(INPUT_POST, 'hourAppoint', FILTER_SANITIZE_SPECIAL_CHARS));
    if(!empty($hourAppoint)){
        $hourAppointObj = DateTime::createFromFormat('H:i', $hourAppoint);
        if(!$hourAppointObj){
            $errRegister["hourAppoint"]= ERROR_REGEX;
        }
    } else {
        $errRegister['hourAppoint'] = ERROR_EMPTY;
    }


    // Concaténation de la date et de l'heure
    $dateHourAppoint = $dateAppoint. ' ' . $hourAppoint;

    // S'il n'y a eu d'erreur dans le formulaire, pas de soucis
    if(empty($errRegister)) {

        // On cherche l'id du client en fonction de l'adresse mail donnée

        $objPatient = Patient::getByMail($mailAppoint);
        if($objPatient != false) {



            // On définit notre class Appointment avec les paramètres du formulaire
            $newAppointment = new Appointment($dateHourAppoint, $objPatient->id);
            

            if($newAppointment->save()) {
            } else {
                $errAdding['exist'] = 'Il y a une erreur lors de l\'enregistrement';
            }
        } else {
            $errAdding['exist'] = 'Le mail du client n\'existe pas';
        }
    } else {
        $errAdding['exist'] = 'Il y a eu une erreur dans le formulaire';
    }
}


// Liste de tous les mails existants dans la base
$listOfPatient = Patient::getAll();
foreach ($listOfPatient as $key => $list) {
    $listOfMail .= '<option value=' . $list[5] . '>';
}

    

// Views
include(__DIR__.'/../views/header.php');
require_once(dirname(__FILE__) . '/../views/makingAppointments.php');
require_once(__DIR__.'/../views/footer.php');
