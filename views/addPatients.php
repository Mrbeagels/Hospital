<div class="container-fluid">
    <h2 class="text-center">Créer votre profil afin de prendre rendez-vous</h2>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <!-- champs Prénom -->
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-7">
                    <div class="mb-4">
                        <input type="text" name="firstname" id="firstname" title="Veuillez entrer un prénom sans chiffre" placeholder="Entrez votre prénom *" class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>" autocomplete="first-name" value="<?= htmlentities($firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                    </div>
                </div>
                <!-- Champs NOM -->
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs nom -->
                        <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname" title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*" class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_NO_NUMBER ?>">
                        <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-7">
                    <div class="mb-4">
                        <!-- Champs date de naissance -->
                        <label class="text-center" for="birthday">Date de naissance * </label>
                        <input type="date" name="birthdate" id="birthdate" value="<?= htmlentities($birthdate ?? '') ?>" title="La date de naissance n' est pas au format attendu" placeholder="Entrez votre date de naissance" class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>" autocomplete="bday" aria-describedby="birthdateHelp">
                        <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-7 ">
                    <div class="mb-4">
                        <!-- Champs email -->
                        <input required aria-describedby="emailHelp" type="email" name="email" id="email" value="<?= htmlentities($email ?? '') ?>" class="form-control <?= isset($error['email']) ? 'errorField' : '' ?>" placeholder="Votre E-mail*" autocomplete="email">
                        <small id="emailHelp" class="form-text error"><?= $error['email'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-7 ">
                    <div class="mb-4">
                        <input type="number" name="phone" id="phone" value="<?= htmlentities($phone ?? '') ?>" class="form-conteol <?= isset($error['email']) ? 'errorField' : '' ?>" placeholder="Votre numéro de téléphone * " autocomplete="phone">
                        <small id="phoneHelp" class="form-text error"><?= $error['phone'] ?? '' ?></small>
                        <p class="required">* : Champs obligatoires</p>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="Envoyer" class="btn btn-primary mt-3" id="validForm">
                </div>
            </div>
        </fieldset>
    </form>
</div>