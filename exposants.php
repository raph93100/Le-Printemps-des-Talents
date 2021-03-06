<?php
    try {
        $db=new PDO("mysql:host=localhost;dbname=helpfest;port=3306", "helpfest", "123");
        }
        catch (PDOException $e) {
            echo $e;
        }

    $sqlrequest = "SELECT * from profilexposant";
    $preprequest = $db->prepare($sqlrequest);
    $preprequest->execute();

    $results = $preprequest->fetchAll(PDO::FETCH_ASSOC);
    $nbTour = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exposants</title>
        <meta name="Activités" content="Activités">

        <!--
          viewport allows you to control how mobile browsers will render your content.
          width=device-width tells mobile browsers to render your content across the
          full width of the screen, without being zoomed out (by default it would render
          it at a desktop width, then shrink it to fit.)
          Read more about it here:
          https://developer.mozilla.org/Mozilla/Mobile/Viewport_meta_tag
        -->
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/app.css">

        <!--
        Inline JavaScript code is not allowed for privileged and certified apps,
        due to Content Security Policy restrictions.
        You can read more about it here: https://developer.mozilla.org/Apps/CSP
        Plus keeping your JavaScript separated from your HTML is always a good practice!

        We're also using the 'defer' attribute. This allows us to tell the browser that
        it should not wait for this file to load before continuing to load the rest of
        resources in the page. Then, once everything has been loaded, it will parse and
        execute the deferred files.
        Read about defer: https://developer.mozilla.org/Web/HTML/Element/script#attr-defer
        -->
        <script type="text/javascript" src="js/app.js" defer></script>

        <!--
        The following two lines are for loading the localisations library
        and the localisation data-so people can use the app in their
        own language (as long as you provide translations).
        -->
        <link rel="prefetch" type="application/l10n" href="data/locales.ini" />
        <script type="text/javascript" src="js/libs/l10n.js" defer></script>
        <link rel="icon" type="image/png" href="logo.png" />
    </head>

    <body>

        <div class="menu" id="menu">
            <h2>Menu</h2>
            <ul>
                <li>Profil</li>
                <br>
                <li>Réglages</li>
                <br>
                <li>Assistance</li>
                <br>
                <li>Confidentialité</li>
            </ul>
        </div>
        
        <header>
            <div class="top">
                <img class="menuIcon" src="./img/icons/Groupe 1.svg" alt="menu">
                <img class="profilPic" src="./img/icons/Groupe 32.svg" alt="Profil">
            </div>
            <h1 class="title">Le Printemps des Talents</h1>

            <ul class="topMenu">
                <li><a href="./billeterie.html">Billeterie</a></li>
                <li><a href="./carte.html">Carte</a></a></li>
                <li><a href="./index.html">Activités</a></li>
                <li class="actif">Exposants</li>
            </ul>
            </div>
        </header>

        <?php
        foreach($results as $result) {
        ?>

        <div class="exposants">
            <div class="exposantImg">
                <img class="expoImg"alt="image exposant" src= "<?php echo $result["img"]; ?>">
            </div>
            <div class="description">
                <h3 class="titleExpo"><?php echo $result['name']; ?> <?php
                 echo $result['surname'];?></h3>
                <p class="desc"><?php echo $result['description'];?></p>
            </div>
        </div>

        <?php
        } 
        ?>
        <script type="text/javascript" src="main.js"></script>
        
    </body>
</html>

