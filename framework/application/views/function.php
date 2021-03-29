<?php 
try{
function inscrire($identifiant, $email, $passeUn, $passeDe) {
        if(!empty($identifiant) AND !empty($email) AND !empty($passeUn) AND !empty($passeDe)) {
            if($passeUn === $passeDe) {
                $verifIdentifiant = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.PSEUDO);
                $verifIdentifiant -> bindParam(':identifiant', $identifiant, PDO::PARAM_STR, 50);
                $verifIdentifiant -> execute();
                if($verifIdentifiant -> rowCount() != 1) {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $verifMail = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE.EMAIL);
                        $verifMail -> bindParam(':email', $email);
                        $verifMail -> execute();
                        if($verifMail -> rowCount() != 1) {
                            Inscription::profil($identifiant, $email, $passeUn);
                            Inscription::protect($identifiant);
                            Inscription::message($identifiant);
                            $resultat = Inscription::activer($identifiant);
                        }
                        else {
                            $resultat = '<span class="error-info">L\'adresse email'.$email.' existe d&eacute;j&agrave;,<br />veuillez en saisir une autre et recommencer l\'inscription.</span>';
                        }
                    }
                    else {
                        $resultat = '<span class="error-info">L\'adresse email saisie n\'est pas valide, <br />veuillez recommencer l\'inscription.</span>';
                    }
                }
                else {
                    $resultat = '<span class="error-info">L\'identifiant saisi existe d&eacute;j&agrave;,<br />veuillez en choisir un autre et recommencer l\'inscription.</span>';
                }
            }
            else {
                $resultat = '<span class="error-info">Le champ &quot;Votre mot de passe&quot; et le champ &quot;Confirmez votre mot de passe&quot; doivent &ecirc;tre identiques, <br />veuillez recommencer l\'inscription.</span>';
            }
        }
        else {
            $resultat = '<span class="error-info">Vous devez remplir tout les champs, <br />veuillez recommencer l\'inscription.</span>';
        }
        return $resultat;
    }
  }catch(ParseError $p){

    echo $p->getMessage();
}
?>