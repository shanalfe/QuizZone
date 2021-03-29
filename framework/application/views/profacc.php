<?php
session_start();
echo 'Identifiant : '.$_SESSION['identifiant'];
$chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
srand((double)microtime()*1000000);
$clé = '';
for($i=0; $i<8; $i++){
  $clé .= $chaine[rand()%strlen($chaine)];
}
$_SESSION['cle']=$clé;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>QuizZone</title>
   <meta charset="utf-8">

 <!-- lien lo  
 <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
 <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accstyle">
-->
<!-- lien dw-->
 	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil"> 
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accstyle">
  

</head>
<body>

  <h1>Mon espace professeur </h1>

 <nav>
  <ul>  
 
    <!--lien DW-->
       <li><a href="<?php echo base_url('index.php/Welcome/creerq'); ?>">Créer un quizZ</a></li>
   
    <!-- lien lo   
  <li><a href="http://localhost/framework/index.php/home/creerq">Créer un quizZ</a></li>
  -->




    <!-- lien DW -->
       <li><a href="<?php echo base_url('index.php/Welcome/gererq'); ?>">Gérer mes quizZ</a></li>  
       
    <!-- lien lo   
      <li><a href="http://localhost/framework/index.php/home/gererq">Gérer mes quizZ</a></li>
  -->

      <!-- lien DW -->
       <li><a href="<?php echo base_url('index.php/Welcome/'); ?>">Déconnexion</a></li>  
       
<!-- lien lo   
      <li><a href="http://localhost/framework/index.php/home/accueil">Déconnexion</a>
      -->   


      </ul>
    </nav>

 <center>
 <div class="intro">
<p>Bonjour à vous <?php echo $_SESSION['identifiant']; ?>, </br> Vous pouvez dès maintenant créer et gérer vos premiers quiz. </p> </br>
<img src="<?php echo base_url(); ?>assets/images/ordi.png" width="350" height="250">

 </div>

</center>









  <footer>
   <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
   <p>Version Eco+ </p> 
   <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
 </footer>
   </body>
 </html>