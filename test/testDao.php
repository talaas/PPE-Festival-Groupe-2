<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Dao</title>
    </head>
    <body>
        <?php
        use modele\Connexion;
//        use modele\dao\AttributionDao;
//        use modele\dao\EtablissementDao;
        use modele\dao\GroupeDao;
//        use modele\dao\OffreDao;
//        use modele\dao\TypeChambreDao;
        use \PDO;
        
        require_once("../includes/fonctions.inc.php");
        
        
        $pdo = Connexion::connecter();
        
        // Test de OffreDao
 /**       echo "<h3>Test de OffreDao</h3>";

        // Offre : test de sélection par code
        echo "<p>Offre : test de sélection par code</p>";
        $uneOffre = OffreDao::getOneById('0350773A');
        echo $uneOffre;

        // Offre : test de sélection de tous les enregistrements
        echo "<p>Offre : test de sélection de tous les enregistrements</p>";
        $lesOffres = OffreDao::getAll();
        var_dump($lesOffres);
       
        
        // Test de TypeChambreDao
        echo "<h3>Test de TypeChambreDao</h3>";

        // TypeChambreDao : test de sélection par référence
        echo "<p>TypeChambre : test de sélection par référence</p>";
        $unTypeChambre = TypeChambreDao::getOneById('C1');
        echo $unTypeChambre;

        // TypeChambre : test de sélection de tous les enregistrements
        echo "<p>TypeChambre : test de sélection de tous les enregistrements</p>";
        $lesTypesChambres = TypeChambreDao::getAll();
        var_dump($lesTypesChambres);
        
    **/       
        // Test de GroupeDao
        echo "<h3>Test de GroupeDao</h3>";

        // GroupeDao : test de sélection par référence
        echo "<p>Groupe : test de sélection par référence</p>";
        $unGroupe = GroupeDao::getOneById('g001');
        echo $unGroupe;

        // Groupe : test de sélection de tous les enregistrements
        echo "<p>Groupe : test de sélection de tous les enregistrements</p>";
        $lesGroupes = GroupeDao::getAll();
        var_dump($lesGroupes);
        
        
  /**   
        // Test de EtablissementDao
        echo "<h3>Test de EtablissementDao</h3>";

        // EtablissementDao : test de sélection par référence
        echo "<p>Etablissement : test de sélection par référence</p>";
        $unEtablissement = EtablissementDao::getOneById('0350773A');
        echo $unEtablissement;

        // Etablissement : test de sélection de tous les enregistrements
      echo "<p>Etablissement : test de sélection de tous les enregistrements</p>";
        $lesEtablissement = EtablissementDao::getAll();
        var_dump($lesEtablissement);
        
        
        
          // Test de AttributionDao
        echo "<h3>Test de AttributionDao</h3>";

        // AttributionDao : test de sélection par référence
        echo "<p>Attribution : test de sélection par référence</p>";
        $uneAttribution = AttributionDao::getOneByIdCompo('0350773A', 'C2', 'g004');
        echo $uneAttribution;

        // Attribution : test de sélection de tous les enregistrements
        echo "<p>Attribution : test de sélection de tous les enregistrements</p>";
        $lesAttributions = AttributionDao::getAll();
        var_dump($lesAttributions);
   **/  
        

        Connexion::deconnecter();               
        
        
        
        
        ?>
    </body>
</html>
