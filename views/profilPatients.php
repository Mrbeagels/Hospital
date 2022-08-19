<?php

?>


<div class="container-fluid">
<h1 class="fs-2 ms-5 mt-5">Profil de <?= $idPatient->firstname ?> <?= $idPatient->lastname ?></h1>
    <form method="POST">
        <!-- RAJOUT DU NOM DE LA TABLE EN HIDDEN -->
        <input type="hidden" name="tablename" value="Patient">
        <!--  -->
        <fieldset>
            <!-- champs Prénom -->
            <div class="row d-flex justify-content-center mt-5">
                <!-- Champs NOM -->
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs nom -->
                        <label class="text-center" for="lastname">Prénom * </label>
                        <input required aria-describedby="lastnameHelp" type="text" value="<?= $idPatient->lastname ?>" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                    </div>
                </div>

                <div class="col-7">
                    <div class="mb-4">
                    <label class="text-center" for="firstname">Nom * </label>
                        <input type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffre" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="first-name" value="<?= $idPatient->firstname?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                    </div>
                </div>
                <!-- Champs NOM -->

                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs date de naissance -->
                        <label class="text-center" for="birthday">Date de naissance * </label>
                        <input type="date" name="birthdate" id="birthdate" value="<?= $idPatient->birthdate ?>" title="La date de naissance n' est pas au format attendu" 
                        class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                        <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                    </div>
                </div>
                <!-- phone -->
                <div class="col-7 ">
                    <label class="text-center" for="phone">Numéro de téléphone * </label>
                    <div class="mb-4">
                        <input type="number" name="phone" id="phone" value="<?= $idPatient->phone ?>" class="form-conteol <?= isset($error['email']) ? 'errorField' : '' ?>" autocomplete="phone">
                        <small id="phoneHelp" class="form-text error"><?= $error['phone'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-7 ">
                    <div class="mb-4">
                        <!-- Champs email -->
                        <label class="text-center" for="mail">Adresse de courriel * </label>
                        <input required aria-describedby="mailHelp" type="mail" name="mail" id="mail" value="<?= $idPatient->mail?>" class="form-control <?= isset($error['mail']) ? 'errorField' : '' ?>" autocomplete="email">
                        <small id="mailHelp" class="form-text error"><?= $error['mail'] ?? '' ?></small>
                        <p class="required text-muted">* : Champs obligatoires</p>
                    </div>
                </div>
                
                
                <div class="text-center">                   
                        <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
                </div>
            </div>
        </fieldset>
    </form>
</div>


