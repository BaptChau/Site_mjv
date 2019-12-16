<?php
require_once 'C:\wamp64\www\sitePerso\vendor\autoload.php';



?>
<form action="<?= $router->url('articleValid', $_POST) ?>" method="post">
    <fieldset>
        <legend>Nouvel Article dans le calepin :</legend>
        <label for="nom">Qui écrit ?</label>
        <input type="text" require name="auteur" id="nom" class="form-control" placeholder="Jean-Pierre Tartenpion">

        <label for="titre">Titre</label>
        <input type="text" require name="titre" class="form-control" id="titre" placeholder="Exemple: Info match [-18]">

        <label for="contenu">Corps de l'article</label>
        <textarea name="contenu" require class="form-control" id="contenu" cols="30" rows="10" placeholder="Quel est l'horaire du match -18 de ce week-end ?"></textarea>
    </fieldset>
    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LfoAMgUAAAAAHL6LfCJMKZBn3m3Tkl-_wbbalEX" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
        <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
        <div class="help-block with-errors"></div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg g-recaptcha">Envoyer</button>
</form>