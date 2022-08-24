<?php
    //------------- DATABASE CONNECTION -------------//
    require(__DIR__.'/../helpers/connexion.php');

    //------------- PATIENT CLASS -------------//
    require(__DIR__.'/../models/Patient.php');

    //------------- APPOINTMENT CLASS -------------//
    require(__DIR__.'/../models/Appointment.php');

    //------------- ERROR MESSAGES -------------//
    $errRemove = [];

    // Initialisation des variables
    $allAppointmentsDisplay = '';
    $modalConfirmDelete = '';

    // On récupère tous les rendez-vous
    $arrayOfAppointments = Appointment::selectAll();

    // Affichage dynamique en fonction du nombre de rendez-vous dans la bdd
    foreach ($arrayOfAppointments as $key => $arrayOfAppointment) {

        // Initialisation des valeurs et variables pour l'affichage de tous les rendez-vous
        $arrayDateHour = explode(' ', $arrayOfAppointment[1]);

        // Format de la date ENG en date FR
        $dateAppointment = $arrayDateHour[0];
        $objDateTime = new DateTime($dateAppointment);
        $cal = IntlCalendar::fromDateTime($objDateTime, 'date.timezone');
        $dateAppointment = IntlDateFormatter::formatObject($cal, 'd MMMM yyyy', 'fr_FR');

        // Fromat de l'heure pour n'afficher que les heures et les minutes
        $hourAppointment = substr($arrayDateHour[1], 0, -3);

        // Par l'id, on récupère le nom du patient associé
        $patientAppointment = Patient::select($arrayOfAppointment[2]);
        if($patientAppointment == false) {
            break;
        }

        // Variable pour la concaténation du nom et du prénom
        $namePatientAppointment = $patientAppointment->lastname . ' ' . $patientAppointment->firstname;

        // Incrémentation pour l'affichage dynamique
        $allAppointmentsDisplay .= '
                                    <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-5 col-xxl-4 mb-3">
                                        <div class="patientCard">
                                            <div class="infoPatient1 h-100">
                                                <img class="appointmentImg" src="../public/assets/img/appointment.png" alt="Patient Image">
                                                <div class="w-100 d-flex flex-column justify-content-around ms-3">
                                                    <p>Date : ' . $dateAppointment . ' </p>
                                                    <p>Heure : ' . $hourAppointment . ' </p>
                                                    <p>Nom : ' . $namePatientAppointment . ' </p>
                                                    <p>Mail : ' . $patientAppointment->mail . ' </p>
                                                </div>
                                            </div>
                                            <a href="view_appointment.html?id=' . $arrayOfAppointment[0] . '">
                                                <img class="modifyBtn" src="../public/assets/img/edit.png" alt="Bouton modifier">
                                            </a>
                                            <form method="POST">
                                                <button type="submit" class="border-0" name="delete" value="ok' . $arrayOfAppointment[0] . '">
                                                    <img class="deleteBtn" src="../public/assets/img/delete.png" alt="Bouton modifier">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                ';
    }



include_once __DIR__ . '/../views/header.php';
include_once __DIR__ . '/../views/listAppoint.php';
include_once __DIR__ . '/../views/footer.php';
