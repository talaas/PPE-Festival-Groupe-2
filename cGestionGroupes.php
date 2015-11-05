<?php

include("_gestionErreurs.inc.php");
include("gestionDonnees/_connexion.inc.php");
include("gestionDonnees/_gestionBaseFonctionsCommunes.inc.php");

// 1ère étape (donc pas d'action choisie) : affichage du tableau des 
// Groupes
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'initial';
}

$action = $_REQUEST['action'];

// Aiguillage selon l'étape
switch ($action) {
    case 'initial' :
        include("vues/GestionGroupes/vObtenirGroupe.php");
        break;

    case 'detailGroupe':
        $id = $_REQUEST['id'];
        include("vues/GestionGroupes/vObtenirDetailGroupe.php");
        break;

    case 'demanderSupprimerGroupe':
        $id = $_REQUEST['id'];
        include("vues/GestionGroupes/vSupprimerGroupe.php");
        break;

    case 'demanderCreerGroupe':
        include("vues/GestionGroupes/vCreerModifierGroupe.php");
        break;

    case 'demanderModifierGroupe':
        $id = $_REQUEST['id'];
        include("vues/GestionGroupes/vCreerModifierGroupe.php");
        break;

    case 'validerSupprimerGroupe':
        $id = $_REQUEST['id'];
        supprimerEtablissement($connexion, $id);
        include("vues/GestionGroupes/vObtenirGroupe.php");
        break;

    case 'validerCreerGroupe':case 'validerModifierGroupe':
        $id = $_REQUEST['id'];
        $nom = $_REQUEST['nom'];
        $adresseRue = $_REQUEST['adresseRue'];
        $codePostal = $_REQUEST['codePostal'];
        $ville = $_REQUEST['ville'];
        $tel = $_REQUEST['tel'];
        $adresseElectronique = $_REQUEST['adresseElectronique'];
        $type = $_REQUEST['type'];
        $civiliteResponsable = $_REQUEST['civiliteResponsable'];
        $nomResponsable = $_REQUEST['nomResponsable'];
        $prenomResponsable = $_REQUEST['prenomResponsable'];

        if ($action == 'validerCreerGroupe') {
            verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable);
            if (nbErreurs() == 0) {
                creerModifierEtablissement($connexion, 'C', $id, $nom, $adresseRue, $codePostal, $ville, $tel, $adresseElectronique, $type, $civiliteResponsable, $nomResponsable, $prenomResponsable);
                include("vues/GestionGroupes/vObtenirGroupe.php");
            } else {
                include("vues/GestionGroupes/vCreerModifierGroupe.php");
            }
        } else {
            verifierDonneesEtabM($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable);
            if (nbErreurs() == 0) {
                creerModifierEtablissement($connexion, 'M', $id, $nom, $adresseRue, $codePostal, $ville, $tel, $adresseElectronique, $type, $civiliteResponsable, $nomResponsable, $prenomResponsable);
                include("vues/GestionGroupes/vObtenirGroupe.php");
            } else {
                include("vues/GestionGroupes/vCreerModifierGroupe.php");
            }
        }
        break;
}

// Fermeture de la connexion au serveur MySql
$connexion = null;

function verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable) {
    if ($id == "" || $nom == "" || $adresseRue == "" || $codePostal == "" ||
            $ville == "" || $tel == "" || $nomResponsable == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($id != "") {
        // Si l'id est constitué d'autres caractères que de lettres non accentuées 
        // et de chiffres, une erreur est générée
        if (!estChiffresOuEtLettres($id)) {
            ajouterErreur
                    ("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
        } else {
            if (estUnIdEtablissement($connexion, $id)) {
                ajouterErreur("L'établissement $id existe déjà");
            }
        }
    }
    if ($nom != "" && estUnNomEtablissement($connexion, 'C', $id, $nom)) {
        ajouterErreur("L'établissement $nom existe déjà");
    }
    if ($codePostal != "" && !estUnCp($codePostal)) {
        ajouterErreur('Le code postal doit comporter 5 chiffres');
    }
}

function verifierDonneesEtabM($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable) {
    if ($nom == "" || $adresseRue == "" || $codePostal == "" || $ville == "" ||
            $tel == "" || $nomResponsable == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($nom != "" && estUnNomEtablissement($connexion, 'M', $id, $nom)) {
        ajouterErreur("L'établissement $nom existe déjà");
    }
    if ($codePostal != "" && !estUnCp($codePostal)) {
        ajouterErreur('Le code postal doit comporter 5 chiffres');
    }
}

function estUnCp($codePostal) {
    // Le code postal doit comporter 5 chiffres
    return strlen($codePostal) == 5 && estEntier($codePostal);
}
