<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "poinet2");
define("DBLOGIN", "poinet2");
define("DBPWD", "poinet2");


function getAllMovies(){
    $cnx = new PDO("mysql:host=" .HOST. ";dbname=" .DBNAME, DBLOGIN, DBPWD);
    //Reqête sql ppour récupérer le menu avec des paramètres
    $sql = "select * from Movie";
    //Prépare la requête sql
    $stmt = $cnx->prepare($sql);
    //Execute la requête sql
    $stmt->execute();
    //Récupère les résultats ed la requête sous foormes d'objet
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; //retourne le résultats
}