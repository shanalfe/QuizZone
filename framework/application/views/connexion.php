<!DOCTYPE html>
<html lang="fr">
<head>
	<title>QuizZone</title>
	<meta charset="utf-8">


	<!-- lien dw -->
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/connexion">

	  <!-- Liens LO	 
	  	<link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
	  <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/connexion">
	 -->

</head>
<body>

	<h1>Connexion Professeur</h1>

<nav>
    <ul>
    	<!-- lien dw --> 
    		<li><a href="<?php echo base_url('/'); ?>">Accueil</a>
    		<li><a href="<?php echo base_url('index.php/Welcome/inscription'); ?>">Inscription</a>

    	<!-- Lien LO 
    		<li><a href="http://localhost/framework/index.php/home/accueil">Accueil</a>
    	<li><a href="http://localhost/framework/index.php/home/inscription">Inscription</a>
    	-->
    </ul>
</nav>


<?php

include('récup.php');

echo '<div class="modif-pass-wrap">
<p id="inscription" class="title">Connexion</p>
<form method="get">';

echo '<p class="clear">Entrez votre adresse mail :<input class="input" type="mail" name="email"></p>
<p class="clear">Votre mot de passe :<input class="input" type="password" name="passe">
<p class="clear"><input type="submit" value="Se connecter" name="submit" class="button" id="Envoyer"></p>
</form>';

   
?>

<footer>
	<p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
	<p>Version Eco+ </p> 
	<p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
</footer>
</body>
</html>