<?php
require_once("main.php");

/*application des modification*/
if($_GET['modif']==1){
	$array_cochees=$_POST['cases'];
	$suppr=mysql_query("DELETE FROM ESTSPECIALISTE WHERE noAthlete=".$_GET['no'],$link);
	for($i=0;$i<sizeof($array_cochees);$i++){
        $insert = mysql_query("INSERT INTO ESTSPECIALISTE VALUES (".$_GET['no'].",".$array_cochees[$i].")",$link);
	}
}

?>

<form method="post" id="formSpe" action="estSpecialiste.php">
<table border=1>
	<caption>Spécialités</caption>
	<thead>
		<tr>
			<th>Athlètes</th>
			<th>Spécialités</th>
		</tr>
	</thead>
	<tbody>
<?php
$res0=mysql_query("select * From ATHLETE",$link);
while($l=mysql_fetch_array($res0)){
	echo "		<tr>\n";
	echo "			<td><input type=\"text\"disabled=\"disabled\"value=\"$l[1]\"/></td>\n";
	$res1=mysql_query("	select libelleDiscipline 
											from DISCIPLINE d, ESTSPECIALISTE e
											where d.noDiscipline=e.noDiscipline
											and e.noAthlete=$l[0]",$link);
	echo "			<td style=\"font-size:13px\">\n";
	while($m=mysql_fetch_array($res1))
		echo "- $m[0]<br/>";
	echo "			</td>\n";
	/*bouton*/
	echo "			<td>\n";
	echo "<a href=\"fonctions_specialites.php?no=$l[0]\"><img src=\"ressources/ico_edit.gif\"alt=\"valider\"/></a>";
	echo "			</td>\n";
	echo "		</tr>\n";
}

?>
	</tbody>
</table>
</form>




<?php
html_fin_page();
?>
