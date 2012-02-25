<?php
require_once("fonctions_fichier_html.php");
html_entete_page('Page principale','style.css','script.js');
?>

<h2>Voici la page principale</h2>
<ul id="menu">
        <li>
                <a href="accueil.php">accueil</a>
        </li>
        <li>
                <a href="athlete.php">Athletes</a>
                <ul>
                        <li><a href="#">Consulter la liste des athlètes</a></li>
                        <li><a href="#">Ajouter un athlete</a></li>
                        <li><a href="#">Modifier un athlete</a></li>
                        <li><a href="#">Supprimer un athlete</a></li>
                </ul>
        </li>
        <li>
                <a href="club.php">Clubs</a>
                <ul>
                        <li><a href="#">Consulter la liste des clubs</a></li>
                        <li><a href="#">Ajouter un club</a></li>
                        <li><a href="#">Modifier un club</a></li>
                        <li><a href="#">Supprimer un club</a></li>
                </ul>
        </li>
        
        <li>
                <a href="competition.php">Competitions</a>
                <ul>
                        <li><a href="#">Consulter la liste des compétitions</a></li>
                        <li><a href="#">Ajouter un compétition</a></li>
                        <li><a href="#">Modifier un compétition</a></li>
                        <li><a href="#">Supprimer un compétition</a></li>
                </ul>
        </li>

        <li>
                <a href="discipline.php">Disciplines</a>
                <ul>
                        <li><a href="#">Consulter la liste des disciplines</a></li>
                        <li><a href="#">Ajouter un discipline</a></li>
                        <li><a href="#">Modifier un discipline</a></li>
                        <li><a href="#">Supprimer un discipline</a></li>
                </ul>
        </li>

        <li>
                <a href="ville.php">Villes</a>
                <ul>
                        <li><a href="#">Consulter la liste des villes participantes</a></li>
                        <li><a href="#">Ajouter un ville</a></li>
                        <li><a href="#">Modifier un ville</a></li>
                        <li><a href="#">Supprimer un ville</a></li>
                </ul>
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


<?php
html_fin_page();
?>
