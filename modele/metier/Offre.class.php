<?php

namespace modele\metier;
<<<<<<< HEAD
use modele\metier\Offre;
=======
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53

Class Offre{
    
    //Declaration des variables de la class
    
    
    private $idEtab;
    private $idTypeChambre;
    private $nombreChambres;
    
    
     //Constructeur de la Class
    
    function __construct($idEtab, $idTypeChambre, $nombreChambres) {
        $this->idEtab = $idEtab;
        $this->idTypeChambre = $idTypeChambre;
        $this->nombreChambres = $nombreChambres;
    }
    
    
    //Accesseurs
    
    function getIdEtab() {
        return $this->idEtab;
    }

    function getIdTypeChambre() {
        return $this->idTypeChambre;
    }

    function getNombreChambres() {
        return $this->nombreChambres;
    }
    
    
    //Mutateurs
    

    function setIdEtab($idEtab) {
        $this->idEtab = $idEtab;
    }

    function setIdTypeChambre($idTypeChambre) {
        $this->idTypeChambre = $idTypeChambre;
    }

    function setNombreChambres($nombreChambres) {
        $this->nombreChambres = $nombreChambres;
    }

    
    //Fonction ToString pour voir l'etat de l'objet.
    
    public function __toString() {
<<<<<<< HEAD
        $etat = "objet de type :".get_class($this);
        $etat .= "- idEtab :".$this->getIdEtab();
=======
        $etat = "- idEtab :".$this->getIdEtab();
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53
        $etat .= "- IdTypeChambre :".$this->getIdTypeChambre();
        $etat .= "- NombreChambres :".$this->getNombreChambres();
        return $etat;
    }

    
}

?>

