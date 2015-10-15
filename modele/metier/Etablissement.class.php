<?php


namespace modele\metier;
<<<<<<< HEAD
use modele\metier\Etablissement;
=======
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53

Class Etablissement{
    
    //Declaration des variables de la class
    
    private $id;
    private $nom;
    private $adresseRue;
    private $codePostal;
    private $ville;
    private $tel;
    private $adresseElectronique;
    private $type;
    private $civiliteResponsable;
    private $nomResponsable;
    private $prenomResponsable;
    
    
     //Constructeur de la Class
    
    
    function __construct($id, $nom, $adresseRue, $codePostal, $ville, $tel, $adresseElectronique, $type, $civiliteResponsable, $nomResponsable, $prenomResponsable) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresseRue = $adresseRue;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->adresseElectronique = $adresseElectronique;
        $this->type = $type;
        $this->civiliteResponsable = $civiliteResponsable;
        $this->nomResponsable = $nomResponsable;
        $this->prenomResponsable = $prenomResponsable;
    }

    
    
    //Accesseurs
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdresseRue() {
        return $this->adresseRue;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getVille() {
        return $this->ville;
    }

    function getTel() {
        return $this->tel;
    }

    function getAdresseElectronique() {
        return $this->adresseElectronique;
    }

    function getType() {
        return $this->type;
    }

    function getCiviliteResponsable() {
        return $this->civiliteResponsable;
    }

    function getNomResponsable() {
        return $this->nomResponsable;
    }

    function getPrenomResponsable() {
        return $this->prenomResponsable;
    }
    
    
    //Mutateurs

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setAdresseRue($adresseRue) {
        $this->adresseRue = $adresseRue;
    }

    function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setAdresseElectronique($adresseElectronique) {
        $this->adresseElectronique = $adresseElectronique;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setCiviliteResponsable($civiliteResponsable) {
        $this->civiliteResponsable = $civiliteResponsable;
    }

    function setNomResponsable($nomResponsable) {
        $this->nomResponsable = $nomResponsable;
    }

    function setPrenomResponsable($prenomResponsable) {
        $this->prenomResponsable = $prenomResponsable;
    }

    
    //Fonction ToString pour voir l'etat de l'objet.
    
    public function __toString() {
<<<<<<< HEAD
        $etat = "objet de type :".get_class($this);
        $etat .= "- Id :".$this->getId();
=======
        $etat = "- Id :".$this->getId();
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53
        $etat .= "- Nom :".$this->getNom();
        $etat .= "- AdresseRue :".$this->getAdresseRue();
        $etat .= "- CodePostal :".$this->getCodePostal();
        $etat .= "- Ville :".$this->getVille();
        $etat .= "- Tel :".$this->getTel();
        $etat .= "- AdresseElectronique :".$this->getAdresseElectronique();
        $etat .= "- Type :".$this->getType();
        $etat .= "- CiviliteResponsable :".$this->getCiviliteResponsable();
        $etat .= "- NomResponsable :".$this->getNomResponsable();
        $etat .= "- PrenomResponsable :".$this->getPrenomResponsable();
        return $etat;
    }

}


?>