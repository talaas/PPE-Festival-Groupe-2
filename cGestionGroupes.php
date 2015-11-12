<?php
use modele\Connexion;
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
        $id = $lgGroupe ['id'];
        $nom = $lgGroupe['nom'];
        $identiteResponsable = $lgGroupe['identiteResponsable'];
        $adressePostale = $lgGroupe['adressePostale'];
        $nombrePersonnes= $lgGroupe['nombrePersonnes'];
        $nomPays = $lgGroupe['nomPays'];
        $hebergement = $lgGroupe['hebergement'];

        if ($action == 'validerCreerGroupe') {
            verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, $tel, $nomResponsable);
            if (nbErreurs() == 0) {
                creerModifierGroupe($connexion, 'C', $id, $nom, $adresseRue, $codePostal,$nomResponsable);
                include("vues/GestionGroupes/vObtenirGroupe.php");
            } else {
                include("vues/GestionGroupes/vCreerModifierGroupe.php");
            }
        } else {
            verifierDonneesEtabM($connexion, $id, $nom, $adresseRue, $codePostal, $nomResponsable);
            if (nbErreurs() == 0) {
                creerModifierGroupe($connexion, 'M', $id, $nom, $adresseRue, $codePostal, $nomResponsable);
                include("vues/GestionGroupes/vObtenirGroupe.php");
            } else {
                include("vues/GestionGroupes/vCreerModifierGroupe.php");
            }
        }
        break;
}

// Fermeture de la connexion au serveur MySql
$connexion = null;

function verifierDonneesGroupeC($connexion, $id, $nom, $adresseRue, $codePostal, $nomResponsable) {
    if ($id == "" || $nom == "" || $adresseRue == "" || $codePostal == "" || $nomResponsable == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($id != "") {
        // Si l'id est constitué d'autres caractères que de lettres non accentuées 
        // et de chiffres, une erreur est générée
        if (!estChiffresOuEtLettres($id)) {
            ajouterErreur
                    ("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
        } else {
            if (estUnIdGroupe($connexion, $id)) {
                ajouterErreur("Le Groupe $id existe déjà");
            }
        }
    }
    if ($nom != "" && estUnNomGroupe($connexion, 'C', $id, $nom)) {
        ajouterErreur("Le Groupe $nom existe déjà");
    }
    if ($codePostal != "" && !estUnCp($codePostal)) {
        ajouterErreur('Le code postal doit comporter 5 chiffres');
    }
}

function verifierDonneesGroupebM($connexion, $id, $nom, $adresseRue, $codePostal, $nomResponsable) {
    if ($nom == "" || $adresseRue == "" || $codePostal == "" || $nomResponsable == "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($nom != "" && estUnNomGroupe($connexion, 'M', $id, $nom)) {
        ajouterErreur("Le Groupe $nom existe déjà");
    }
    if ($codePostal != "" && !estUnCp($codePostal)) {
        ajouterErreur('Le code postal doit comporter 5 chiffres');
    }
}

function estUnCp($codePostal) {
    // Le code postal doit comporter 5 chiffres
    return strlen($codePostal) == 5 && estEntier($codePostal);
}
