<?php
namespace modele\dao;

interface Dao {
    
    /**
     * Lire tous les enregistrements d'une table
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
    public static function getAll();
    
    
    
    
}
