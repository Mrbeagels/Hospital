<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon -->
    <link rel="icon" href="/public/img/hippocrate.png">
    <!-- meta description -->
    <meta name="description" content="Bienvenu sur la page d'accueuil de l'hopital de la métrople d'Amiens, de nombreux services sont disponibles, avec ou sans rendez vous ! ">
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- font -->
    <link href="http://fonts.cdnfonts.com/css/flama-medium" rel="stylesheet">
    <!-- titre -->
    <title>Hopital d'Amiens Métropole</title>
    
</head>
<body>
    <div class="container-fluid" id="header">
        <div class="d-flex justify-content-around align-items-center pb-5">
            <a class="linkDecoration" href="../controllers/pages-controller.php"><h1 class="linkDecoration">Hospitale2n</h1></a>
            <a class="linkDecoration" href="../controllers/pages-controller.php"><img class="logo" src="../public/img/hippocrate.png" alt="Serment d'hippocrate reprensentant une croix bleu avec un serpent blanc a l'interrieur qui s'enroute autour d'une cane"></a>
        </div>
    </div>
<?php
include(__DIR__.'/../views/nav.php');
?>
