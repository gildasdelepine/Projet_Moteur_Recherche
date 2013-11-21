<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/  DTD/xhtml1-strict.dtd"
html xmlns="http://www.w3.org/1999/xhtml" lang="fr-fr">
 <head>
     <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />

     <link href="../style.css" rel="stylesheet" type="text/css"/>

     <title>Administration</title>
 </head>

 <body>
     <div id="moncadre">

         <!--<?php include('menu.php');?> -->

         <div class="cadrecentrale">
             <h1>Administration</h1>

             <?php
                 // on se connecte à la base de données
                 include('connexion_bd.php');

                 //mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");

                 //mysql_select_db("$nom_de_la_base") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e. Assurez vous d\'avoir correctement remplit les donn&eacute;es du fichier connexion_bd.php.');

                 //On selectionne les données

                 //$result = mysql_query("SELECT id,nom_categorie FROM CATEGORIES ORDER BY id ASC");

                 //On voit si il y a quelque chose. Si il n'y a rien, on affiche un message

                 /*if(mysql_num_rows($result) == 0)

                 {

                     echo '<div class="cadre"><p>Aucune catégorie pour le moment! <b>>><a title="Ajouter une  cat&eacute;gorie" href="ajouter-categorie.php">Ajouter une cat&eacute;gorie</a></b></p> </div>';

                 }

                 //Si il y a quelque chose, on affiche nos données

                 else {

                     echo '<table style="width: 100%;" cellpadding="2" cellspacing="2"> <tbody> <tr> <td class="hauttd">Cat&eacute;gories</td> <td class="hauttd">Modifier</td> <td class="hauttd">Supprimer</td> </tr>';



                     while($affiche = mysql_fetch_array($result))

                     {

                         //On calcul le nombre d'article dans chaque catégorie

                         $calcul=$affiche['id'];

                         $result1 = mysql_query("SELECT id_categorie FROM CONTENU WHERE id_categorie=$calcul");

                         $total = mysql_num_rows($result1);

                         //Fin du calcul

                         echo '<tr><td><a href="voir-categorie.php?id='.$affiche['id'].'">'.$affiche['nom_categorie'].'</a><span style="float:right;">('.$total.')</span></td> <td><a href="modifier-categorie.php?id='.$affiche['id'].'"><img src="images/modifier.png" alt="Modifier"/></a></td> <td><a href="supprimer-categorie.php?id='.$affiche['id'].'"><img src="images/supprimer.png" alt="Supprimer"/></a></td></tr>';

                     }

                     echo '</tbody></table>';

                     //On ferme else

                 }*/

             ?>


         </div>


     </div>

    </body>
</html>
