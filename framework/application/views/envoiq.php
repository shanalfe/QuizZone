<?php
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
        if (isset($_GET['submit'])) {
       $quest=$_GET['questionn'];
            $image=$_GET['image'];
            $bouton1=1;
            $bouton2=1;
            $bouton3=1;    
            $bouton4=1;
            $prop1=$_GET['prop1'];
            $prop2=$_GET['prop2'];
            $prop3='';
            $prop4='';

            if (isset($_GET['bouton1'])) {
              $bouton1=0;
            }else{
              $bouton1=1;
            }
              
            if (isset($_GET['bouton2'])) {
              $bouton2=0;
            }else{
              $bouton2=1;
            }
              
            if (isset($_GET['bouton3'])) {
              $bouton3=0;
            }else{
              $bouton3=1;
            }

            if (isset($_GET['bouton4'])) {
              $bouton4=0;
            }else{
              $bouton4=1;
            }
            
            if ($_GET['prop3']) {
              $prop3=$_GET['prop3'];
            }

            if ($_GET['prop4']) {
              $prop4=$_GET['prop4'];
            }
     $Ekey = 'E'.$key;
     $conn = new PDO("mysql:host=dwarves.iut-fbleau.fr;charset=UTF8;dbname=gilbert","gilbert","Rizel_Storm_03"); 

     if ($conn) {

        $create = $conn ->prepare("CREATE TABLE $key(question varchar(500) NOT NULL DEFAULT '', image text DEFAULT NULL, réponseQ1 boolean, réponseQ2 boolean, réponseQ3 boolean, réponseQ4 boolean,réponseEnoncé1 varchar(500) NOT NULL DEFAULT '', réponseEnoncé2 varchar(500) NOT NULL DEFAULT '', réponseEnoncé3 varchar(500) NOT NULL DEFAULT '', réponseEnoncé4 varchar(500) NOT NULL DEFAULT '') ENGINE=InnoDB DEFAULT CHARSET=utf8");

        $create -> execute();

        $createe = $conn ->prepare("CREATE TABLE $Ekey(prenomE varchar(25) NOT NULL DEFAULT '', nomE varchar(25) NOT NULL DEFAULT '', cléElève varchar(8) NOT NULL DEFAULT '', noteE varchar(8) NOT NULL DEFAULT '')ENGINE=InnoDB DEFAULT CHARSET=utf8");

        $createe -> execute();

        $conn =null;

      }else{
        echo '<h3>ERROR</h3>';
        exit();

       
     }

     

  }
       
  
?>