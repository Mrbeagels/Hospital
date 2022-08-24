<?php
require_once(dirname(__FILE__) . '/../models/Patient.php');


$allPatientsDisplay = '';
    $modalConfirmDelete = '';
    $listAllPatients = '';
    $displaySearch = 'd-block';

    // Initialisation des valeurs et variables pour l'affichage de tous les patients
    $arrayOfPatients = Patient::getAll();

    // Affichage dynamique en fonction du nombre de patients dans la bdd
    foreach ($arrayOfPatients as $key => $arrayOfPatient) {

        // Mise en forme pour afficher la date de naissance en version VF
        $objDateTime = new DateTime($arrayOfPatient[3]);
        $cal = IntlCalendar::fromDateTime($objDateTime, 'date.timezone');
        $birthDateFr = IntlDateFormatter::formatObject($cal, 'd MMMM yyyy', 'fr_FR');

        $allPatientsDisplay .= '
                                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mb-3">
                                    <div class="patientCard">
                                        <div class="infoPatient1">
                                        <div class="d-flex justify-content-center"> 
                                            <img src="../public/img/illustration.png" alt="Patient Image">
                                        </div>
                                            <div class="w-100 d-flex flex-column justify-content-around ms-3">
                                                <p>Nom : ' . $arrayOfPatient[1] . ' </p>
                                                <p>Prénom : ' . $arrayOfPatient[2] . ' </p>
                                                <p>Date de naissance : ' . $birthDateFr . ' </p>
                                                <p>Téléphone : <a class="linkDecoration" href="tel:5554280940">' . $arrayOfPatient[4] . '</a></p>
                                                <p>Mail : <a class="linkDecoration" href="mailto:' . $arrayOfPatient[5] . '">' . $arrayOfPatient[5] . '</a></p>
                                            </div>
                                        </div>
                                        <a href="profilPatient-controller.php?id=' . $arrayOfPatient[0] . '">
                                            <img class="modifyBtn" src="../public/img/modif.svg" alt="Bouton modifier">
                                        </a>
                                        <form method="POST">
                                            <button type="submit" class="btn" name="delete" value="ok' . $arrayOfPatient[0] . '">
                                                <img class="deleteBtn" src="../public/img/delete.svg" alt="Bouton modifier">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            ';
    }

include_once __DIR__ . '/../views/header.php';
include_once __DIR__ . '/../views/listPatients.php';
include_once __DIR__ . '/../views/footer.php';