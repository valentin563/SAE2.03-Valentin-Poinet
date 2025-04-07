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




function addMovies($na, $ye, $le, $ca, $desc, $dir, $im, $tra, $mi){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD); 
    // Requête SQL de mise à jour du menu avec des paramètres
    $sql = "REPLACE INTO Movie (name, year, length, id_category, description, director, image, trailer, min_age) 
            VALUES (:name, :year, :length, :id_category, :description, :director, :image, :trailer, :min_age)";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie les paramètres aux valeurs
    $stmt->bindParam(':name', $na);
    $stmt->bindParam(':year', $ye);
    $stmt->bindParam(':length', $le);
    $stmt->bindParam(':id_category', $ca);
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':director', $dir);
    $stmt->bindParam(':image', $im);
    $stmt->bindParam(':trailer', $tra);
    $stmt->bindParam(':min_age', $mi);

    // Exécute la requête SQL
    $stmt->execute();
    // Récupère le nombre de lignes affectées par la requête
    $res = $stmt->rowCount(); 
    return $res;
}


