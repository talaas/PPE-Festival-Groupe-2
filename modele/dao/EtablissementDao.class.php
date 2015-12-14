<?php

namespace modele\dao;
use modele\metier\Etablissement;
use modele\Connexion;
use \PDO;
use modele\dao\DAO;

class EtablissementDao implements Dao  {
    //put your code here

       
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new Etablissement ($unEnregistrement['id'], $unEnregistrement['nom'], $unEnregistrement['adresseRue'],$unEnregistrement['codePostal'], $unEnregistrement['ville'], $unEnregistrement['tel'], $unEnregistrement['adresseElectronique'], $unEnregistrement['type'], $unEnregistrement['civiliteResponsable'],$unEnregistrement['nomResponsable'], $unEnregistrement['prenomResponsable']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':id' => $objetMetier->getId(),
            ':nom' => $objetMetier->getNom(),
            ':adresseRue' => $objetMetier->getAdresseRue(),
            ':codePostal' => $objetMetier->getCodePostal(),
            ':ville' => $objetMetier->getVille(),
            ':tel' => $objetMetier->getTel(),
            ':adresseElectronique' => $objetMetier->getAdresseElectronique(),
            ':type' => $objetMetier->getType(),
            ':civiliteResponsable' => $objetMetier->getCiviliteResponsable(),
            ':civilitenomResponsable' => $objetMetier->getNomResponsable(),
            ':civilitePrenomResponsable' => $objetMetier->getPrenomResponsable()

        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM Etablissement";
        try {
            // préparer la requête PDO
            $queryPrepare = Connexion:: getPdo()->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute()) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = self::enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public static function getOneById($valeurClePrimaire) {
        $retour = null;
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "SELECT * FROM Etablissement WHERE id = ?";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array($valeurClePrimaire))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = self::enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }


   public static function insert($objetMetier) {
        try {
            $objetRef = self::objetVersEnregistrement($objetMetier);
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "INSERT INTO Etablissement (id, nom, adresseRue, codePostal, ville, tel, adresseElectronique, type, civiliteResponsable, nomResponsable, prenomResponsable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $queryPrepare->execute($objetRef);
            $retour = "INSERT Réussi !";
        } catch (PDOException $e) {
            echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }
    
    public static function update($idMetier, $objetMetier) {
        try {
            $objetRef = self::objetVersEnregistrement($objetMetier);
            
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "UPDATE Etablissement SET id = ?, nom = ?, adresseRue = ?, codePostal = ?, ville = ?, tel = ?, adresseElectronique = ?, type = ?, civiliteResponsable = ?, nomResponsable = ?, prenomResponsable = ? WHERE id=".$idMetier;
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres dans un tableau
            $queryPrepare->execute($objetRef);
            $retour = "UPDATE Réussi !";
        } catch (PDOException $e) {
            echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }

    public static function delete($idMetier) {
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "DELETE FROM Etablissement WHERE id = ?";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici)
            if ($queryPrepare->execute(array($idMetier))) {
                // si la requête réussit :
                $retour = "DELETE Réussi";
            }
        } catch (PDOException $e) {
            echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        
        return $retour;
    }
    
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

}
