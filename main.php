<?php
require_once("fonctions_fichier_html.php");
html_entete_page('Page principale','style.css','script.js');
/*Connexion à la base*/

$host='localhost';
$user='root';
$pass='slim72';
$db='miniProjetBdd';
$link=mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db,$link);
?>
<!-- Menu Principale -->
<ul id="menu">
        <li>
                <a href="accueil.php">accueil</a>
        </li>
        <li>
                <a href="athlete.php">Athletes</a>

        </li>
        <li>
                <a href="club.php">Clubs</a>
        </li>
        
        <li>
                <a href="competition.php">Competitions</a>
        </li>

        <li>
                <a href="discipline.php">Disciplines</a>
        </li>

        <li>
                <a href="ville.php">Villes</a>
        </li>

        <li>
                <a href="estSpecialiste.php">Spécialités</a>
        </li>

        
        <li>
                <a href="requetes.php">Requetes</a>
                <ul>
                        <li><a href="#1">Competitions des clubs</a></li>
                        <li><a href="#2">Competitions par date</a></li>
                        <li><a href="#3">Nombre de 1eres places d'un athlete</a></li>
                        <li><a href="#4">Competiteurs</a></li>
                        <li><a href="#5">Classements</a></li>
                        <li><a href="#6">Nombre de compet par ville</a></li>
                        <li><a href="#7">Specialistes</a></li>
                        <li><a href="#8">Indétronables</a></li>
                </ul>
        </li>
        
</ul>
<br/><br/>

