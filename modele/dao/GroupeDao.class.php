<?php

namespace modele\dao;
use modele\metier\Categorie;
use modele\Connexion;
use \PDO;

class GroupeDao {
    //put your code here

       
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new Groupe($unEnregistrement['groupe_id'], $unEnregistrement['groupe_nom'], $unEnregistrement['groupe_identiteResponsable'], $unEnregistrement['groupe_adressePostale'], $unEnregistrement['groupe_nomPays'], $unEnregistrement['groupe_hebergement']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':id' => $objetMetier->getId(),
            ':nom' => $objetMetier->getNom(),
            ':identiteResponsable' => $objetMetier->getIdentiteResponsable(),
            ':adressePostale' => $objetMetier->getAdressePostale(),
            ':nombrePersonnes' => $objetMetier->getNombrePersonnes(),
            ':nomPays' => $objetMetier->getNomPays(),
            ':hebergement' => $objetMetier->getHebergement(),
        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM groupe";
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
            $sql = "SELECT * FROM categorie WHERE groupe_id = ?";
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
    
    function obtenirIdNomGroupesAHeberger($connexion) {
        $req = "SELECT id, nom FROM Groupe WHERE hebergement='O' ORDER BY id";
        $stmt = $connexion->prepare($req);
        $stmt->execute();
            return $stmt;
    }

    function obtenirNomGroupe($connexion, $id) {
        $req = "SELECT nom FROM Groupe WHERE id=?";
        $stmt = $connexion->prepare($req);
        $stmt->execute(array($id));
            return $stmt->fetchColumn();
    }
}
