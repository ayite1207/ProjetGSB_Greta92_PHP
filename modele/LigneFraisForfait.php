<?php
class LigneFraisForfait
{
    private $idVisiteur;
    private $mois;
    private $idFraisForfait;
    private $quantite;
    
    public function __construct($idVisiteur,$mois,$idFraisForfait,$quantite){
        $this->idVisiteur=$idVisiteur;
        $this->mois=$mois;
        $this->idFraisForfait=$idFraisForfait;
        $this->quantite=$quantite;
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
    public function getIdFraisForfait()
    {
        return $this->idFraisForfait;
    }
    
    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
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
     * @param mixed $idFraisForfait
     */
    public function setIdFraisForfait($idFraisForfait)
    {
        $this->idFraisForfait = $idFraisForfait;
    }
    
    /**
     * @param mixed $quantite
     */
    public function setQuantitef($quantite)
    {
        $this->quantite = $quantite;
    }
    
}
