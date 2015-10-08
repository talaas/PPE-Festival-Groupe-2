<?php

namespace modele\dao;
use modele\metier\Attribution;
use modele\Connexion;
use \PDO;

class Attribution implements Dao  {
    //put your code here

       
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new Groupe($unEnregistrement['attribution_idEtab'], $unEnregistrement['attribution_idTypeChambre'], $unEnregistrement['attribution_idGroupe'],$unEnregistrement['attribution_nombreChambres']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':idEtab' => $objetMetier->getIdEtab(),
            ':idTypeChambre' => $objetMetier->getIdTypeChambre(),
            ':idGroupe' => $objetMetier->getIdGroupe(),
            ':nombreChambres' => $objetMetier->getNombreChambre()
            

        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM Attribution";
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
        
    }
    
    public static function getOneByIdCompo($idEtablissement, $idTypeChambre, $idGroupe){
        $retour = null;
        $valeursClePrimaire = array($idEtablissement, $idTypeChambre, $idGroupe);
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "SELECT * FROM attribution WHERE idEtab = ? AND idTypeChambre = ? AND idGroupe = ?";
            // préparer la requête PDO
            $queryPrepare = Connexion::getPdo()->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute($valeursClePrimaire)) {
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
    
    function existeAttributionsEtab($connexion, $id) {
        $req = "SELECT COUNT(*) FROM Attribution WHERE idEtab=?";
        $stmt = $connexion->prepare($req);
        $stmt->execute(array($id));
        return $stmt->fetchColumn();
    }

// Teste la présence d'attributions pour le type de chambre transmis 
    function existeAttributionsTypeChambre($connexion, $id) {
        $req = "SELECT COUNT(*) FROM Attribution WHERE idTypeChambre=?";
        $stmt = $connexion->prepare($req);
        $stmt->execute(array($id));
        return $stmt->fetchColumn();
    }
    
}

