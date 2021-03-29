  <?php
  session_start();
  echo 'Identifiant : '. $_SESSION['prenom'].' '.$_SESSION['nom'];
  $key = $_SESSION['cle'];
  $temps= $_SESSION['temps'];


  ?>
  <!DOCTYPE html>
  <html lang="fr">
  <head>

  	<title>QuizZone</title>
  	<meta charset="utf-8">

  	<!-- lien dw  -->
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accueil">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accstyle">

      <!-- Lien LO 
        <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accueil">
        <link rel="stylesheet" type="text/css" href="http://localhost/framework/assets/css/accstyle">
    -->

    <style>

    	h4{
    		font-size: 20px;
    		margin-top: 100px;
    		text-align: center;
    	}

    	h3{
    		font-size: 22px;
    		margin-top: 50px;
    		margin-bottom: -50px;
    		text-align: center;
    	}

    	text{
    		width: 90%;
    		padding: 12px 20px;
    		margin: 5px 0;
    		box-sizing: border-box;
    		border: none;
    		border-bottom: 2px solid purple;
    		font-size: 17px;

    	}

    	texte{
    		width: 100%;
    		padding: 12px 20px;
    		margin: 5px 15px;
    		box-sizing: border-box;
    		border: none;
    		border-bottom: 2px solid purple;
    		font-size: 20px;
    		font-weight:bold;

    	}

    	input[type=checkbox] {
    		-webkit-appearance: none;       
    		-ms-appearance: none;
    		margin-bottom: -10px;
    		margin-top: 45px;
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


    	span{
    		font-size: 20px;
    		background-color: rgb(209, 153, 252);
    		width: 20%;
    		right: 0%;
    		position: fixed;
    		right:0%;
    		top:50%;
    		text-align: center;
    		padding-top: 10px;
    		padding-bottom: 10px;
    		border-radius: 10px;
    	}

    	.quote{
    		margin-bottom: 65px;
    	}


    	#Envoi{
    		position:relative;
    		margin-top: 150px;
    		margin-bottom: -450px;
    		font-size: 30px;
    		margin-left:auto;
			margin-right:auto;
    		border:solid 4px purple;
    		background-color:rgb(209, 153, 252);
    		border-radius: 10px; 
    		display: block;
    		

 
    	}  



    	#Envoi:hover{
    		transform: scale(1.2); 

    	}



    </style>

</head>
<body onload="timer">

	<h1>Réalisation quizZ : <?php echo $key; ?> </h1>

	<nav>
		<ul>    


			<!-- lien dw -->  

			<li><a href="<?php echo base_url('/'); ?>">Déconnexion</a></li>  


          <!-- Lien LO 
           <li><a href= "http://localhost/framework/index.php/home/accueil">Déconnexion</a>  
           -->   
       </ul>
   </nav>



   <div class ="intro">


   	<!--chrono-->
   	<?php
$heures   = 0;  // les heures < 24
$minutes  = $temps;   // les minutes  < 60
$secondes = 1;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// redirection
//$redirection = 'https://phpsources.net/code_s.php?id=493';
$secondes = mktime(date("H") + $heures,
	date("i") + $minutes,
	date("s") + $secondes,
	$mois,
	$jour,
	$annee
) - time();
?>


<script>
//var chrono = 1 * 62000; //car c'est en milliseconde et on convertit en minutes !!! 
var chrono = <?php echo $temps;?> * 62000;

var tps = setTimeout(messageFin, chrono);


var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

	temps-- ;
	j = parseInt(temps) ;
	h = parseInt(temps/3600) ;
	m = parseInt((temps%3600)/60) ;
	s = parseInt((temps%3600)%60) ;
	document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
	(m<10 ? "0"+m : m) + ' min : ' +
	(s<10 ? "0"+s : s) + ' sec ';

	if ((s == 0 && m ==0 && h ==0)) {
		clearInterval(timer);

	}
}


/*fin temps du chrono*/
function messageFin() {  

	alert("Le temps est écoulé ! Vos réponses n'ont pas été envoyées car vous n'avez pas appuyé sur le bouton pour les envoyer.");
	document.location.href="<?php echo base_url('/')?>";

}



</script>


<?php
// la condition est que le nombre de seconde doit etre inferieur a 24 heures
if ($secondes <= 3600*24) {
	?>

	<!--affichage temps-->
	<span>Il vous reste :
		<div id="minutes"></div></span>
		<?php
	}

	include('récupq.php');

	echo '<h4>Votre clé personelle élève (à conserver précieusement pour pouvoir accéder à vos notes) : </h4>';
	echo '<h3>'.$_SESSION['cleE'].'</h3><input type="submit" id="Envoi" name="envoi" value="Valider vos réponses">'; 

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