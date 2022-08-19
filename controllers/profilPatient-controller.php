<?php
require_once(dirname(__FILE__) . '/../models/Patient.php');


$allPatients = Patient::showProfil();

include_once __DIR__ . '/../views/header.php';
include_once __DIR__ . '/../views/profilPatients.php';
include_once __DIR__ . '/../views/footer.php';