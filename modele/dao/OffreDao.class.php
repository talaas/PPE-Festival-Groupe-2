<?php
namespace modele\dao;
use modele\metier\Offre;
use modele\Connexion;
use \PDO;
use modele\dao\DAO;

class OffreDao implements Dao {
        
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new Offre($unEnregistrement['idEtab'], $unEnregistrement['idTypeChambre'], $unEnregistrement['nombreChambres']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':idEtab' => $objetMetier->getIdEtab(),
            ':idTypeChambre' => $objetMetier->getIdTypeChambre(),
            ':nombreChambres' => $objetMetier->getNombreChambres()
        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM Offre";
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
            $sql = "SELECT * FROM Offre WHERE idEtab = ?";
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