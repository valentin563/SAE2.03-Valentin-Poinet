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
    $sql = "SELECT * from Movie order by id_category";
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



function getMovieDetail($id){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.director, Movie.year, Movie.length, Movie.description, Movie.image, Movie.trailer, Movie.min_age, Movie.id_category, Category.name 
    AS category FROM Movie JOIN Category ON Movie.id_category = Category.id WHERE Movie.id = :id";
    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $movieDetail = $stmt->fetch(PDO::FETCH_OBJ);

    return $movieDetail;
}



function getCategory(){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    // Requête SQL pour récupérer le menu avec des paramètres
    $sql = "select * from Category";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie le paramètre à la valeur
    // $stmt->bindParam(':category', $category);
    // $stmt->bindParam(':title', $title);
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère les résultats de la requête sous forme d'objets
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; // Retourne les résultats
}

function getMovieCategories($category){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.director, Movie.year, Movie.length, Movie.description, Movie.image, Movie.trailer, Movie.min_age, Movie.id_category, Category.name 
    AS category FROM Movie JOIN Category ON Movie.id_category = Category.id WHERE Category.id = :category";
    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':category', $category);
    $stmt->execute();

    $movieCategory = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $movieCategory;

}



function addProfil($name, $image, $age){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD); 
    // Requête SQL de mise à jour du menu avec des paramètres
    $sql = "REPLACE INTO Profil (name, image, age) 
            VALUES (:name, :image, :age)";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie les paramètres aux valeurs
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':age', $age);
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère le nombre de lignes affectées par la requête
    $res = $stmt->rowCount(); 
    return $res;
}



function getAllProfil(){
    $cnx = new PDO("mysql:host=" .HOST. ";dbname=" .DBNAME, DBLOGIN, DBPWD);
    //Reqête sql ppour récupérer le menu avec des paramètres
    $sql = "SELECT * from Profil";
    //Prépare la requête sql
    $stmt = $cnx->prepare($sql);
    //Execute la requête sql
    $stmt->execute();
    //Récupère les résultats ed la requête sous foormes d'objet
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; //retourne le résultats
}
