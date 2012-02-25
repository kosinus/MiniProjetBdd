<?php
require_once("main.php");

/*Consultation*/
if($_GET["action"]==1){
	echo "consultation";
}
/*Insertion*/
if($_GET["action"]==2){
	echo "insertion";
}
/*Modification*/
if($_GET["action"]==3){
	echo "modification";
}
/*Suppression*/
if($_GET["action"]==4){
	echo "suppression";
}


?>





















<?php
html_fin_page();
?>
