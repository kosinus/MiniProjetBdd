<?php
require_once("main.php");

/*applique la suppression*/
if($_GET['action']==3)
	$sup=mysql_query("DELETE FROM VILLE WHERE noVille=".$_GET['no'],$link);
/*applique l'ajout*/
if($_GET['ajout']==1){
	$nomVille=$_POST['newNom'];
	$add=mysql_query("INSERT INTO VILLE VALUES (null,'$nomVille')",$link);
}
?>
<form id="formVille" method="post" action="ville.php?ajout=1">
<table border=1 id=tabVille>
	<caption>
		Villes Participantes
	</caption>
	<thead>
		<tr>
			<th>No Ville</th>
			<th>Nom</th>
		</tr>
	</thead>
	<tbody>
<?php
$res0=mysql_query("SELECT * FROM VILLE",$link);
while($l=mysql_fetch_array($res0)){
	echo"<tr>\n";
	/*No Ville*/
	echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[0]\"/></td>\n";
	/*Nom Ville*/
	echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[1]\"/></td>\n";
	/*Boutons (liens)*/
	echo"		<td>\n
						<a
							href=\"ville.php?action=2&no=$l[0]\"/>
							<img src=\"ressources/ico_edit.gif\"/>
						</a>\n
						<a
							href=\"ville.php?action=3&no=$l[0]\"
							onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\"/>
							<img src=\"ressources/ico_delete.gif\"/>
						</a>\n
					</td>\n";
}
/*barre d'ajout*/
if($_GET['action']==1){
	echo"<tr>\n";
	echo"<td><input type=\"text\" disabled=\"disabled\" value=\"-\" /></td>\n";
  echo"<td><input type=\"text\" name=\"newNom\" /></td>\n";
	echo"<td><input type=\"image\" src=\"ressources/ico_ok.gif\" alt=\"valider\"/></td>\n";
	echo"</tr>\n";
}//fin barre d'ajout
?>
	</tbody>
</table>
<a href="ville.php?action=1"><img src="ressources/ico_add.png"/></a>
</form>
<?php
html_fin_page();
?>
