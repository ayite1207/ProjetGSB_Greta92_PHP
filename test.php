<?php
require ('modele/Visiteur.php');
require ('modele/Etat.php');
require ('modele/fichefrais.php');
require ('modele/FraisForfait.php');
require ('modele/ligneFraisForfait.php');
require ('modele/ligneFraisHorsForfait.php');
require ('controller/Dao.php');

$mdp="jux7g";
$login="lvillachane";


$LigneFraisHorsForfait=new LigneFraisHorsForfait("c55","juin","chaussure","2010-02-02","11");


//foreach ($visiteur as $visiteur){
echo "rue : ".$LigneFraisHorsForfait->getIdVisiteur()."</br>";
echo "nom : ".$LigneFraisHorsForfait->getMois()."</br>";
echo "rue : ".$LigneFraisHorsForfait->getLibelle()."</br>";
echo "nom : ".$LigneFraisHorsForfait->getDate()."</br>";
echo "nom : ".$LigneFraisHorsForfait->getMontant()."</br>";
    

    
//}

