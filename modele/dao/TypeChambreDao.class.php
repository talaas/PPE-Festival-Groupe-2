<?php

namespace modele\dao;
use modele\metier\TypeChambre;
use modele\Connexion;
use \PDO;

class TypeChambreDao implements Dao  {
    //put your code here

       
    public static function enregistrementVersObjet($unEnregistrement) {
        $retour = new Groupe($unEnregistrement['typeChambre_id'], $unEnregistrement['typeChambre_libelle']);
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':id' => $objetMetier->getId(),
            ':libelle' => $objetMetier->getLibelle()
            
        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM typechambre";
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
            $sql = "SELECT * FROM typechambre WHERE typechambre_id = ?";
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
    
    function obtenirTypesChambres($connexion) {
    $req = "SELECT * FROM TypeChambre";
    $stmt = $connexion->prepare($req);
    $stmt->execute();
    return $stmt;
}

function obtenirIdTypesChambres($connexion) {
    $req = "SELECT id FROM TypeChambre";
    $stmt = $connexion->prepare($req);
    $stmt->execute();
    return $stmt;
}

function obtenirLibelleTypesChambres($connexion) {
    $req = "SELECT libelle FROM TypeChambre ORDER BY id";
    $stmt = $connexion->prepare($req);
    $stmt->execute();
    return $stmt;
}

function obtenirLibelleTypeChambre($connexion, $id) {
    $req = "SELECT libelle FROM TypeChambre WHERE id = ?";
    $stmt = $connexion->prepare($req);
    $stmt->execute(array($id));
    return $stmt->fetchColumn();
}

function obtenirNbTypesChambres($connexion) {
    $req = "SELECT count(*) FROM TypeChambre";
    $stmt = $connexion->prepare($req);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function supprimerTypeChambre($connexion, $id) {
    $req = "DELETE FROM TypeChambre WHERE id=?";
    $stmt = $connexion->prepare($req);
    $ok = $stmt->execute(array($id));
    return $ok;
}

function obtenirDetailTypeChambre($connexion, $id) {
    $req = "SELECT * FROM TypeChambre WHERE id=?";
    $stmt = $connexion->prepare($req);
    $stmt->execute(array($id));
    return $stmt;
}

function creerModifierTypeChambre($connexion, $mode, $id, $libelle) {
    $libelle = str_replace("'", "''", $libelle);
    if ($mode == 'C') {
        $req = "INSERT INTO TypeChambre VALUES (:id, :lib)";
    } else {
        $req = "UPDATE TypeChambre SET libelle=:lib WHERE id=:id";
    }
    $stmt = $connexion->prepare($req);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':lib', $libelle);
    $ok = $stmt->execute();
    return $ok;
}

function estUnIdTypeChambre($connexion, $id) {
    $req = "SELECT COUNT(*) FROM TypeChambre WHERE id=?";
    $stmt = $connexion->prepare($req);
    $stmt->execute(array($id));
    return $stmt->fetchColumn();
}

function estUnLibelleTypeChambre($connexion, $mode, $id, $libelle) {
    $libelle = str_replace("'", "''", $libelle);
    // S'il s'agit d'une création, on vérifie juste la non existence du libellé
    // sinon on vérifie la non existence d'un autre type chambre (id!='$id') 
    // ayant le même libelle
    if ($mode == 'C') {
        $req = "SELECT COUNT(*) FROM TypeChambre WHERE libelle=:lib";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':lib', $libelle);
    } else {
        $req = "SELECT COUNT(*) FROM TypeChambre WHERE libelle=:lib and id <> :id";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':lib', $libelle);
        $stmt->bindParam(':id', $id);
    }
    $stmt->execute();
    return $stmt->fetchColumn();
    }
}