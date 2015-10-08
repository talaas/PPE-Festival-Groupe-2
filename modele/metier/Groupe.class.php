<?php

Class Groupe{
    
    //Declaration des variables de la class
    
    
    private $id;
    private $nom;
    private $identiteResponsable;
    private $adressePostale;
    private $nombrePersonnes;
    private $nomPays;
    private $hebergement;
    
    
     //Constructeur de la Class
    
    function __construct($id, $nom, $identiteResponsable, $adressePostale, $nombrePersonnes, $nomPays, $hebergement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->identiteResponsable = $identiteResponsable;
        $this->adressePostale = $adressePostale;
        $this->nombrePersonnes = $nombrePersonnes;
        $this->nomPays = $nomPays;
        $this->hebergement = $hebergement;
    }

    
    //Accesseurs
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getIdentiteResponsable() {
        return $this->identiteResponsable;
    }

    function getAdressePostale() {
        return $this->adressePostale;
    }

    function getNombrePersonnes() {
        return $this->nombrePersonnes;
    }

    function getNomPays() {
        return $this->nomPays;
    }

    function getHebergement() {
        return $this->hebergement;
    }

    
    //Mutateurs
    
    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setIdentiteResponsable($identiteResponsable) {
        $this->identiteResponsable = $identiteResponsable;
    }

    function setAdressePostale($adressePostale) {
        $this->adressePostale = $adressePostale;
    }

    function setNombrePersonnes($nombrePersonnes) {
        $this->nombrePersonnes = $nombrePersonnes;
    }

    function setNomPays($nomPays) {
        $this->nomPays = $nomPays;
    }

    function setHebergement($hebergement) {
        $this->hebergement = $hebergement;
    }

    
    //Fonction ToString pour voir l'etat de l'objet.
    
    public function __toString() {
        
        $etat = "objet de type :".get_class($this);
        $etat .= "- Id :".$this->getId();
        $etat .= "- Nom :".$this->getNom();
        $etat .= "- IdentiteResponsable :".$this->getIdentiteResponsable();
        $etat .= "- AdressePostale :".$this->getAdressePostale();
        $etat .= "- NombrePersonnes :".$this->getNombrePersonnes();
        $etat .= "- NomPays :".$this->getNomPays();
        $etat .= "- Hebergement :".$this->getHebergement();
        
        return $etat;
        
    }

    
}

?>
