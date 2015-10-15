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
        $sql = "SELECT * FROM etablissement";
        try {
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
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
            $sql = "SELECT * FROM etablissement WHERE id = ?";
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
        return FALSE;
    }
    
    public static function update($idMetier, $objetMetier) {
        return FALSE;
    }

    public static function delete($idMetier) {
        
    }
    
    
}
