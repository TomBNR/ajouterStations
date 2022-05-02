<?php

require_once 'config.inc.php';

function connexionBdd() {
    try {

        $pdOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $bdd = new PDO('mysql:host=' . SERVEURBDD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE, $pdOptions);
        $bdd->exec('set names utf8');
        echo "Station ajoutée !";
        return $bdd;
        //si erreur on tue le processus et on affiche le message d'erreur    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function ajoutStationsBdd($Sigfox, $Nom, $Longitude, $Latitude) {
    try {
        // connexion BDD
        $bdd = connexionBdd();
        // execution de la requete
        $requete = $bdd->prepare("INSERT INTO Station (Sigfox, Nom, Longitude, Latitude) VALUES (:Sigfox,:Nom,:Longitude,:Latitude)") ;
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

