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


function updateMovies($w, $j, $e, $p, $d){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD); 
    // Requête SQL de mise à jour du menu avec des paramètres
    $sql = "REPLACE INTO Repas (semaine, jour, entree, plat, dessert) 
            VALUES (:semaine, :jour, :entree, :plat, :dessert)";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie les paramètres aux valeurs
    $stmt->bindParam(':entree', $e);
    $stmt->bindParam(':plat', $p);
    $stmt->bindParam(':dessert', $d);
    $stmt->bindParam(':jour', $j);
    $stmt->bindParam(':semaine', $w);
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère le nombre de lignes affectées par la requête
    $res = $stmt->rowCount(); 
    return $res;
}