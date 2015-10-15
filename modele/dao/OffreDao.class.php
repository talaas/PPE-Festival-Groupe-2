<?php

namespace modele\dao;
use modele\metier\Offre;
use modele\Connexion;
use \PDO;
<<<<<<< HEAD
use modele\dao\DAO;
=======
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53

class OffreDao implements Dao  {
    //put your code here

       
    public static function enregistrementVersObjet($unEnregistrement) {
<<<<<<< HEAD
        $retour = new Offre($unEnregistrement['ofrre_idEtab'], $unEnregistrement['offre_idTypeChambre'], $unEnregistrement['offre_nombreChambre']);
=======
        $retour = new Groupe($unEnregistrement['ofrre_idEtab'], $unEnregistrement['offre_idTypeChambre'], $unEnregistrement['offre_nombreChambre']);
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53
        return $retour;        
    }

    public static function objetVersEnregistrement($objetMetier) {
        $retour = array(
            ':idEtab' => $objetMetier->getIdEtab(),
            ':idTypeChambre' => $objetMetier->getIdTypeChambre(),
            ':nombreChambre' => $objetMetier->getNombreChambre()
        );
        return $retour;
    }
    
    public static function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM offre";
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
    
    public static function getOneByIdCompo($idEtablissement, $idTypeChambre){
        $retour = null;
        $valeursClePrimaire = array($idEtablissement, $idTypeChambre);
        try {
            // Requête textuelle paramétrée (le paramètre est symbolisé par un ?)
            $sql = "SELECT * FROM offre WHERE idEtab = ? AND idTypeChambre = ?";
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
    // Met à jour (suppression, modification ou ajout) l'offre correspondant à l'id
// étab et à l'id type chambre transmis
function modifierOffreHebergement($connexion, $idEtab, $idTypeChambre, $nbChambresDemandees) {
    if ($nbChambresDemandees == 0) {
        $req = "DELETE FROM Offre WHERE idEtab=:idEtab and idTypeChambre=
           :idTypeCh";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeCh', $idTypeChambre);
    } else {
        $req2 = "SELECT nombreChambres FROM Offre WHERE idEtab=:idEtab AND 
        idTypeChambre=:idTypeCh";
        $stmt2 = $connexion->prepare($req2);
        $stmt2->bindParam(':idEtab', $idEtab);
        $stmt2->bindParam(':idTypeCh', $idTypeChambre);
        $stmt2->execute();
        $lgOffre = $stmt2->fetchColumn();
        if ($lgOffre != 0) {
            $req = "UPDATE Offre SET nombreChambres=:nb 
                WHERE idEtab=:idEtab AND idTypeChambre=:idTypeCh";
        } else {
            $req = "INSERT INTO Offre VALUES(:idEtab, :idTypeCh, :nb)";
        }
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeCh', $idTypeChambre);
        $stmt->bindParam(':nb', $nbChambresDemandees);
    }
    $ok = $stmt->execute();
    return $ok;
}

// Retourne le nombre de chambres offertes pour l'id étab et l'id type chambre 
// transmis
    function obtenirNbOffre($connexion, $idEtab, $idTypeChambre) {
        $req = "SELECT nombreChambres FROM Offre WHERE idEtab=:idEtab AND 
            idTypeChambre=:idTypeCh";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idEtab', $idEtab);
        $stmt->bindParam(':idTypeCh', $idTypeChambre);
        $stmt->execute();
        $ok = $stmt->fetchColumn();
        if ($ok) {
            return $ok;
        } else {
            return 0;
        }
    }

// Retourne false si le nombre de chambres transmis est inférieur au nombre de 
// chambres occupées pour l'établissement et le type de chambre transmis 
// Retourne true dans le cas contraire
    function estModifOffreCorrecte($connexion, $idEtab, $idTypeChambre, $nombreChambres) {
        $nbOccup = obtenirNbOccup($connexion, $idEtab, $idTypeChambre);
    return ($nombreChambres >= $nbOccup);
    
    }
}
