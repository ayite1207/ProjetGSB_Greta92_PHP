<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>GSB</title>
	<link rel="stylesheet" href="/GSB/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
<?php
require 'controller/Dao.php';
require 'modele/Visiteur.php';
require 'modele/Etat.php';
require 'modele/fichefrais.php';
require 'modele/FraisForfait.php';
require 'modele/ligneFraisForfait.php';
require 'modele/ligneFraisHorsForfait.php';
require 'include/csrf/csrf_request_type_functions.php';
require 'include/csrf/csrf_token_functions.php';

$r=1;
$action = explode ("/",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$action=end($action);
// echo $action;

if (isset($_SESSION["visiteur"])) {
    $online=unserialize($_SESSION["visiteur"]);
}

if ($action=="index.php") {
    $existe=0;
    $background=0;
    include ("view/login.php");
}

if ( $action=="consulter") {   
    $message=0;
    $existe=0;
    include ("view/userConsult.php");
}
if ( $action=="userNew") {   
    include ("view/userNew.php");
}


if ( $action=="login") {
    if(request_is_post()) {
        // on va tester que le token est valid (le token envoye a partir du champ cache
        // du formulaire est identique à celui stocke dans la variable de session)
        if(csrf_token_is_valid()) {
            $message = "LE FORMULAIRE DE SOUMISSION EST VALIDE";
            // echo $message;
            // on va tester si le tocken est recent
            if(csrf_token_is_recent()) {
                $message .= " (recent)";
                // echo $message;
                //on fait le traitement
                $login=$_POST["login"];
                $mdp=$_POST["mdp"];
                $dao=Dao::getPdoGsb();
                $visiteur=$dao->getInfosVisiteur($login, $mdp);
                
                if($login==null and $mdp==null){
                    $erreur="Tous les champs d'avoivent etre remplis";
                    $existe=1;
                    $background=1;
                    include ("view/login.php");
                    
                }elseif($login==null and $mdp!==null){
                    $erreur="Le champs login doit etre remplis";
                    $existe=1;
                    $background=11;
                    include ("view/login.php");
                }elseif ($login!==null and $mdp==null){
                    $erreur="Le champs Mot de passe doit etre remplis";
                    $existe=1;
                    $background=12;
                    include ("view/login.php");
                }elseif ($login!==null and $mdp!==null){
                    $login=htmlspecialchars($_POST["login"]);
                    $mdp=sha1(htmlspecialchars($_POST["mdp"]));
                    
                    $dao=Dao::getPdoGsb();
                    $visiteur=$dao->getInfosVisiteur($login, $mdp);
                    $erreur="Le champs Mot de passe doit etre remplis";
                    $existe=1;
                    $background=12;
                    if ($visiteur==null) {
                        $erreur="le login ou le mot de passe n'existe pas";
                        $existe=1;
                        $background=1;
                        include ("view/login.php");
                    }else {
                        $login=$visiteur->getLogin();
                        // echo $login;
                        $mdp=$visiteur->getMdp();
                        // echo $mdp;
                        if($login=="dandre" && $mdp=="12e0b9be32932a8028b0ef0432a0a0a99421f745"){
                            $_SESSION["visiteur"]=serialize($visiteur);
                            $online=unserialize($_SESSION["visiteur"]);
                            $dao=Dao::getPdoGsb();
                            $visiteur=$dao->getLesVisiteur();
                            $existe=0;
                            $message=0;
                            include ("view/comptable.php");
                        }else {
                            $_SESSION["visiteur"]=serialize($visiteur);
                            $online=unserialize($_SESSION["visiteur"]);
                            include ("view/userNew.php");
                        }
                    }    
            } else {
                $message .= " (not recent)";
                //formulaire invalide
                echo $message;
            }
        } else {
            $message = "CSRF TOKEN MISSING OR MISMATCHED";
            // on interdit les traitements avec la base de donnee par exemple
            echo $message;
        }
    } else {
        // form not submitted or was GET request
        $message = "Please login.";
        echo $message;
    }
}
}


if ($action=="gestion"){
    
    $idVisiteur=$_POST["idvisiteur"];
    $dateModif =$_POST["today"];
    $mois=$_POST["mois"];
    $quantiteRepas=$_POST["repas"];
    $quantiteNuitees=$_POST["nuitees"];
    $quantiteEtape=$_POST["etape"];
    $quantiteKm=$_POST["km"];
    $nbJustificatifs=$_POST["nombreJustificatif"];
    $montantValide=$_POST["total"];
    
    $compteur=$_POST["compteur"];
    
    if ($quantiteRepas!=="") {
        
        $newRepas=new LigneFraisForfait($idVisiteur,$mois,"REP",$quantiteRepas);
        $dao=Dao::getPdoGsb();
        $dao->insertFraisForfait($newRepas);
    }
    if ($quantiteNuitees!=="") {
        
        $newNuitees=new LigneFraisForfait($idVisiteur,$mois,"NUI",$quantiteNuitees);
        $dao=Dao::getPdoGsb();
        $dao->insertFraisForfait($newNuitees);
    }
    if ($quantiteEtape!=="") {
        
        $newEtape=new LigneFraisForfait($idVisiteur,$mois,"ETP",$quantiteEtape);
        $dao=Dao::getPdoGsb();
        $dao->insertFraisForfait($newEtape);
    }
    if ($quantiteKm!=="") {
        
        $newKm=new LigneFraisForfait($idVisiteur,$mois,"KM",$quantiteKm);
        $dao=Dao::getPdoGsb();
        $dao->insertFraisForfait($newKm);
    }
    
    for ($i = 1;$i <= $compteur;$i++) {
        
        $dateHorsForfait=$_POST["dateHorsForfait$i"];
        $libelleHorsForfait=$_POST["libelleHorsForfait$i"];
        $quantitéHorsForfait=$_POST["quantiteHorsForfait$i"];
        $dao=Dao::getPdoGsb();
        $ligneFraisHorsForfait=new LigneFraisHorsForfait($idVisiteur,$mois,$libelleHorsForfait,$dateHorsForfait,$quantitéHorsForfait);
        $dao->insertFraisHorsForfait($ligneFraisHorsForfait);
    }
    
    if ($montantValide!=="" && $nbJustificatifs!=="") {
        $idEtat="CR";
        $dao=Dao::getPdoGsb();
        $ficheFrais=new ficheFrais($idVisiteur,$mois,$nbJustificatifs,$montantValide,$dateModif,$idEtat);
        $dao->ficheFrais($ficheFrais);
    }
    
    include ("view/userNew.php");
                
}


// FIN DU TRATEMENT DE LA PAGE userNew.php

//DEBUT DU TRATEMENT DE LA PAGE userConsult.php

    if ($action=="affichage") {
       
        $mois=$_POST["mois"];
        $id=$online->getId();
        
        $dao=Dao::getPdoGsb();
        $ligneFraisForfaitRepas=$dao->afficherdonnees($mois,$id,"REP");
        $ligneFraisForfaitNuitee=$dao->afficherdonnees($mois,$id,"NUI");
        $ligneFraisForfaitEtape=$dao->afficherdonnees($mois,$id,"ETP");
        $ligneFraisForfaitKm=$dao->afficherdonnees($mois,$id,"KM");
        $ficheFrais=$dao->infoficheFrais($mois,$id);
        $ficheHorsForfait=$dao->infoLigneFraisHorsForfait($mois,$id);
        
        if ($ligneFraisForfaitRepas==null && $ligneFraisForfaitNuitee==null && $ligneFraisForfaitEtape==null && $ligneFraisForfaitKm==null  ){
            $erreur="Le mois que vous avez sélectionné ne contient aucune donnée!";
            $message=1;
            $existe=0;
            $ficheFrais="";
        }else {
            $message=0;
            $existe=1;
            
            $ficheHorsForfait=$dao->infoLigneFraisHorsForfait($mois,$id);
            //var_dump($ficheHorsForfait);
        }
        //$ligneFraisHorsForfait=$dao->afficherdonnees($mois,$id);
        include ("view/userConsult.php");
               
    }
       
    // FIN DU TRATEMENT DE LA PAGE userConsult.php
    
    //DEBUT DU TRATEMENT DE LA PAGE comptable.php
    
    if ($action == "infoVisiteur"){
       
        $existe=0;
        $message=0;
        $mois=$_POST["choixMois"];
        $id=$_POST["choixNom"];
        // echo "le mois choisi : ".$mois;
        // echo $id;
        $dao=Dao::getPdoGsb();
        $visiteur=$dao->getLesVisiteur();
        
        $ligneFraisForfaitRepas=$dao->afficherdonnees($mois,$id,"REP");
        $ligneFraisForfaitNuitee=$dao->afficherdonnees($mois,$id,"NUI");
        $ligneFraisForfaitEtape=$dao->afficherdonnees($mois,$id,"ETP");
        $ligneFraisForfaitKm=$dao->afficherdonnees($mois,$id,"KM");
        $ficheFrais=$dao->infoficheFrais($mois,$id);
        $ficheHorsForfait=$dao->infoLigneFraisHorsForfait($mois,$id);
        
        if ($ligneFraisForfaitRepas==null && $ligneFraisForfaitNuitee==null && $ligneFraisForfaitEtape==null && $ligneFraisForfaitKm==null  ){
            $erreur="Le visiteur selectionner ou le moi ne sont pas enregistrés";
            $message=1;
            $existe=0;
            $ficheFrais="";
        }else {
            $message=0;
            $existe=1;
        }
        include ("view/comptable.php");
               
    }

    if( $action == "upDateValue"){
        $existe=2;
        $message=2;
        $mois=$_POST["moisUpDate"];
        $dateModif=$_POST["today"];
        
        $idVisiteur=$_POST["idVisiteur"];
        $quantiteRepas=$_POST["repas"];
        $quantiteNuitees=$_POST["nuitees"];
        $quantiteEtape=$_POST["etape"];
        $quantiteKm=$_POST["km"];
        $nbJustificatifs=$_POST["nbJustificatifs"];
        $montantValide=$_POST["total"];
        $nbLigne=$_POST["nbLigne"];
        $tabFraisHorsForfait=array();
        
        $newRepas=new LigneFraisForfait($idVisiteur,$mois,"REP",$quantiteRepas);
        $newNuitees=new LigneFraisForfait($idVisiteur,$mois,"NUI",$quantiteNuitees);
        $newEtape=new LigneFraisForfait($idVisiteur,$mois,"ETP",$quantiteEtape);
        $newKm=new LigneFraisForfait($idVisiteur,$mois,"KM",$quantiteKm);
        
        $tabFraisForfait=array($newRepas,$newNuitees,$newEtape,$newKm);
        
        for($i=0;$i <= $nbLigne;$i++ ){
            $dateHorsForfait=$_POST["dateHorsForfait$i"];
            $libelleHorsForfait=$_POST["libelleHorsForfait$i"];
            $quantitéHorsForfait=$_POST["quantiteHorsForfait$i"];
            $dao=Dao::getPdoGsb();
            $ligneFraisHorsForfait=new LigneFraisHorsForfait($idVisiteur,$mois,$libelleHorsForfait,$dateHorsForfait,$quantitéHorsForfait);
            $tabFraisHorsForfait[]=$ligneFraisHorsForfait;  
        }
  
        
        $ficheFrais=new ficheFrais($idVisiteur,$mois,$nbJustificatifs,$montantValide,$dateModif,"VA");
        
        $dao=Dao::getPdoGsb();
        $visiteur=$dao->getLesVisiteur();
        $dao->update($tabFraisForfait,$tabFraisHorsForfait,$ficheFrais);   
        
        include ("view/comptable.php");
    }
    

















?>