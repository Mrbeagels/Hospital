<h1 class="text-center">Liste des patients</h1>

<?php
foreach ($allPatients as $key => $value)
{?>
    <div class='d-flex justify-content-center'>
            <p> <span class='text-info'>Nom :</span> <?=$value->lastname?> <br>
            <span class='text-info text-center'>Prénom :</span> <?= $value->firstname?> <br> 
            <span class='text-info'>Date de naissance :</span> <?=$value->birthdate?> <br>
            <span class='text-info'>Numéro de téléphone :</span> <a class="linkDecoration" href="tel:<?=$value->phone?>"><?=$value->phone?></a> <br>
            <span class='text-info'>Adresse Mail :</span> <a class="linkDecoration" href="mailto:<?=$value->mail?>"> <?=$value->mail?></a> </p>
    </div>
        <div class="text-center mb-3">
            <a href="profilPatient-controller.php?id=<?=$value->id?>"><button type="submit" class="btn btn-info">Voir le profil</button></a>
        </div>
    <?php
}
