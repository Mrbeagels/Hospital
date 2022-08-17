<?php
include(dirname(__FILE__) . '/../config/config.php');
include(__DIR__.'/../views/header.php');

try {
    // $pdo = new PDO($dsn, $user, $pwd, $option);
    $sql = "SELECT * FROM `patients`;";
    $sth = $pdo->query($sql);
    $patients = $sth->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $ex) {
    echo 'erreur de connexion' . $ex->getMessage();
}