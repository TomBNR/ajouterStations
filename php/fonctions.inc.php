<?php

define("SERVEURBDD", "172.18.58.86");
define("LOGIN", "root");
define("MOTDEPASSE", "toto");
define("NOMDELABASE", "mesure_piezometrique");

function connexionBdd() {
    try {

        $pdOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $bdd = new PDO('mysql:host=' . SERVEURBDD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE, $pdOptions);
        $bdd->exec('set names utf8');
        echo "Connexion > OK !";
        return $bdd;
        //si erreur on tue le processus et on affiche le message d'erreur    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function AjoutStations() {
    try {
        // connexion BDD
        $bdd = connexionBdd();
        // execution de la requete
        $requete = $bdd->prepare("INSERT INTO Station (IdStation, Sigfox, Nom, Longitude, Latitude) VALUES (:IdStation,:Sigfox,:Nom,:Longitude,:Latitude)") ;
        $requete->bindParam(":IdStation", $IdStation);
        $requete->bindParam(":Sigfox", $Sigfox);
        $requete->bindParam(":Nom", $Nom);
        $requete->bindParam(":Longitude", $Longitude);
        $requete->bindParam(":Latitude", $Latitude);
        $requete->execute();
    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br/>";
        die();
    }
}

