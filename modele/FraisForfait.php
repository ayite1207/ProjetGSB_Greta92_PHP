<?php
class FraisForfait
{
    private $id;
    private $libelle;
    private $montant;
    
    public function __construct($libelle,$montant){
        $this->libelle=$libelle;
        $this->montant=$montant;
        
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
    public function getMontant()
    {
        return $this->montant;
    }
    
    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->id = $libelle;
    }
    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->id = $montant;
    }
    
    
    
}
