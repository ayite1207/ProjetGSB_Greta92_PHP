<?php
class LigneFraisHorsForfait
{
    private $id;
    private $idVisiteur;
    private $mois;
    private $libelle;
    private $date;
    private $montant;
    
    public function __construct($idVisiteur,$mois,$libelle,$date,$montant){
        $this->idVisiteur=$idVisiteur;
        $this->mois=$mois;
        $this->libelle=$libelle;
        $this->date=$date;
        $this->montant=$montant;
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
    public function getLibelle()
    {
        return $this->libelle;
    }
    
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
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
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
    
    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    
}
