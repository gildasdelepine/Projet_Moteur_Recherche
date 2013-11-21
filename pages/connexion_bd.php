<?php
  //données pour la connexion à la base de données

  $nom_du_serveur ="127.0.0.1";
  $nom_de_la_base ="bd_projet_indexation";
  $nom_utilisateur ="root";
  $passe ="";


  mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");

  mysql_select_db("$nom_de_la_base") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e. Assurez vous d\'avoir correctement remplit les donn&eacute;es du fichier connexion_bd.php.');

?>