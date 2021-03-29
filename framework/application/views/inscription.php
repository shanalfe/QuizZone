<!DOCTYPE html>
<html lang="fr">
<head>
	<title>QuizZone</title>
	<meta charset="utf-8">


	<!-- lien dw -->
	 	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
	 	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inscription">

	  <!-- Lien lo 	 
	  	<link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
	 	 <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/inscription">
	-->
</head>
<body>

	<h1>Nouveau compte Professeur</h1>

<nav>
    <ul>
	<!-- lien dw -->
    	<li><a href="<?php echo base_url('/'); ?>">Accueil</a>
    	<li><a href="<?php echo base_url('index.php/Welcome/connexion'); ?>">Connexion</a>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/connexion">

	

    		<!-- lien lo 
    			<li><a href="http://localhost/framework/index.php/home/accueil">Accueil</a>
    			<li><a href="http://localhost/framework/index.php/home/connexion">Connexion</a>
			-->

    		
    </ul>
</nav>

<?php
include('function.php');
include('envoi.php');

echo '<div class="modif-pass-wrap">
<p id="inscription" class="title">Inscription</p>
<form>';

echo '<p class="clear">Choisissez un identifiant :<input class="input" type="text" name="identifiant"></p>
<p class="clear">Votre adresse mail :<input class="input" type="text" name="email"></p>
<p class="clear">Votre mot de passe :<input class="input" type="password" name="passeUn">Confirmer votre mot de passe :<input class="input"  type="password" name="passeDe"></p>
<p class="clear"><input type="submit" value="S\'inscrire" name="submit" class="button" id="Envoyer"></p>
</form>';

?>

<footer>
	<p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
	<p>Version Eco+ </p> 
	<p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
</footer>
</body>
</html>