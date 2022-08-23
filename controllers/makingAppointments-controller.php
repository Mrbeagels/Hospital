<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');



if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $dateHour = filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($dateHour)) {

            $dateHourObj = DateTime::createFromFormat('Y-m-d- \T H:i', $dateHour);
            $currentDateObj = new DateTime();
            if(!$dateHourObj){
                $error["dateHour"] = "La date entrée n'est pas valide!";
            } 
        }
        var_dump($idPatients);
        die;

    
        if(empty($error)){
            $appointment = new Appointment;
            $appointment->setDateHour($dateHour);
            $appointment->getIdPatients($idPatients);
            $errorSave=$appointment->save();
            var_dump($dateHour);
            die;
            if($errorSave){
                header('location: confirmation-controller.php');
            }
        } else {
            var_dump($error);
        }
}

include(__DIR__.'/../views/header.php');
require_once(dirname(__FILE__) . '/../views/makingAppointments.php');
require_once(__DIR__.'/../views/footer.php');
