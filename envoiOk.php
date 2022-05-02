<?php

require_once './php/fonctions.inc.php';

$sigfox=$_GET["sigfox"];
$nom=$_GET["nom"];
$longitude=$_GET["longitude"];
$latitude=$_GET["latitude"];

ajoutStationsBdd($sigfox, $nom, $longitude, $latitude);
