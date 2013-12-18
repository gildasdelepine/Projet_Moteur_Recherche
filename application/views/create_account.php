<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
	<meta http-equiv="Content-Type" name="author" content="text/html; charset=utf-8" />
	<title>
	  Projet Indexation
	</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" title="style"/>
	<script src="<?php echo base_url(); ?>js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/searchScript.js"></script>
    </head>




    <body>
	<!-- header -->            
        <div id="header">
            <div><img src="<?php echo base_url(); ?>images_template/logo_polytech.png" alt="Polytech Marseille" id="headImg" /></div>
            <div id="title">
                <div id="header_left">Moteur de recherche</div>
            </div>

            <div id="menu">
            <ul>
                <li><a href="<?php echo base_url(); ?>index.php">Mot-Clé</a></li>
                <li><a href="<?php echo site_url('feedback') ?>">Feedback</a></li>
                <li><a href="<?php echo site_url('admin') ?>" class="active">Administration</a></li>
                <li><a href="<?php echo site_url('upload') ?>">Upload</a></li>
              <!--<li><a href="liens.html">Liens</a></li>
              <li><a href="contact.html">Contact</a></li>-->
            </ul>
            </div>
		
        </div>
	<!--end header -->

	    <!-- main -->
	<div id="back_main">
	    <div id="main">

		<h2>Nouveau compte</h2>
		
		<div id="text">
		    <form action="<?php echo site_url('admin/newUser') ?>" method="post">
			<table id="form">
                            <?php 
                                if(isset($error))
                                    echo '<p id="error">'.$error.'</p>';
                            ?>
			    <tr>
                                <td><strong>Prénom*</strong></td>
                                <td><input type="text" name="firstname" id="firstname"/></td>
			    </tr>
                            <tr>
                                <td><strong>Nom*</strong></td>
                                <td><input type="text" name="lastname" id="lastname"/></td>
			    </tr>
                            <tr>
                                <td><strong>E-mail</strong></td>
                                <td><input type="text" name="mail" id="mail"/></td>
			    </tr>
                            <tr>
                                <td><strong>Login*</strong></td>
                                <td><input type="text" name="login" id="login"/></td>
			    </tr>
			    <tr>
                                <td><strong>Mot de passe*</strong></td>
                                <td><input type="password" name="pass" id="pass"/></td>
			    </tr>
			    <tr>
                                <td><input type="submit" name="create" value="créer"/></td>
			    </tr>
			</table>
                        *: champs obligatoires
		    </form>
                   
		</div> 
	    </div>
	</div>
	<!-- end main -->
	<!-- footer -->
	<div id="footer">
            <div id="right_footer">&copy; Copyright 2013 Gildas DELEPINE, Marc Lieutaud</div>
            <div id="W3C">
                <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" height="31" width="88"/></a>
                <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valide !"/></a>
            </div>
        </div>
	<!-- end footer -->
    </body>

</html>