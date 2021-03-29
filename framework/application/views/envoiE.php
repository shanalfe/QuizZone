<?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_GET['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
     srand((double)microtime()*1000000);
     $cléE = '';
     for($i=0; $i<5; $i++){
        $cléE .= $chaine[rand()%strlen($chaine)];
     }

     $nom = $_GET['nom']; 
     $prenom = $_GET['prenom'];  
     $cleQ = $_GET['clé'];
     $EcleQ='E'.$cleQ;
     $conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); 

     if ($conn) {
        $select = $conn->prepare("SELECT * FROM Profclé WHERE cleQ=:cleQ;");
        $select->bindValue(':cleQ',$cleQ,PDO::PARAM_STR);
        $select->execute();

        if($select->rowCount()!=false){

            while($row=$select->fetch(PDO::FETCH_ASSOC)){
                $temps=$row['temps'];
                $etat=$row['etatQ'];
            }
            if($etat=='actif'){
                $envoi = $conn ->prepare("INSERT INTO $EcleQ(prenomE, nomE, cléElève, noteE) VALUES ('$prenom', '$nom', '$cléE', '');");

                $envoi -> execute();

                session_start();
                $_SESSION['prenom']=$prenom;
                $_SESSION['nom']=$nom;
                $_SESSION['cleE']=$cléE;
                $_SESSION['cle']=$cleQ;
                $_SESSION['temps']=$temps;
                header('Location:fairequizz');

                $conn =null;

            }else if($etat=='en préparation'){
                echo '<center>Ce Quizz est en préparation actuellement, attendez son activation par le professeur.</center>';
            }else if($etat=='expiré'){
                echo '<center>Ce Quizz est expiré et n\'est donc plus disponible.</center>';
            }else{
                echo '<center>Il n\'y a pas de Quizz possédant cette clé.</center>';
            }
      }else{
        echo '<h3>ERROR</h3>';
        exit();
      }
   }
}     
  
?>