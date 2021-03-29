<?php
session_start();
echo 'Identifiant : '.$_SESSION['identifiant'];
$key=$_SESSION['cle'];

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

 	<style> 		
 			input[type=text] {
 				width: 90%;
 				padding: 12px 20px;
 				margin: 5px 0;
 				box-sizing: border-box;
 				border: none;
 				border-bottom: 2px solid purple;
 				font-size: 20px;

 			}

 			input[type=checkbox] {
 				-webkit-appearance: none;       
 				-ms-appearance: none;
 			}
 			input[type=checkbox] {

 				width: 28px;
 				height: 28px;
 				border-radius: 4px;      

 				background: #fff;
 				border: 1px solid #ccc;

 			}

 			input[type="checkbox"]:checked {
 				background: #38D80C;
 				margin:0px;
 				position: relative;
 				&:before {
 					font-family: FontAwesome;
 					content: '\f00c';
 					display: block;
 					color: grey;
 					font-size: 13px;
 					position: absolute;
 				}
 			}

 			input[type=button], input[type=submit], input[type=reset], input[type=file] {
 				background-color: #D074FE;
 				border: none;
 				border-radius: 10px;
 				color: black;
 				padding: 12px 24px;
 				text-decoration: none;
 				margin: 4px 2px;
 				cursor: pointer;
 			}

 			input[type=number]{
 				background-color: papayawhip;
 				color: black;
 				text-align: center;
 				font-size: 20px;

 			}

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

 		<h1>Création de mon quizZ </h1>

 		<nav>
 			<ul>
 				<!-- lien dw -->

 				<li><a href="<?php echo base_url('index.php/Welcome/gererq'); ?>">Gérer mes quizZ</a></li>
 				<li><a href="<?php echo base_url('index.php/Welcome/profacc'); ?>">Retour à mon accueil</a>


       <!-- Lien LO   
        
        <li><a href="http://localhost/framework/index.php/home/profacc">Retour à mon accueil</a></li>
        <li><a href="http://localhost/framework/index.php/home/gererq">Gérer mes quizZ</a></li>
    -->
</ul>
</nav>

<div class="hop">
	<a href=""><img src="<?php echo base_url(); ?>assets/images/fleche.png" width="45" height ="45" atl="logo"></a>
</div>
<div class ="intro">
	<p><u>ETAPE 1 : Comment créer des questions et des propositions ?</u></br></br> Commencez par rédiger votre question dans la zone de texte "question" et vous pouvez y ajouter au maximum 4 propositions dans la zone de texte "Proposition". Ensuite, séléctionner la ou les réponses de votre question, une fois la case séléctionnée, cette dernière apparaîtra verte. Pour rendre votre quiz plus créatif, vous pouvez y ajouter une image ! Une fois la question réalisée, validez-là grâce au bouton "Valider la question" et vous pouvez créer une nouvelle question ! </br></br>
	<u>ETAPE 2 : Comment configurer le temps de mon quiz ? </u></br></br> Quand vous aurez validé votre <u>DERNIERE QUESTION</u>, configurez votre temps ! Attention, le temps est en minute ! </br></br>
	<u>ETAPE 3 : Comment valider mon quiz ?</u></br></br>Une fois le temps configuré, cliquez sur le bouton "Valider le quiz". Vous pouvez dès maintenant gérer votre quiz <a href="<?php echo base_url('index.php/Welcome/gererq')?>">ici</a>.</br>
	N'oubliez pas de récupérer la clé de votre quiz afin que vos élèves y aient accès. </p>
</br></br>

<div class="saut"></div>

<p id="affichage"></p>


<!-- clé du quizZ-->
<center>
	<?php

	echo '<h4>Clé de votre QuizZ: '.$key.'</h4>';
	?>
</br>

</br></br></br>
</center>


<script type="text/javascript">
	var nombre=0;
</script>

<div class="saut"></div>

<?php include('envoiq.php'); 

echo '<form name="formulaireDynamique">

<label>Choisissez le temps du quiz (minute(s)) : </label>
<input type="number" name="temps" id="temps" min="1" max="480">
</br></br></br>

<input type="text" placeholder="Question" id="questionn" name="questionn" >
</br></br></br>
<input type="file" name="image">
<input type="submit" name="submit" value="Valider la question"/>
<input type="submit" name="fin" value="Valider le quiz"/>
</br></br></br></br>';

echo '<input type="checkbox" name="bouton1"><input type="text" name="prop1" placeholder="Proposition A"></br></br>'; 
echo '<input type="checkbox" name="bouton2"><input type="text" name="prop2" placeholder="Proposition B"></br></br>';
echo '<input type="checkbox" name="bouton3"><input type="text" name="prop3" placeholder="Proposition C"></br></br>';
echo '<input type="checkbox" name="bouton4"><input type="text" name="prop4" placeholder="Proposition D"></br></br>';
?>


<!-- création de quizz-->
<script type="text/Javascript" >

	function profaccueil(){
		document.location.href="http://localhost/framework/index.php/home/profacc"; /*http://dwarves.iut-fbleau.fr/~lefevres/framework/index.php/Welcome/profacc*/
		alert("Les données ont bien été envoyées ! ");
	}
</script>

<?php 
if ( isset( $_GET['submit'] ) ) {


	$conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); 



	$bob= $conn -> prepare("INSERT INTO $key(question,image,réponseQ1,réponseQ2,réponseQ3,réponseQ4,réponseEnoncé1,réponseEnoncé2,réponseEnoncé3,réponseEnoncé4) VALUES ('$quest','$image','$bouton1','$bouton2','$bouton3','$bouton4','$prop1','$prop2','$prop3','$prop4');");

	$bob -> execute();

	exit();

}



if ( isset( $_GET['fin'] ) ) {

	$conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); 

	$mail=$_SESSION['email'];
	$temps=$_GET['temps'];

	$select= $conn ->prepare("SELECT * FROM Profclé WHERE cleQ='$key'");

	$select ->execute();

	if($select->rowCount()==false){
		$inser = $conn ->prepare("INSERT INTO Profclé(mailProf,cleQ,etatQ,temps) VALUES ('$mail','$key','en préparation','$temps')");

		$inser -> execute();
	}else{

		$update= $conn ->prepare("UPDATE Profclé SET mailProf='$mail',cleQ='$key',etatQ='en préparation',temps='$temps' WHERE cleQ='$key'");
		$update -> execute();
	}

}
?>
</form>




</div>


<footer>
	<p> Nous sommes le <?php echo date('d/m/Y'); ?> </p>
	<p>Version Eco+ </p> 
	<p>@Copyright 2020 - By Thomas GILBERT & Shana LEFEVRE</p>
</footer>
</body>
</html>