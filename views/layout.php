<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Voici le site web de notre Restaurant 
    Le Quai Antique vous pouvez réserver votre tables sur ce dernier et 
    consulter notre cartes ainsi que les différents menus.">
    <link rel="shortcut icon" href="/assets/images/icon_restaurant.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/style.css">
    <title>Le Quai Antique</title>
</head>
<header>
    <nav class="navMenu">
        <a class="navItem" href='#'>La Carte</a>
        <a class="navItem" href="#">Nos Menus</a>
        <a class="navItemLogo" href="/"><img class="navItemLogo" src="assets/images/lequaiantiquelogo.png"></a>
        <a class="navItem" href="#">Réserver</a>
        <?php if(!isset($_SESSION['user'])): ?>
            <div>
                <a class="navItem Connect" href="/inscription">S'inscire</a>
                <a class="navItem Connect" href="/connexion">Se Connecter</a>
            </div>
        <?php else: ?>
            <div>
                <li class="navItem" href='#'>Bonjour <?= $_SESSION['user']['lastName']. ' '.$_SESSION['user']['firstName'] ?>
                    <ul class="dropDown">
                        <li><a class="dropDownItem" href="/profil">Mes informations</a></li>
                        <li><a class="dropDownItem" href="/profil">Mes réservations</a></li>
                        <li><a class="dropDownItem" href="/deconnexion">Deconnexion</a></li>
                    </ul>
        </li>
            </div>
        <?php endif; ?>
    </nav>
</header>
<body>
    <div class="imgContainer">
        <img src="assets/images/background.jpg">
    </div>
    <div class="contentContainer">
        <h1><?= $title ?></h1>
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
                <td class="tdHour"><?= $hour->lunchOpening.' à '.$hour->lunchClosing ?></td>
                <td class="tdHour"><?= $hour->dinerOpening.' à '.$hour->dinerClosing ?></td> 
            </tr>
            <?php endforeach; ?>
</table>
    </div>
</footer>
</html>