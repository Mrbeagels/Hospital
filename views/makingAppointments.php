<main>
    <div class="container-fluid py-4 d-flex justify-content-center align-items-center appointmentContainer">
        <div class="card">
            <h5 class="card-title text-center py-3 m-0">Ajout d'un rendez-vous</h5>
            <img src="../public/img/illustration.pn" class=" card-img-top" alt="Fond Ecran Rendez vous">
            <div class="card-body">

                <form method="POST">
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="exampleFormControlInput2" class="form-label">Date</label>
                                <input type="date" name="dateAppoint" class="form-control" id="exampleFormControlInput2" value="<?=($dateAppoint??'')?>" required>
                                <span class="text-danger"><?=$errRegister['dateAppoint']??''?></span>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="exampleFormControlInput2" class="form-label">Heure</label>
                                <input type="time" name="hourAppoint" class="form-control" id="exampleFormControlInput2" value="<?=($hourAppoint??'')?>" required>
                                <span class="text-danger"><?=$errRegister['hourAppoint']??''?></span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 position-relative">
                            <label for="exampleFormControlInput1" class="form-label">Mail du patient</label>
                                <input type="email" list="listOfPatient" name="mailAppoint" class="form-control" id="exampleFormControlInput1" placeholder="nom@exemple.fr" value="<?=($mailAppoint??'')?>" minlength="10" maxlength="40" required>
                                <datalist id="listOfPatient">
                                    <?=$listOfMail?>
                                </datalist>
                                <span class="text-danger"><?=$errRegister['mailAppoint']??''?></span>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                            <button type="submit" name="appointSend" value="send" class="btn btn-secondary">Valider</button>
                            <span class="text-danger"><?=$errAdding['exist']??''?></span>
                        </div>
                    </div>
                </form>

            </div>
        </div>