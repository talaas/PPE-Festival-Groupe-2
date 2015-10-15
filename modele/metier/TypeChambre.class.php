<?php

namespace modele\metier;
<<<<<<< HEAD
use modele\metier\TypeChambre;
=======
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53


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
<<<<<<< HEAD
        $etat = "objet de type :".get_class($this);
        $etat .= "- Id :".$this->getId();
=======
        $etat = "- Id :".$this->getId();
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53
        $etat .= "- Libelle :".$this->getLibelle();
        return $etat;
    }

    
}

?>