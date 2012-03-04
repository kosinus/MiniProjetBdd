<?php
require_once("main.php");
?>


<form method="post" id="formClassement" action="classement.php">
<table border=1 style="position:absolute;left:5%;right:5%">
	<caption>Classement</caption>
	<thead>
		<tr>
			<th>Compétition</th>
			<th>Discipline</th>
			<th>Classement</th>
		</tr>
	</thead>
	<tbody>
<?php
// nom des competitions possèdant un classement
$comp=mysql_query("select distinct(c.nomCompet) from COMPETITION c, CLASSEMENT cl where cl.noCompet=c.noCompet",$link);
while($lcomp=mysql_fetch_array($comp)){
	// liste des disciplines de la competition courante
	$dis=mysql_query("	select distinct(d.libelleDiscipline) 
											from CLASSEMENT cl, DISCIPLINE d, COMPETITION c
											where c.nomCompet='".$lcomp[0]."'
											and d.noDiscipline=cl.noDiscipline
											and cl.noCompet=c.noCompet",$link);
	// nombre de classements pour la compétition courante
	$nbcompart=mysql_query("select count(*) 
													from CLASSEMENT cl, COMPETITION c
													where c.nomCompet='".$lcomp[0]."'
													and c.noCompet=cl.noCompet",$link);


	$lnbcompart=mysql_fetch_array($nbcompart);
		echo "<tr>\n";
		echo "	<td rowspan =\"".$lnbcompart[0]."\">\n";
		echo 			$lcomp[0];
		echo "	</td>\n";

	while($ldis=mysql_fetch_array($dis)){
		// liste des participants à l'épreuve courante
		$part=mysql_query("select distinct(a.nomAthlete)
												from CLASSEMENT cl, ATHLETE a, COMPETITION c, DISCIPLINE d
												where c.nomCompet='".$lcomp[0]."'
												and d.libelleDiscipline='".$ldis[0]."'
												and a.noAthlete=cl.noAthlete
												and cl.noCompet=c.noCompet
												and d.noDiscipline=cl.noDiscipline
												order by cl.classement",$link);

		// nombre de participants à l'épreuve courante
		$nbpart=mysql_query("select count(distinct(a.nomAthlete))
												from CLASSEMENT cl, ATHLETE a, COMPETITION c, DISCIPLINE d
												where c.nomCompet='".$lcomp[0]."'
												and d.libelleDiscipline='".$ldis[0]."'
												and a.noAthlete=cl.noAthlete
												and cl.noCompet=c.noCompet
												and d.noDiscipline=cl.noDiscipline",$link);

		$lnbpart=mysql_fetch_array($nbpart);
		echo "	<td rowspan =\"".$lnbpart[0]."\">\n";
		echo 			$ldis[0];
		echo "	</td>\n";
		$i=1;
		while($lpart=mysql_fetch_array($part)){
			echo "	<td>\n";
			if($i==1)
				echo 		"<div id=\"first\" style=\"font-weight:bold\">".$i."er - ".$lpart[0]."</div>";
			else
				echo 		"<div id=\"notfirst\">".$i."e - ".$lpart[0]."</div>";
			echo "	</td>\n";
			echo "</tr>\n";
			$i++;
		}
	}
}
?>

	</tbody>
</table>
<a href="classement.php"><img src="ressources/ico_add2.png"style="position:absolute;bottom:5%;right:5%"/></a>
</form>




<?php
html_fin_page();
?>

