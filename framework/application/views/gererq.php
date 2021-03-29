<?php
session_start();
echo 'Identifiant : '.$_SESSION['identifiant'];
$id=$_SESSION['identifiant'];
$mail=$_SESSION['email'];
$_SESSION['clé']='';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>QuizZone</title>
  <meta charset="utf-8">

  <!-- lien dw -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accstyle">
  
    <!-- Lien LO   
    <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
    <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accstyle">
  -->

  <style type="text/css">
    .hop{
      position: absolute;
      margin-top: 25%;
      right: 5%;
      bottom: 5%;
      position: fixed;
    }
  </style>

</head>
<body>

  <h1>Gérer mes quizZ </h1>

  <nav>
    <ul>     


      <!-- lien dw-->
      
      <li><a href="<?php echo base_url('index.php/Welcome/creerq'); ?>">Création de mon quizZ</a></li>
      <li><a href="<?php echo base_url('index.php/Welcome/profacc'); ?>">Retour à mon accueil</a>
        

        <!-- Lien LO  
        <li><a href="http://localhost/framework/index.php/home/profacc">Retour à mon accueil</a></li>
        <li><a href="http://localhost/framework/index.php/home/creerq">Création de mon quizZ</a></li>  
      -->
    </ul>
  </nav>

<div class="hop">
  <a href=""><img src="<?php echo base_url(); ?>assets/images/fleche.png" width="45" height ="45" atl="logo"></a>
</div>

  <div class ="intro">
    <p>Choisissez un statut parmi "en préparation", "actif" et "expiré". Vous pouvez également accéder aux statistiques de vos quizz.</p>
    <div class="saut"></div>


    <?php
    $n=0;
    $conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03");


    if ($conn) {

      $bob = $conn ->prepare("SELECT cleQ, etatQ FROM Profclé WHERE mailProf=:mail");
      $bob->bindValue(':mail', $mail  , PDO::PARAM_STR);
      $bob -> execute();

      if($bob->rowCount()!=false){
        ?>
        <style>
          td,th {
            border: 1px solid rgb(190, 190, 190);
            padding: 25px;
          }
          td {
            text-align: center;

          }
        </style>

        <!--Gerer les quizz-->
        <style type="text/css">
          table {
            margin: 18px 0;
            width: 100%;
            border-collapse: collapse;
          }
          table th,
          table td {
            text-align: left;
            padding: 6px;
          }
          table,
          th,
          td {
            border: 1px solid #000;
          }

        </style>

        <table class="test">
          <tr>
            <th>Clé quizz</th>
            <th colspan=3>Statut</th>            
            <th>Validation du statut</th>
            <th>Statistiques</th>
            
          </tr>
          

          <?php          
          
          while($row=$bob->fetch(PDO::FETCH_ASSOC)){

           $n=$n+1;
           ${'cle'.$n}=$row['cleQ'];
           
           echo '<form action="" method="post"> <!-- récupérer des données -->

           <tr><td>'.${'cle'.$n}.'</td><td>En préparation <input type="radio" name="statut" value="en préparation" ';if($row['etatQ']=="en préparation"){echo 'checked';}echo '></td><td>Actif <input type="radio" name="statut" value="actif" ';if($row['etatQ']=="actif"){echo 'checked';} echo '></td><td>Expiré <input type="radio" name="statut" value="expiré" '; if($row['etatQ']=="expiré"){echo 'checked';}echo '></td><td><input type="submit" name="etat'.$n.'" value="Enregistrer le statut"></td><td><input type="submit" name="stat'.$n.'" value="Voir statistiques"></td></tr>

           </form>';
         }

         ?>
       </table>

       <?php

       $modife = $conn ->prepare("SELECT cleQ, etatQ FROM Profclé WHERE mailProf=:mail");
       $modife->bindValue(':mail', $mail  , PDO::PARAM_STR);
       $modife -> execute();


       for ($i=1; $i <= $n; $i++) {
        

        $number=1;

        while($donnees=$modife->fetch(PDO::FETCH_ASSOC)){
          
          ${'cle'.$number}=$donnees['cleQ'];
          ${'Ecle'.$number}='E'.$donnees['cleQ'];
          $number=$number+1;
        } 

        $etat='etat'.$i;
        $stats='stat'.$i;

        if(isset($_POST[$etat])){
          
          
          if(($_POST['statut']=="actif")){
            $modif= $conn ->prepare("UPDATE Profclé SET etatQ='actif' WHERE cleQ='${'cle'.$i}';");
            $modif->execute();
            exit();
          }else if(($_POST['statut']=="en préparation")){
            $modif= $conn ->prepare("UPDATE Profclé SET etatQ='en préparation' WHERE cleQ='${'cle'.$i}';");
            $modif->execute();
            exit();
          }else if(($_POST['statut']=="expiré")){
            $modif= $conn ->prepare("UPDATE Profclé SET etatQ='expiré' WHERE cleQ='${'cle'.$i}';");
            $modif->execute();
            exit();
          }
        }

        if(isset($_POST[$stats])){

          $_SESSION['cle']=${'cle'.$i};

          header('Location:statistiques');
          
        }
      }
      
      
    }else{

      echo '<h2>Aucun Quizz n\'a été créé.</h2><br/><h3>Vous pouvez aller en créer dans la rubriquer "Créer Quizz".</h3>';

    } 

  }else{

    echo '<h3>ERROR</h3>';
    exit();   
  }
  ?>
</div>


<footer>
 <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
 <p>Version Eco+ </p> 
 <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
</footer>
</body>
</html>