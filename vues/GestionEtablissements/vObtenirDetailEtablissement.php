<?php

include ("_debut.inc.php"); 
require_once(__DIR__."/../../includes/fonctions.inc.php");

use modele\Connexion;
use modele\metier\Etablissement;
use modele\dao\EtablissementDAO;
use modele\dao\DAO;







// OBTENIR LE DÉTAIL DE L'ÉTABLISSEMENT SÉLECTIONNÉ

$lgEtab = EtablissementDao::getOneById($id);

/** 
$lgEtab = obtenirDetailEtablissement($connexion, $id);

$nom = $lgEtab['nom'];
$adresseRue = $lgEtab['adresseRue'];
$codePostal = $lgEtab['codePostal'];
$ville = $lgEtab['ville'];
$tel = $lgEtab['tel'];
$adresseElectronique = $lgEtab['adresseElectronique'];
$type = $lgEtab['type'];
$civiliteResponsable = $lgEtab['civiliteResponsable'];
$nomResponsable = $lgEtab['nomResponsable'];
$prenomResponsable = $lgEtab['prenomResponsable'];
**/

echo "
<br>
<table width='60%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>
   
   <tr class='enTeteTabNonQuad'>
      <td colspan='3'><strong>".$lgEtab->getNom()."</strong></td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td  width='20%'> Id: </td>
      <td>".$lgEtab->getId()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Adresse: </td>
      <td>".$lgEtab->getAdresseRue()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Code postal: </td>
      <td>".$lgEtab->getCodePostal()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Ville: </td>
      <td>".$lgEtab->getVille()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Téléphone: </td>
      <td>".$lgEtab->getTel()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> E-mail: </td>
      <td>".$lgEtab->getAdresseElectronique()."</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Type: </td>";
if ($lgEtab->getType() == 1) {
    echo "<td> Etablissement scolaire </td>";
} else {
    echo "<td> Autre établissement </td>";
}
echo "
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Responsable: </td>
      <td>".$lgEtab->getCiviliteResponsable()."&nbsp; ".$lgEtab->getNomResponsable()."&nbsp; ".$lgEtab->getPrenomResponsable()."
      </td>
   </tr> 
</table>
<br>
<a href='cGestionEtablissements.php'>Retour</a>";

include("_fin.inc.php");

