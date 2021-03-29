<?php 
session_start();
$cléE=$_SESSION['cleE'];
$clé=$_SESSION['cle'];
$note=$_SESSION['note'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>QuizZone</title>
  <meta charset="utf-8">

  <!-- liens DW -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">

  

    <!-- lien lo 
    <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
  -->

  <style>

    h3{
      margin-bottom: 22px;
      margin-top: 40px;
      font-size: 22px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    #correc{
      font-size: 30px;
      text-decoration: underline;
    }

    #vosreps{
      font-size: 30px;
      text-decoration: underline;
    }

    texte{
      width: 100%;
      margin-left: 30px;
      padding-left: 10px;
      padding-right: 10px;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid purple;
      font-size: 22px;
      font-weight:bold;
    }

    text{
      padding-left: 15px;
      padding-right: 10px;
      width: 90%;
      box-sizing: border-box;
      border-bottom: 2px solid purple;
      font-size: 20px;
      
    }

    table{
      width: 100%;
    }
    #rep1{
      margin-top: 10px;
      margin-bottom: -20px;
      margin-left: 5px;
      text-align: center;
      width: 7%;
      background-color: #93FB8C;
      border: solid 2px purple; 
      border-radius: 8px;
      padding-left: 7px;
      padding-right: 7px;
      padding-top: 5px;
      padding-bottom: 5px;
    }

    #rep2{
      margin-top: 10px;
      margin-bottom: -20px;
      margin-left: 5px;
      text-align: center;
      width: 7%;
      background-color: #FF8166;
      border: solid 2px purple;
      border-radius: 8px; 
      padding-left: 7px;
      padding-right: 7px;
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .hop{
      position: absolute;
      bottom: 5%;
      right: 5%;
      position: fixed;
    }
  </style>

</head>
<body>

  <h1>Note Quizz : <?php echo $clé; ?></h1>

  <nav>
    <ul>

    	<!-- lien dw -->
      <li><a href="<?php echo base_url('/'); ?>">Retour</a>

        <!--lien lo 
        <li><a href="http://localhost/framework/index.php/home/accueil">Retour</a></li>
      -->
    </ul>
  </nav>
<div class="hop">
  <a href=""><img src="<?php echo base_url(); ?>assets/images/fleche.png" width="45" height ="45" atl="logo"></a>
</div>

  <div class="marge"></div>


  <h3>Votre note au Quizz est de <?php echo $note; ?>/20</h3>
  <h3>Soit <?php echo ($note/20)*100; ?>% des questions répondues correctement</h3>


  <?php

  $conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); 

  $showR= $conn->prepare("SELECT * FROM QuestionRep NATURAL JOIN $clé WHERE cleE='$cléE' AND question=questionE");

  $showR->execute();

  $showC= $conn->prepare("SELECT * FROM $clé  WHERE question!=''");

  $showC->execute();

  $n1=1;
  $n2=1;

  echo '<table class="Correction">
  <tr>            
  <th id="vosreps">Vos Réponses au Quizz :</th>
  <th></th>
  <th id="correc">Correction Quizz :</th>

  </tr>';



  while($donnees=$showR->fetch(PDO::FETCH_ASSOC)){

    $row=$showC->fetch(PDO::FETCH_ASSOC);
    echo '<tr><center><td><br/><br/><texte>Question n°'.$n1.': '.$donnees['questionE'].'</texte><br/>';

    if($donnees['réponseEnoncé1']!=''){
      echo '<br/><text>'.$donnees['réponseEnoncé1'].'   </text>';
      if($donnees['réponseE1']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($donnees['réponseEnoncé2']!=''){
      echo '<br/><text>'.$donnees['réponseEnoncé2'].'   </text>';
      if($donnees['réponseE2']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($donnees['réponseEnoncé3']!=''){
      echo '<br/><text>'.$donnees['réponseEnoncé3'].'   </text>';
      if($donnees['réponseE3']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($donnees['réponseEnoncé4']!=''){
      echo '<br/><text>'.$donnees['réponseEnoncé4'].'   </text>';
      if($donnees['réponseE4']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }

    echo '</td><td></td>';

    $n1=$n1+1;



    echo '<td><br/><br/><texte>Question n°'.$n2.': '.$row['question'].'</texte><br/>';

    if($row['réponseEnoncé1']!=''){
      echo '<br/><text>'.$row['réponseEnoncé1'].'   </text>';
      if($row['réponseQ1']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($row['réponseEnoncé2']!=''){
      echo '<br/><text>'.$row['réponseEnoncé2'].'   </text>';
      if($row['réponseQ2']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($row['réponseEnoncé3']!=''){
      echo '<br/><text>'.$row['réponseEnoncé3'].'   </text>';
      if($row['réponseQ3']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    if($row['réponseEnoncé4']!=''){
      echo '<br/><text>'.$row['réponseEnoncé4'].'   </text>';
      if($row['réponseQ4']==0){
        echo '<div id="rep1">Vrai</div><br/>';
      }else{
        echo '<div id="rep2">Faux</div><br/>';
      }
    }
    echo '</td></center></tr>';

    $n2=$n2+1;
  }





  echo '</table>';

  ?>
  <footer>
   <p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
   <p>Version Eco+ </p> 
   <p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>


 </footer>

</body>

</html>