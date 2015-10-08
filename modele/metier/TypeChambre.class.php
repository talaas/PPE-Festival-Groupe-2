<?php

Class TypeChambre{
    
    
    //Declaration des variables de la class
    
    
    private $id;
    private $libelle;
    
    
     //Constructeur de la Class
    
    function __construct($id, $libelle) {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    //Accesseurs
    
    function getId() {
        return $this->id;
    }

    function getLibelle() {
        return $this->libelle;
    }

    //Mutateurs
    
    function setId($id) {
        $this->id = $id;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    
    //Fonction ToString pour voir l'etat de l'objet.
    
    public function __toString() {
        $etat = "objet de type :".get_class($this);
        $etat .= "- Id :".$this->getId();
        $etat .= "- Libelle :".$this->getLibelle();
        return $etat;
    }

    
}

?>