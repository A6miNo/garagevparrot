<?php
//Session utilisateurs
if (isset($_SESSION['user'])) {

    $affich_users = $bdd->prepare('SELECT * FROM utilisateurs WHERE id=?');
    $affich_users->execute(array($_SESSION['user']));
    $affichage = $affich_users->fetch();
}
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];


?>
<header class="navbar" role="navigation">

    <img class="image_official logo" title="logo-garage-parrot" src="/asset/image/logo_parrot-removebg-preview.png" alt="logo garage">

    <ul class="navbar_links">
        <?php
        foreach ($mainMenu as $key => $navMenu) {
            if (!$navMenu["exclude"]) {
        ?>
                <li class="navbar_link <?= $navMenu["navclass"]; ?>">
                    <a href="<?= $key; ?>" class="<?php
                                                    echo ($key === $currentPage) ? 'active' : ""
                                                    ?>"><?= $navMenu['menu_title']; ?></a>
                </li>
        <?php }
        }
        ?>
        <li class="navbar_link fifth">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a href="/profil.php">Mon compte</a>
            <?php
            } ?>
            <?php
            if (empty($_SESSION['user'])) {
            ?>
                <a href="/ressources/views/loginv2.php">Se connecter</a>
            <?php }
            ?>
        </li>
    </ul>

    <button class="burger">
        <span class="bar"></span>
    </button>
</header>