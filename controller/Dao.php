<?php
class Dao{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=gsb_frais';
    //POur la securite ne pas utiliser le super-administrateur
    
    private static $user='ayite' ;
    private static $mdp='Amisfo86.' ;
    private static $monPdo;
    private static $monPdoGsb=null;
    
    /**
     * @return string
     */

    //Pour utiliser le pattern singleton on défini le constructeur comme private
    //COmme cela on ne l'utilise pas dans une autre classe.
    private function __construct(){
         Dao::$monPdo = new PDO(Dao::$serveur.';'.Dao::$bdd, Dao::$user, Dao::$mdp);
    }
    
    public  static function getPdoGsb(){
        //On verifie que la connection n'a pas ete ouverte une premiere fois
        if(Dao::$monPdoGsb==null){
            Dao::$monPdoGsb= new Dao();
        }
        return Dao::$monPdoGsb;
    }
    
    public function getInfosVisiteur($login, $mdp){
        $visiteur=null;
        // var_dump($mdp);
        $req = "select * from visiteur where login=:login and mdp=:mdp";
        $rs = Dao::$monPdo->query($req);
       
        try{
            $stmt=Dao::$monPdo->prepare($req);
            $stmt->bindParam(':login',$login);
            $stmt->bindParam(':mdp',$mdp);
            $stmt->execute();
        }catch(Exception $e){
            echo "Erreur!".$e->getMessage();
            //Comme ca on evite d'afficher des infos sur la base de donnée
        }
        
        $laLigne = $stmt->fetch();
        if ($laLigne != null)	{
            $id=$laLigne['id'];
            $nom= $laLigne['nom'];
            $prenom= $laLigne['prenom'];
            $login= $laLigne['login'];
            $mdp= $laLigne['mdp'];
            $adresse= $laLigne['adresse'];
            $cp= $laLigne['cp'];
            $ville= $laLigne['ville'];
            $dateEmbauche= $laLigne['dateEmbauche'];
            $visiteur=new Visiteur($nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$dateEmbauche);
            $visiteur->setId($id);
        }
        return $visiteur;
    }
    
    public function getLesVisiteur(){
        $liste=array();
        $req = "select * from  Visiteur ";
        $res = Dao::$monPdo->query($req);
        $laLigne = $res->fetch();
        while($laLigne != null)	{
            $id=$laLigne['id'];
            $nom= $laLigne['nom'];
            $prenom= $laLigne['prenom'];
            $login= $laLigne['login'];
            $mdp= $laLigne['mdp'];
            $adresse= $laLigne['adresse'];
            $cp= $laLigne['cp'];
            $ville= $laLigne['ville'];
            $dateEmbauche= $laLigne['dateEmbauche'];
            $user=new Visiteur($nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$dateEmbauche);
            $user->setId($id);
            $liste[]=$user;
            $laLigne = $res->fetch();
        }
        return $liste;
    }
    
    public function insertFraisForfait($info){
        
        $idvisiteur=$info->getIdVisiteur();
        $mois=$info->getMois();
        $idFraisForfait=$info->getIdFraisForfait();
        $quantite=$info->getQuantite();
        
        $req = "insert into LigneFraisForfait(idVisiteur,mois,idFraisForfait,quantite) values (:idVisiteur,:mois,:idFraisForfait,:quantite)";
        $monfichier = fopen('compteur.txt', 'r+');
        fputs($monfichier, $req);
        fclose($monfichier);
        //Le try permet de gerer les exceptions si erreur dans le bloc try, alors catch se declenche.
        try{
           $stmt=Dao::$monPdo->prepare($req);
           $stmt->bindParam(':idVisiteur',$idvisiteur);
           $stmt->bindParam(':mois',$mois);
           $stmt->bindParam(':idFraisForfait',$idFraisForfait);
           $stmt->bindParam(':quantite',$quantite);
             $stmt->execute();
         }catch(Exception $e){
             echo "Erreur!".$e->getMessage(); 
         }
        
    }
    
    public function insertFraisHorsForfait($infoHorsForfait){
        
        $idvisiteur=$infoHorsForfait->getIdVisiteur();
        $mois=$infoHorsForfait->getMois();
        $libelle=$infoHorsForfait->getLibelle();
        $dateHorsForfait=$infoHorsForfait->getDate();
        $montantHorsForfait=$infoHorsForfait->getMontant();
        $req = "insert into LigneFraisHorsForfait(idVisiteur,mois,libelle,date,montant) values (:idVisiteur,:mois,:libelle,:date,:montant)";
        //Le try permet de gerer les exceptions si erreur dans le bloc try, alors catch se declenche.
        try{
            $stmt=Dao::$monPdo->prepare($req);
            $stmt->bindParam(':idVisiteur',$idvisiteur);
            $stmt->bindParam(':mois',$mois);
            $stmt->bindParam(':libelle',$libelle);
            $stmt->bindParam(':date',$dateHorsForfait);
            $stmt->bindParam(':montant',$montantHorsForfait);
            $stmt->execute();
        }catch(Exception $e){
            echo "Erreur!".$e->getMessage();
            //Comme ca on evite d'afficher des infos sur la base de donnée
        }
    
    }
    
    public function ficheFrais($ficheFrais){
        
        $idvisiteur=$ficheFrais->getIdVisiteur();
        $mois=$ficheFrais->getMois();
        $nbJustificatif=$ficheFrais->getNbJustificatifs();
        $total=$ficheFrais->getMontantValide();
        $today=$ficheFrais->getDateModif();
        $idEtat=$ficheFrais->getidEtat();
       
        $req = "insert into ficheFrais(idVisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) values (:idVisiteur,:mois,:nbJustificatif,:total,:today,:idEtat)";
        //Le try permet de gerer les exceptions si erreur dans le bloc try, alors catch se declenche.
        try{
            $stmt=Dao::$monPdo->prepare($req);
            $stmt->bindParam(':idVisiteur',$idvisiteur);
            $stmt->bindParam(':mois',$mois);
            $stmt->bindParam(':nbJustificatif',$nbJustificatif);
            $stmt->bindParam(':total',$total);
            $stmt->bindParam(':today',$today);
            $stmt->bindParam(':idEtat',$idEtat);
            $stmt->execute();
        }catch(Exception $e){
            echo "Erreur!".$e->getMessage();
            //Comme ca on evite d'afficher des infos sur la base de donnée
        }
    }
    
    // FIN DES METHODES DE LA PAGE userNew.php
    
    // DEBUT DES METHODES DE LA PAGE userConsult.php
    
    public function afficherdonnees($date,$id,$idFraisForfait){    
            $quantite="";
            $req = "select quantite from ligneFraisForfait where idVisiteur='$id' and mois='$date' and idFraisForfait='$idFraisForfait'";
            $rs = Dao::$monPdo->query($req);
            $info=$rs->fetch();
            $quantite=$info["quantite"];
            
            // $monfichier = fopen('compteur.txt', 'r+');
            // fputs($monfichier, $laLigne);
            // fclose($monfichier);
           
            return $quantite;     
    }
    
    public function infoficheFrais($mois,$id){
        $ficheFrais=null;
        $req = "select * from ficheFrais where mois='$mois' and idVisiteur='$id'";
        $rs = Dao::$monPdo->query($req);
        $laLigne = $rs->fetch();
        if ($laLigne != null)	{
            $idVisiteur= $laLigne['idVisiteur'];
            $moisFicheFrais= $laLigne['mois'];
            $nbJustificatifs=$laLigne['nbJustificatifs'];
            $montantValide= $laLigne['montantValide'];
            $dateModif= $laLigne['dateModif'];
            $idEtat= $laLigne['idEtat'];
            
            $ficheFrais=new ficheFrais($idVisiteur,$moisFicheFrais,$nbJustificatifs,$montantValide,$dateModif,$idEtat);
            
        }
        return $ficheFrais;  
    }
    
    public function infoLigneFraisHorsForfait($mois,$id){
       $liste=array();
        $req = "select * from LigneFraisHorsForfait where mois='$mois' and idVisiteur='$id'";
        $rs = Dao::$monPdo->query($req);
        $laLigne = $rs->fetch();
        while ($laLigne != null){
            $idVisiteur= $laLigne['idVisiteur'];
            $moisHorsForfait= $laLigne['mois'];
            $libelleHorsForfait=$laLigne['libelle'];
            $dateHorsForfait= $laLigne['date'];
            $montantHorsForfait= $laLigne['montant'];
            $ficheHorsForfait=new LigneFraisHorsForfait($idVisiteur,$moisHorsForfait,$libelleHorsForfait,$dateHorsForfait,$montantHorsForfait);
            $liste[]=$ficheHorsForfait;
            $laLigne = $rs->fetch();
        }
        return$liste;   
    }
    
    public function update($tabFraisForfait,$tabFraisHorsForfait,$ficheFrais){
             
                $req1 = "UPDATE ligneFraisForfait SET quantite = :quantite WHERE idVisiteur=:idVisiteur AND mois=:mois AND idFraisForfait=:idFraisForfait";
                $req2 = "UPDATE ligneFraisHorsForfait SET  libelle = :libelle, date = :date , montant = :montant  WHERE idVisiteur=:idVisiteur AND mois=:mois";
                $req3 = "UPDATE ficheFrais SET nbJustificatifs = :nbJustificatifs , montantValide = :montant , idEtat = :etat , dateModif = :today  WHERE idVisiteur=:idVisiteur AND mois=:mois";
                try{
                    Dao::$monPdo->beginTransaction();
                    foreach ($tabFraisForfait as $ligne){
                        $stmt1=Dao::$monPdo->prepare($req1);
                        $idFraisForfait=$ligne->getIdFraisForfait();
                        $idVisiteur=$ligne->getIdVisiteur();
                        $mois=$ligne->getMois();
                        $quantite=$ligne->getQuantite();
                       
                        $stmt1->bindParam(':idVisiteur',$idVisiteur);
                        $stmt1->bindParam(':mois',$mois);
                        $stmt1->bindParam(':idFraisForfait',$idFraisForfait);
                        $stmt1->bindParam(':quantite',$quantite);
                        $stmt1->execute();
                    } 
                    if (!$stmt1->execute())  throw new PDOexception("erreur requte 1");
                    foreach ($tabFraisHorsForfait as $ligne){
                        $stmt2=Dao::$monPdo->prepare($req2);
                        $idVisiteur=$ligne->getIdVisiteur();
                        $mois=$ligne->getMois();
                        $libelle=$ligne->getLibelle();
                        $date=$ligne->getDate();
                        $montant=$ligne->getMontant();
                        echo "/".$idVisiteur." ".$mois." ".$libelle." ".$date." ".$montant."/";
                       
                        $stmt2->bindParam(':idVisiteur',$idVisiteur);
                        $stmt2->bindParam(':mois',$mois);
                        $stmt2->bindParam(':libelle',$libelle);
                        $stmt2->bindParam(':date',$date);
                        $stmt2->bindParam(':montant',$montant);
                        $stmt2->execute();
                    }
                    if (!$stmt2->execute())  throw new PDOexception("erreur requte 2");
                        $stmt3=Dao::$monPdo->prepare($req3);
                        $idVisiteur=$ficheFrais->getIdVisiteur();
                        $mois=$ficheFrais->getMois();
                        $nbJustificatifs=$ficheFrais->getNbJustificatifs();
                        $montant=$ficheFrais->getMontantValide();
                        $today=$ficheFrais->getDateModif();
                        $etat="VA";
                        echo $idVisiteur;
                        echo $montant;
                        $stmt3->bindParam(':idVisiteur',$idVisiteur);
                        $stmt3->bindParam(':mois',$mois);
                        $stmt3->bindParam(':nbJustificatifs',$nbJustificatifs);
                        $stmt3->bindParam(':montant',$montant);
                        $stmt3->bindParam(':today',$today);
                        $stmt3->bindParam(':etat',$etat);
                        $stmt3->execute();
                    if (!$stmt3->execute())  throw new PDOexception("erreur requte 3");
                        Dao::$monPdo->commit();
                    }catch(Exception $e){
                        echo "Erreur!".$e->getMessage();
                    //Comme ca on evite d'afficher des infos sur la base de donnée
                    }
            
            
    }
    
   
    
    
    
    
    
    
}