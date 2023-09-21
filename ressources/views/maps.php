<section class="  geo-maps" id="localisation">
    <div class="maps-content flux row">
        <div class="container-texts">
            <h2>NOUS TROUVER</h2>
            <p class="text-paragraphe">Vous pouvez nous contacter via notre formulaire ainsi que par téléphone et par mail. Notre standard téléphonique est ouvert aux heures d'ouvertures du garage.</p>
            <div class="col-fa column">
                <i class="fa-3x fa-thin fa-at "></i>
                <p id="email"><?= $infos['mailing'] ?></p>
                <i class="fa-3x  fa-solid fa-map-location-dot "></i>
                <address id="adresse"><?= $infos['adresse'] ?></address>
                <i class="fa-3x  fa-solid fa-phone-volume "></i>
                <p id="phone"><?= $infos['phone'] ?></p>
            </div>

        </div>
        <div class="col-maps">
            <iframe title="plan google maps" name="maps" class="maps" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d82375.38192149677!2d1.4321481914871554!3d43.596631243109385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sv%20parrot%20toulouse!5e0!3m2!1sfr!2sfr!4v1694101603917!5m2!1sfr!2sfr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>