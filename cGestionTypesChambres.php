<?php

include("_gestionErreurs.inc.php");
include("gestionDonnees/_connexion.inc.php");
include("gestionDonnees/_gestionBaseFonctionsCommunes.inc.php");

// 1ère étape (donc pas d'action choisie) : affichage de l'ensemble des types 
// de chambres
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'initial';
}

$action = $_REQUEST['action'];

// Aiguillage selon l'étape
switch ($action) {
    case 'initial':
        include("vues/GestionTypesChambres/vObtenirTypesChambres.php");
        break;

    case 'demanderSupprimerTypeChambre':
        $id = $_REQUEST['id'];
        include("vues/GestionTypesChambres/vSupprimerTypeChambre.php");
        break;

    case 'demanderCreerTypeChambre':
        include("vues/GestionTypesChambres/vCreerModifierTypeChambre.php");
        break;

    case 'demanderModifierTypeChambre':
        $id = $_REQUEST['id'];
        include("vues/GestionTypesChambres/vCreerModifierTypeChambre.php");
        break;

    case 'validerSupprimerTypeChambre':
        $id = $_REQUEST['id'];
        supprimerTypeChambre($connexion, $id);
        include("vues/GestionTypesChambres/vObtenirTypesChambres.php");
        break;

    case 'validerCreerTypeChambre':
        $id = $_REQUEST['id'];
        $libelle = $_REQUEST['libelle'];
        verifierDonneesTypeChambreC($connexion, $id, $libelle);
        if (nbErreurs() == 0) {
            creerModifierTypeChambre($connexion, 'C', $id, $libelle);
            include("vues/GestionTypesChambres/vObtenirTypesChambres.php");
        } else {
            include("vues/GestionTypesChambres/vCreerModifierTypeChambre.php");
        }
        break;

    case 'validerModifierTypeChambre':
        $id = $_REQUEST['id'];
        $libelle = $_REQUEST['libelle'];
        verifierDonneesTypeChambreM($connexion, $id, $libelle);
        if (nbErreurs() == 0) {
            creerModifierTypeChambre($connexion, 'M', $id, $libelle);
            include("vues/GestionTypesChambres/vObtenirTypesChambres.php");
        } else {
            include("vues/GestionTypesChambres/vCreerModifierTypeChambre.php");
        }
        break;
}

// Fermeture de la connexion au serveur MySql
$connexion = null;

function verifierDonneesTypeChambreC($connexion, $id, $libelle) {
    if ($id == "" || $libelle == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($id != "") {
        // Si l'id est constitué d'autres caractères que de lettres non accentuées 
        // et de chiffres, une erreur est générée
        if (!estChiffresOuEtLettres($id)) {
            ajouterErreur
                    ("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
        } else {
            if (estUnIdTypeChambre($connexion, $id)) {
                ajouterErreur("Le type de chambre $id existe déjà");
            }
        }
    }
    if ($libelle != "" && estUnLibelleTypeChambre($connexion, 'C', $id, $libelle)) {
        ajouterErreur("Le type de chambre $libelle existe déjà");
    }
}

function verifierDonneesTypeChambreM($connexion, $id, $libelle) {
    if ($libelle == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($libelle != "" && estUnLibelleTypeChambre($connexion, 'M', $id, $libelle)) {
        ajouterErreur("Le type de chambre $libelle existe déjà");
    }
}


