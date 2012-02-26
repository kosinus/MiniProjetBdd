<?php
function html_entete_page($titre,$fichierstyle="",$fichierJava="") {
	print("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"
    \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n");
	print("<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\" >\n");
	print("<head>\n");
	print("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n");
	print("<title>".$titre."</title>\n");
	print("<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"iconeweb.ico\" />\n");
    print("<meta http-equiv=\"Content-Style-Type\" content=\"text/css\" />\n");
   	print("<link rel=\"stylesheet\" type=\"text/css\" href=\"".$fichierstyle."\" /> \n");

/* A rajouter pour utiliser des fonctions javascript */
    print("<meta http-equiv=\"Content-Script-Type\" content=\"text/javascript\"> \n");
    print("<script src=\"jquery-1.3.1.js\" type=\"text/javascript\"></script> \n");
    print("<script src=\"".$fichierJava."\" type=\"text/javascript\"></script> \n");    


	print("</head>\n<body>\n");
}
function html_fin_page() {
	print("<div id=\"piedPage\" style=\"font-size:8px;position:absolute;top:90%;left:5%;right:5%;text-align:center\">\n");
	print("mini-projet ACSI-BDD\n");
	print("</div>\n");
	print("</body>\n");
	print("</html>\n");
}
?>
