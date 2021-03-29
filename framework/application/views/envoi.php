<?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_GET['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $identifiant = $_GET['identifiant']; 
     $pass = $_GET['passeUn']; 
     $email = $_GET['email'];
     $conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); //--mysqli_connect("dwarves.iut-fbleau.fr","gilbert","Rizel_Storm_03","gilbert");

     if ($conn) {

        $verif = $conn ->prepare("SELECT * FROM Professeur WHERE email=:email;");
        
        $verif->bindValue(':email', $email  , PDO::PARAM_STR);
        $verif -> execute();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if($verif->rowCount()==false){

            $bob= $conn -> prepare("INSERT INTO Professeur (identifiant,email,pass) VALUES ('$identifiant','$email','$pass');");
            
            $bob -> execute();

          }else{
            echo '<h3>Cette adresse mail est déjà utilisée</h3>';
          }
        }else{
          echo 'Cette adresse mail n\'est pas valide.';
        }
        

        $conn =null;

      }else{
        echo '<h3>ERROR</h3>';
        exit();

       
     }

     

  }
       
  
?>