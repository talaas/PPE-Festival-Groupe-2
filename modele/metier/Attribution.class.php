<?php
namespace modele\metier;
use modele\metier\Attribution;

class Attribution {
    
    //Declaration des variables de la class
    
    private $idEtab;
    private $idTypeChambre;
    private $idGroupe;
    private $nombreChambres;
    
    //Constructeur de la Class
    
    function __construct($idEtab, $idTypeChambre, $idGroupe, $nombreChambres) {
        $this->idEtab = $idEtab;
        $this->idTypeChambre = $idTypeChambre;
        $this->idGroupe = $idGroupe;
        $this->nombreChambres = $nombreChambres;
    }
    
    
    //Accesseurs
    
    
    function getIdEtab() {
        return $this->idEtab;
    }

    function getIdTypeChambre() {
        return $this->idTypeChambre;
    }

    function getIdGroupe() {
        return $this->idGroupe;
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

    function setIdGroupe($idGroupe) {
        $this->idGroupe = $idGroupe;
    }

    function setNombreChambres($nombreChambres) {
        $this->nombreChambres = $nombreChambres;
    }


    //Fonction ToString pour voir l'etat de l'objet.
    
    public function __toString() {
        $etat = "objet de type :".get_class($this);
        $etat .= "- idEtab :".$this->getIdEtab();
        $etat .= "- IdTypeChambre".$this->getIdTypeChambre();
        $etat .= "- IdGroupe".$this->getIdGroupe();
        $etat .= "- NombreChambres".$this->getNombreChambres();
        return $etat;
    }

}

