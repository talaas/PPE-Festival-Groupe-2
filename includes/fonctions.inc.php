<?php
/**
 * Charge un fichier de classe qualifiée par un espace de noms
 * @param type $className
 * @throws Exception
 */
function __autoload($className) {
    $fileName  = __DIR__.'/../';
    $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $className).'.class.php';
    if (file_exists($fileName)) {
        require_once($fileName);
//    } else {
//        throw new Exception('Pb autoload : Le fichier ' . $fileName . ' n\'existe pas.');
    }
    
}