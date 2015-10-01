<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Dao</title>
    </head>
    <body>
        <?php
        use modele\Connexion;
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
        
        ?>
    </body>
</html>
