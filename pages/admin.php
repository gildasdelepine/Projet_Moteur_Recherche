<?php
session_start();

/*$BDD = mysql_connect("localhost","root","");  // Connexion à la base de données.
             mysql_select_db("database");       // Sélection de la base de données utilisée.*/
include('connexion_bd.php');
// On met les variables utilisés du script PHP à FALSE.
$error = FALSE;

$connexionOK = FALSE;

// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
if(isset($_POST["connexion"])){

   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.
   if($_POST["login"] == NULL OR $_POST["pass"] == NULL){

      $error = TRUE;

      $errorMSG = "Vous devez remplir tout les champs !";

   }

   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
   else{

      $sql = "SELECT login FROM user WHERE login = '".$_POST["login"]."' ";

      $req = mysql_query($sql);

      // Si oui, on continue le script...
      if($sql){

         // On sélectionne toute les données de l'utilisateur dans la base de données.
         $sql = "SELECT * FROM user WHERE login = '".$_POST["login"]."' ";

         $req = mysql_query($sql);

         // Si la requête SQL c'est bien passé...
         if($sql){

            // On récupère toute les données de l'utilisateur dans la base de données.
            $donnees = mysql_fetch_assoc($req);

            // Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...
            if($_POST["pass"] == $donnees["password"]){

               $connexionOK = TRUE;

               $connexionMSG = "Connexion au site réussie. Vous êtes désormais connecté !";

               $_SESSION["login"] = $_POST["login"];

               $_SESSION["pass"] = $_POST["pass"];

            }

            // Sinon on lui affiche un message d'erreur.
            else{

               $error = TRUE;

               $errorMSG = "Nom de compte ou mot de passe incorrect !";

            }

         }

         // Sinon on lui affiche un message d'erreur.
         else{

            $error = TRUE;

            $errorMSG = "Nom de compte ou mot de passe incorrect !";

         }

      }

      // Sinon on lui affiche un message d'erreur.
      else{

         $error = TRUE;

         $errorMSG = "Nom de compte ou mot de passe incorrect !";

      }

   }

}

mysql_close();

?>

<?php if(isset($_SESSION["login"]) AND isset($_SESSION["pass"])){

   echo '<p style="color:green">Bienvenue <strong>'.$_SESSION["login"].'</strong></p>';

} ?>

<?php if($error == TRUE){ echo '<p align="center" style="color:red"><strong>'.$errorMSG.'</strong></p>'; } ?>

<?php if($connexionOK == TRUE){ echo '<p align="center" style="color:green"><strong>'.$connexionMSG.'</strong></p>'; } ?>

<html>

   <head>

      <title>Création d'un formulaire de connexion en HTML</title>

   </head>

   <body>

      <h2>Connexion au site</h2>

      <form action="admin.php" method="post">

         <table>

            <tr>

               <td><label for="login"><strong>Nom de compte</strong></label></td>
               <td><input type="text" name="login" id="login"/></td>

            </tr>

            <tr>

               <td><label for="pass"><strong>Mot de passe</strong></label></td>
               <td><input type="password" name="pass" id="pass"/></td>

            </tr>

         </table>

         <input type="submit" name="connexion" value="Se connecter"/>

      </form>

   </body>

</html>