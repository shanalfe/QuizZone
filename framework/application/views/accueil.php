<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>

  <title>QuizZone</title>
  <meta charset="utf-8">
  <style>
    img{
       display: block;
    margin-left: auto;
    margin-right: auto; 
    }
  </style>

    <!-- lien dw -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accstyle">

   <!-- Lien LO 
    <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
    <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accstyle">
  -->


</head>
<body>

  <h1>Bienvenue sur QuizZone ! </h1>

 <nav>
  <ul>
   
    <li class="deroulant"><a href="">Zone Professeur</a>
      <ul class="sous">


        <!-- lien dw -->
       <li><a href="<?php echo base_url('index.php/Welcome/inscription'); ?>">Inscription</a></li>
       <li><a href="<?php echo base_url('index.php/Welcome/connexion'); ?>">Connexion</a></li>
 
       <!-- Lien LO 
        <li><a href="http://localhost/framework/index.php/home/inscription">Inscription</a></li>
        <li><a href="http://localhost/framework/index.php/home/connexion">Connexion</a></li>
  -->
        
      </ul>

      <li class="deroulant"><a href="">Zone QuizZ</a>
      <ul class="sous">


        <!-- lien dw -->
    <li><a href="<?php echo base_url('index.php/Welcome/noteeleve'); ?>">Voir ma note</a>
        <li><a href="<?php echo base_url('index.php/Welcome/eleveinscription'); ?>">Faire le quizZ</a>
      
 
       <!-- Lien LO 
        <li><a href="http://localhost/framework/index.php/home/noteeleve">Voir ma note</a></li>
        <li><a href="http://localhost/framework/index.php/home/eleveinscription">Faire le quizZ</a></li>
 -->
     
         
      </ul>
    </ul>
    </nav>

 <div class="intro">
<p>Bonjour à toutes et à tous, <br/>découvrez dès maintentant notre nouvelle application destinée aux élèves mais aussi aux professeurs. 
Une application très facile à utiliser, elle permet d'évaluer les élèves sur des points clés du cours à distance ! </p>
<p class="saut">Une application développée par Thomas Gilbert et Shana Lefevre.</p>
<div class="saut"></div>

   <img src="<?php echo base_url(); ?>assets/images/quizze.png" alt="QuizZone" width="750" height="450"> 

 </div>


  <footer>
   <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
   <p>Version Eco+ </p> 
   <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
 </footer>
</body>
</html>
