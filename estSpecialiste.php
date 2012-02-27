<?php
require_once("main.php");
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
	echo "		</tr>\n";
}

?>
	</tbody>
</table>
<a href="estSpecialiste.php"><img src="ressources/ico_add2.png"/></a>
</form>




<?php
html_fin_page();
?>
