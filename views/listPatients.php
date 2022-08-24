<h1 class="text-center">Liste des patients</h1>

<main>
    <div class="d-flex justify-content-center mt-2">
        <h2 class="fs-3">
            <a class="linkDecoration text-decoration-underline"" href="../controllers/addPatients-controller.php"> Créez ici un nouveau patient.</a>   
        </h2>
    </div>

    <div class="container-fluid listpatients">
        <div class="row pb-2 pt-3 justify-content-center">
            <?= $allPatientsDisplay ?>
        </div>
    </div>

    <!-- Modal pour la confirmation de la suppression du patient -->
    <?= $modalConfirmDelete ?>
    
    <span class="text-danger text-center"><?= $errRemove['delete']??'' ?></span>
</main>