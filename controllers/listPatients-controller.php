<?php
require_once(dirname(__FILE__) . '/../models/Patient.php');
include_once __DIR__ . '/../views/header.php';
include_once __DIR__ . '/../views/listPatients.php';
include_once __DIR__ . '/../views/footer.php';

// Exo 2 
// Créer une page liste-patients.php et y afficher la liste des patients. Inclure dans la page, un lien vers la création de patients

// try {
//     $sql = "SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`";
//     $sth = $pdo->query($sql);
//     $allPatients = $sth->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException $ex) {
//     echo 'erreur de requête' . $ex->getMessage();
// }

if(empty($error)){
    $patient = new patient;
    $patient->getLastname($lastname);
    $patient->getFirstname($firstname);
    $patient->getBirthdate($birthdate);
    $patient->getPhone($phone);
    $patient->getMail($mail);
    $errorSave=$patient->getAll();
} else {
    var_dump($error);
}
