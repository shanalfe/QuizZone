<!DOCTYPE html>
<html lang="fr">
<head>
	<title>QuizZone</title>
  <meta charset="utf-8">

	<!-- liens DW -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/zoneq">
	   

      <!-- lien lo 
      	<link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
      <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/zoneq">
		-->

</head>
<body>

	<h1>Accès Quizz </h1>

<nav>
    <ul>
    	<!-- lien DW -->
    		<li><a href="<?php echo base_url('/'); ?>">Retour</a>
          <li><a href="<?php echo base_url('index.php/Welcome/noteeleve'); ?>">Voir ma note</a>
			
    	<!--lien lo 
        <li><a href="http://localhost/framework/index.php/home/accueil">Retour</a>
    			-->
    </ul>
</nav>

<div class="marge"></div>

<?php
include('envoiE.php');

echo '<div class="modif-pass-wrap">
<p id="inscription" class="title">Connexion</p>
<form>';

echo '<p class="clear">Entrez votre nom :<input class="input" type="text" name="nom" > Entrez votre prénom :<input class="input" type="text" name="prenom"></p>
<p class="clear">Clé du quizZ :<input class="input" type="text" name="clé">
<p class="clear"><input type="submit" value="Entrer dans le QuizZ" name="submit" class="button" id="Envoyer"></p>
</form>'; ?>



<footer>
  <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
  <p>Version Eco+ </p> 
  <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>


</footer>
</body>


</html>