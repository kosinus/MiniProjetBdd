<?php
require_once("main.php");

/*applique la suppression*/
if($_GET['action']==3)
	$sup=mysql_query("DELETE FROM DISCIPLINE WHERE noDiscipline=".$_GET['no'],$link);
/*applique l'ajout*/
if($_GET['ajout']==1){
	$libelleDiscipline=$_POST['newNom'];
	$add=mysql_query("INSERT INTO DISCIPLINE VALUES (null,'$libelleDiscipline')",$link);
}
/*applique la modification*/
if($_GET['modif']==1){
	$libelleDiscipline=$_POST['modNom'];
	$mod=mysql_query("UPDATE DISCIPLINE SET libelleDiscipline='".$libelleDiscipline."' WHERE noDiscipline='".$_GET['no']."'",$link);
}
if($_GET['action']==2){
	$editNo=$_GET['no'];
	echo "<form id=\"formDiscipline\" method=\"post\" action=\"discipline.php?modif=1&no=$editNo\">\n";
}
else{
	echo "<form id=\"formDiscipline\" method=\"post\" action=\"discipline.php?ajout=1\">\n";
	$editNo=-1;
}
?>
<table border=1 id=tabDiscipline>
	<caption>
		Disciplines
	</caption>
	<thead>
		<tr>
			<th>No Discipline</th>
			<th>Nom</th>
		</tr>
	</thead>
	<tbody>
<?php
$res0=mysql_query("SELECT * FROM DISCIPLINE",$link);
while($l=mysql_fetch_array($res0)){
	echo"<tr>\n";
	/*No Discipline*/
	echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[0]\"/></td>\n";
	if($l[0]==$editNo){
		/*Nom Discipline*/
		echo"		<td><input name=\"modNom\"type=\"text\"value=\"$l[1]\"/></td>\n";
		/*Boutons (submit)*/
		echo"<td><input type=\"image\" src=\"ressources/ico_ok.gif\" alt=\"valider\"/></td>\n";
	}
	else {
		/*Nom Discipline*/
		echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[1]\"/></td>\n";
		/*Boutons (liens)*/
		echo"		<td>\n
							<a
								href=\"discipline.php?action=2&no=$l[0]\"/>
								<img src=\"ressources/ico_edit.gif\"/>
							</a>\n
							<a
									href=\"discipline.php?action=3&no=$l[0]\"
									onclick=\"return(confirm('Les clubs et les athlètes de cette discipline seront supprimés ! Etes-vous sûr(e) ?'));\"/>
									<img src=\"ressources/ico_delete.gif\"/>
							</a>\n
						</td>\n";
	}
	echo"</tr>\n";
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
<a href="discipline.php?action=1"><img src="ressources/ico_add2.png"/></a>
</form>
<?php
html_fin_page();
?>
