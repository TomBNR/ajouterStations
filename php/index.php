<html>
    <head>
        <meta charset="UTF-8">
        <title>ajouter des stations</title>
    </head>
    <body>
        <?php
        require_once 'fonctions.inc.php';
        ajoutStationsBdd($IdStation, $Sigfox, $Nom, $Longitude, $Latitude);
        ?>
    </body>
</html>