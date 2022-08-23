<form method="POST">
    <div class="text-center">
        <label for="dateHour"> <span class="fs-1 text-info">V</span>euillez choisir une date et une heure pour votre rendez-vous <i class="bi bi-calendar"></i></label>
    </div>
    <div class="text-center my-5">
        <Input type="datetime-local" id="dateHour" name="dateHour" value="2022-13-13T13h56" min="2022-08-22T13h56" max="2023-12-06T00:00"></Input>
    </div>
    <div class="text-center mb-5">
        <input type="submit" value="envoyer" name="envoyer" class="btn btn-primary mt-3" id="validForm">
    </div>
</form>