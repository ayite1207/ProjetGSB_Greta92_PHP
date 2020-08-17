<?php
class FicheFrais
{
    private $idVisiteur;
    private $mois;
    private $nbJustificatifs;
    private $montantValide;
    private $dateModif;
    private $idEtat; 
    
    public function __construct($idVisiteur,$mois,$nbJustificatifs,$montantValide,$dateModif,$idEtat){
        $this->idVisiteur=$idVisiteur;
        $this->mois=$mois;
        $this->nbJustificatifs=$nbJustificatifs;
        $this->montantValide=$montantValide;
        $this->dateModif=$dateModif;
        $this->idEtat=$idEtat;
    }
    /**
     * @return mixed
     */
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }
    /**
     * @return mixed
     */
    public function getMois()
    {
        return $this->mois;
    }
    
    /**
     * @return mixed
     */
    public function getNbJustificatifs()
    {
        return $this->nbJustificatifs;
    }
    
    /**
     * @return mixed
     */
    public function getMontantValide()
    {
        return $this->montantValide;
    }
    
    /**
     * @return mixed
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }
    /**
     * @return mixed
     */
    public function getidEtat()
    {
        return $this->idEtat;
    }
   
    /**
     * @param mixed $idVisiteur
     */
    public function setIdVisiteur($idVisiteur)
    {
        $this->idVisiteur = $idVisiteur;
    }
    /**
     * @param mixed $mois
     */
    public function setMois($mois)
    {
        $this->mois = $mois;
    }
    
    /**
     * @param mixed $nbJustificatifs
     */
    public function setNbJustificatifs($nbJustificatifs)
    {
        $this->nbJustificatifs = $nbJustificatifs;
    }
    
    /**
     * @param mixed $montantValide
     */
    public function setMontantValide($montantValide)
    {
        $this->montantValide = $montantValide;
    }
    
    /**
     * @param mixed $dateModif
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;
    }
    /**
     * @param mixed $idEtat
     */
    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }
    
}
