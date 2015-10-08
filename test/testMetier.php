<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test Metier</title>
    </head>
    <body>
        <?php
            use modele\metier\Attribution;
            use modele\metier\Etablissement;
            use modele\metier\Groupe;
            use modele\metier\Offre;
            use modele\metier\TypeChambre;
        
           // require("../includes/fonctions.inc.php");
        require_once("../modele/metier/Attribution.class.php");
        require_once("../modele/metier/Etablissement.class.php");
        require_once("../modele/metier/Groupe.class.php");
		require_once("../modele/metier/Offre.class.php");
        require_once("../modele/metier/TypeChambre.class.php");

            
            $uneAttrib = new Attribution('0350773A','C2','g004',2);
            echo "<h4>test 1 : instancier une Attribution</h4>";
            echo "<b>Une Attribution : </b> $uneAttrib <br/>";
            
            $unEtab = new Etablissement('0350773A', 'Coll�ge Ste Jeanne d\'Arc-Choisy','3, avenue de la Borderie BP 32',35404,'Param�',0299560159,NULL,1,'Madame','Lefort','Anne');
            echo "<h4>test 2 : instancier un Etablissement</h4>";
            echo "<b> Un Etablissement : </b> $unEtab <br/>";
            
            $unGroupe = new Groupe('g001', 'Groupe folklorique du Bachkortostan',NULL,NULL,40,'Bachkirie','0');
            echo "<h4>test 3 : instancier un Groupe</h4>";
            echo "<b> Un Groupe : </b> $unGroupe <br/>";
            
            $uneOffre = new Offre('0350773A', 'C2',15);
            echo "<h4>test 4 : instancier une offre</h4>";
            echo "<b> Un Offre : </b> $uneOffre <br/>";
            
            $unTypeChambre = new TypeChambre('C1', '1 lit');
            echo "<h4>test 5 : instancier un Type Chambre</h4>";
            echo "<b> Un Type Chambre : </b> $unTypeChambre <br/>";
        ?>
    </body>
</html>