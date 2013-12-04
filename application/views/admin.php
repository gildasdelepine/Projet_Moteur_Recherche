<?php
    session_start();

    //include('connexion_bd.php');
    // On met les variables utilis�s du script PHP � FALSE.
    $error = FALSE;
    $connexionOK = FALSE;

    // On regarde si l'utilisateur a bien utilis� le module de connexion pour traiter les donn�es.
    if(isset($_POST["connexion"])){

       // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.
	if($_POST["login"] == NULL OR $_POST["pass"] == NULL){
	    $error = TRUE;
	    $errorMSG = "Vous devez remplir tout les champs !";
	}

	// Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentr� existe bien dans la base de donn�es.
	else{

	    $sql = "SELECT login FROM user WHERE login = '".$_POST["login"]."' ";

	    $req = mysql_query($sql);

	    // Si oui, on continue le script...
	    if($sql){

		// On s�lectionne toute les donn�es de l'utilisateur dans la base de donn�es.
		$sql = "SELECT * FROM user WHERE login = '".$_POST["login"]."' ";
		$req = mysql_query($sql);

		// Si la requ�te SQL c'est bien pass�...
		if($sql){

		    // On r�cup�re toute les donn�es de l'utilisateur dans la base de donn�es.
		    $donnees = mysql_fetch_assoc($req);

		    // Si le mot de passe entr� � la m�me valeur que celui de la base de donn�es, on l'autorise a se connecter...
		    if($_POST["pass"] == $donnees["password"]){
		       $connexionOK = TRUE;
		       //$connexionMSG = "Connexion au site réussie. Vous êtes désormais connecté !";
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

    if(isset($_SESSION["login"]) AND isset($_SESSION["pass"])){
	header('Location: index.php');
	//echo '<p style="color:green">Bienvenue <strong>'.$_SESSION["login"].'</strong></p>';
    } 

    if($error == TRUE){ echo '<p align="center" style="color:red"><strong>'.$errorMSG.'</strong></p>'; } 

    if($connexionOK == TRUE){ echo '<p align="center" style="color:green"><strong>'.$connexionMSG.'</strong></p>'; } 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
	<meta http-equiv="Content-Type" name="author" content="text/html; charset=utf-8" />
	<title>
	  Projet Indexation
	</title>
	<link rel="stylesheet" href="style.css" type="text/css" title="style"/>
	<link rel="alternate stylesheet" href="style2.css" type="text/css" title="style2"/>
	<script type="text/javascript" src="switchStyle.js"></script> 
    </head>




    <body>
	    <!-- header -->

	<div id="header">
	    <div><img src="images/cat.jpg" alt="Photo of Gully" id="headImg" /></div>
	    <div id="title">
		    <div id="header_center">Moteur de recherche multmédia</div>
		    </div>

	    <div id="menu">
	    <ul>
	      <li><a href="index.html">Accueil</a></li>
	      <li><a href="#">Rechercher</a></li>
	      <li><a href="admin.php" class="active">Administration</a></li>
	      <!--<li><a href="liens.html">Liens</a></li>
	      <li><a href="contact.html">Contact</a></li>-->
	    </ul>
	    </div>

	</div>
	<!--end header -->

	    <!-- main -->
	<div id="back_main">
	    <div id="main">

		<h2>Connexion</h2>
		
		<div id="text">
		    <form action="admin" method="post">
			<table id="form">
			    <tr>
			       <td><label for="login"><strong>Nom de compte</strong></label></td>
			       <td><input type="text" name="login" id="login"/></td>
			    </tr>
			    <tr>

			       <td><label for="pass"><strong>Mot de passe</strong></label></td>
			       <td><input type="password" name="pass" id="pass"/></td>
			    </tr>
			    <tr>
				<td><input type="submit" name="connexion" value="Se connecter"/></td>
			    </tr>
			</table>
			
		    </form>
		</div>
	    </div>
	</div>
	<!-- end main -->
	<!-- footer -->
	<div id="footer">
	    <div id="right_footer">&copy; Copyright 2013 Gildas DELEPINE</div>
	    <div id="W3C">
		<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" height="31" width="88"/></a>
		<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valide !"/></a>
	    </div>
	</div>
	<!-- end footer -->
    </body>

</html>