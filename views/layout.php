<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="../assets/images/icon_restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Le Quai Antique</title>
</head>
<header>
    <nav class="navMenuMobile" role="navigation">

        <div class="menuToggleMobile">

            <input type="checkbox" class="burger"/>

            <span></span>
            <span></span>
            <span></span>
            <ul class="menuMobile">
                <a href="/reservation"><li>Réserver</li></a>
                <a href="/la-carte"><li>La Carte</li></a>
                <a href="/nos-menus"><li>Nos Menus</li></a>
                <?php if(!isset($_SESSION['user'])): ?>
                    <a href="/inscription"><li>S'inscire</li></a>
                    <a href="/connexion"><li>Se connecter</li></a>
                <?php elseif($_SESSION['user']['role'] === 'role_user'): ?>
                    <li>Bonjour <?= $_SESSION['user']['lastName']. ' '.$_SESSION['user']['firstName'] ?></li>
                    <a href="/profil"><li>Mes informations</li></a>
                    <a href="/profil"><li>Mes réservation</li></a>
                    <a href="/deconnexion"><li>Déconnexion</li></a>
                <?php elseif ($_SESSION['user']['role'] === 'role_admin'): ?>
                    <li><strong>Bonjour <?= $_SESSION['user']['lastName']. ' '.$_SESSION['user']['firstName'] ?></strong></li>
                    <a href="/images"><li>Gérer les images d'accueil</li></a>
                        <a href="/entrees"><li> Gérer les entrées</li></a>
                        <a href="/plats"><li>Gérer les plats</li></a>
                        <a href="/desserts"><li>Gérer les désserts</li></a>
                        <a href="/formules"><li>Gérer les formules de menu</a></a>
                        <a href="/menus"><li >Gérer les menus</li></a>
                        <a href="/profil"><li>Gérer les horraires</li></a>
                        <a href="/profil"><li>Gérer les réservations</li></a>
                        <a href="/deconnexion"><li>Deconnexion</li></a>
                <?php endif; ?>    
            </ul>
        </div>
        <div class='itemsNavMobile'>
            <a class="navItemLogoMobile" href="/"><img class="navItemLogo" src="../assets/images/lequaiantiquelogo.png"></a>
        </div>
    </nav>
    <nav class="navMenu">
        <a class="navItem" href='/la-carte'>La Carte</a>
        <a class="navItem" href="/nos-menus">Nos Menus</a>
        <a class="navItemLogo" href="/"><img class="navItemLogo" src="../assets/images/lequaiantiquelogo.png"></a>
        <a class="navItem" href="/reservation">Réserver</a>
        <?php if(!isset($_SESSION['user'])): ?>
            <div>
                <a class="navItem Connect" href="/inscription">S'inscire</a>
                <a class="navItem Connect" href="/connexion">Se Connecter</a>
            </div>
        <?php elseif($_SESSION['user']['role'] === 'role_user'): ?>
            <div>
                <li class="navItem" href='#'>Bonjour <?= $_SESSION['user']['lastName']. ' '.$_SESSION['user']['firstName'] ?>
                    <ul class="dropDown">
                        <li><a class="dropDownItem" href="/profil">Mes informations</a></li>
                        <li><a class="dropDownItem" href="/profil">Mes réservations</a></li>
                        <li><a class="dropDownItem" href="/deconnexion">Deconnexion</a></li>
                    </ul>
                </li>
            </div>
        <?php elseif ($_SESSION['user']['role'] === 'role_admin'): ?>
            <div>
                <li class="navItem" href='#'>Bonjour <?= $_SESSION['user']['lastName']. ' '.$_SESSION['user']['firstName'] ?>
                    <ul class="dropDown">
                        <li><a class="dropDownItem" href="/images">Gérer les images d'accueil</a></li>
                        <li><a class="dropDownItem" href="/entrees">Gérer les entrées</a></li>
                        <li><a class="dropDownItem" href="/plats">Gérer les plats</a></li>
                        <li><a class="dropDownItem" href="/desserts">Gérer les désserts</a></li>
                        <li><a class="dropDownItem" href="/formules">Gérer les formules de menu</a></li>
                        <li><a class="dropDownItem" href="/menus">Gérer les menus</a></li>
                        <li><a class="dropDownItem" href="/profil">Gérer les horraires</a></li>
                        <li><a class="dropDownItem" href="/profil">Gérer les réservations</a></li>
                        <li><a class="dropDownItem" href="/deconnexion">Deconnexion</a></li>
                    </ul>
                </li>
            </div>
        <?php endif; ?>
    </nav>
</header>
<body>
    <div class="imgContainer">
        <img src="../assets/images/background.jpg">
    </div>
    <div class="contentContainer">
        <h1 class="titleContent"><?= $title ?></h1>
        <?= $content ?>
    </div>
</body>
<footer>
    <div class="containerHour">
        <h3 class="titleHour">Nos horraires d'ouvertures</h3>
        <table class="horraires">
            <tr>
                <th class="thHour">Jours d'ouvertures</th>
                <th class="thHour">Midi</th>
                <th class="thHour">Soir</th>
            </tr>
            <?php foreach ($hours as $hour): ?>
            <tr>
                <td class="tdHour"><?= $hour->dayOfWeek ?></td>
                <td class="tdHour"><?= substr($hour->lunchOpening, 0, -3).' à '.substr($hour->lunchClosing, 0, -3) ?></td>
                <td class="tdHour"><?= substr($hour->dinerOpening, 0, -3).' à '.substr($hour->dinerClosing, 0,-3) ?></td> 
            </tr>
            <?php endforeach; ?>
</table>
    <p class="legalMentions">Tous droit réservés Roman PONS 2023 ce site est pour mon examen</p>
    </div>
</footer>
</html>