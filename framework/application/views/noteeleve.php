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


        <!-- lien dw -->
            <li><a href="<?php echo base_url('/'); ?>">Accueil</a>
          <li><a href="<?php echo base_url('index.php/Welcome/eleveinscription'); ?>">Faire le quizz</a>
     
        <!--lien lo 
          <li><a href="http://localhost/framework/index.php/home/accueil">Retour</a>
              <li><a href="http://localhost/framework/index.php/home/eleveinscription">Faire le quizz</a>
-->
            
    </ul>
</nav>

<div class="marge"></div>

<?php
include('récupN.php');

echo '<div class="modif-pass-wrap">
<p id="inscription" class="title">Connexion</p>
<form method="get">';

echo '<p class="clear">Entrez la clé du quizZ:<input class="input" type="text" name="cle"></p>
<p class="clear">Entrez votre clé personnelle :<input class="input" type="text" name="cleE"></p>
<p class="clear"><input type="submit" value="Voir ma note" name="submit" class="button" id="Envoyer"></p>
</form>'; ?>




<footer>
    <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
    <p>Version Eco+ </p> 
    <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>


</footer>
</body>

</html>