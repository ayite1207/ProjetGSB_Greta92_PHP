<?php
class Etat
{
    private $id;
    private $libelle; 
    
    public function __construct($libelle,$id){
        $this->libelle=$libelle;
        $this->id=$id;
       
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
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
    /**
     * @param mixed $id
     */
    public function setid($id)
    {
        $this->id = $id;
    }
    
    
    
}
