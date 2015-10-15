<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Dao</title>
    </head>
    <body>
        <?php
        use modele\Connexion;
<<<<<<< HEAD
//        use modele\dao\AttributionDao;
        use modele\dao\EtablissementDao;
//        use modele\dao\GroupeDao;
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
        
        
  **/      
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
        
        
        
  /**        // Test de AttributionDao
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
        
        
        
        
=======
        use modele\dao\CategorieDao;
        use modele\dao\ProduitDao;
        
        
        require_once("../includes/fonctions.inc.php");
//        require_once("../modele/dao/DaoInterface.class.php");
//        require_once("../modele/dao/DaoConnexion.class.php");
//        require_once("../modele/dao/DaoCategorie.class.php");
//        require_once("../modele/metier/Categorie.class.php");
//        require_once("../modele/dao/DaoProduit.class.php");
//        require_once("../modele/metier/Produit.class.php");

        $pdo = Connexion::connecter();
        
        // Test de M_DaoCategorie
        echo "<h3>Test de DaoCategorie</h3>";

        // Categorie : test de sélection par code
        echo "<p>Categorie : test de sélection par code</p>";
        $uneCateg = CategorieDao::getOneById('bul');
        echo $uneCateg;

        // Categorie : test de sélection de tous les enregistrements
        echo "<p>Categorie : test de sélection de tous les enregistrements</p>";
        $lesCategs = CategorieDao::getAll();
        var_dump($lesCategs);

        
        // Test de M_DaoProduit
        echo "<h3>Test de DaoProduit</h3>";

        // Produit : test de sélection par référence
        echo "<p>Produit : test de sélection par référence</p>";
        $unPdt = ProduitDao::getOneById('m02');
        echo $unPdt;

        // Produit : test de sélection de tous les enregistrements
        echo "<p>Produit : test de sélection de tous les enregistrements</p>";
        $lesProds = ProduitDao::getAll();
        var_dump($lesProds);
        
        // Produit : tous les produits d'une catégorie
        echo "<p>Produit : tous les produits d'une catégorie</p>";
        $lesProds = ProduitDao::getAllByCateg('mas');
        var_dump($lesProds);

        Connexion::deconnecter();               
        
>>>>>>> c9933a051c9617af2f1960f661dc7aad77b4be53
        ?>
    </body>
</html>
