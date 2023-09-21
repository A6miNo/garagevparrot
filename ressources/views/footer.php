<footer>


    <img class="logo logo-grid" src="/asset/image/logo_parrot-removebg-preview.png" alt="logo-garageVparrot">

    <nav class="footer_list-link">
        <ul>
            <?php
            foreach ($mainMenu as $key => $navMenu) {
                if (!$navMenu["exclude"]) {
            ?>
                    <li class="navbar_link <?= $navMenu["navclass"]; ?>">
                        <a href="<?= $key; ?>" class="<?php
                                                        if ($key === $currentPage) {
                                                            echo "active";
                                                        }
                                                        ?>"><?= $navMenu['menu_title']; ?></a>
                    </li>
            <?php }
            }
            ?>

        </ul>
    </nav>

    <div class="social-network row">
        <p>Suivez-nous</p>
        <ul class="socials-logo">
            <li>
                <a href="https://www.facebook.com">
                    <i class="fa-2x fa-brands fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com">
                    <i class="fa-2x fa-brands fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="hour-foot">
        <h2>Horaires</h2>
        <?php
        echo $horaireContent;

        ?>
    </div>
    <div class="footer_pushes">

        <a class="btn btn-avis" href="/ressources/views/form-avis.php" target="_blank">Laisser un avis</a>
    </div>
    <div class="footer_copyrights ">
        <p><a href="cgu.html" target="_ blank">CGU</a> - <a href="mentions-legales.html" target="_ blank">Mentions légales</a></p>
        <p> &copy; 2023 A.Cimmino</p>
    </div>

</footer>