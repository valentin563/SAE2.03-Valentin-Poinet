<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
}


function updateMoviesController(){
   /* Lecture des données de formulaire
      On ne vérifie pas si les données sont valides, on suppose (faudra pas toujours...) que le client les a déjà
      vérifiées avant de les envoyer 
    */
    $name = $_REQUEST['name'];
    $director = $_REQUEST['director'];
    $description = $_REQUEST['description'];
    $id_category = $_REQUEST['id_category'];
    $year = $_REQUEST['year'];
    $length = $_REQUEST['length'];
    $image = $_REQUEST['image'];
    $trailer = $_REQUEST['trailer'];
    $min_age = $_REQUEST['min_age'];

    // Mise à jour du menu à l'aide de la fonction updateMenu décrite dans model.php
    $ok = addMovies($name, $year, $length, $id_category, $description, $director, $image, $trailer, $min_age);
    // $ok est le nombre de ligne affecté par l'opération de mise à jour dans la BDD (voir model.php)
    if ($ok!=0){
      return "Le film $name a été ajouté a la liste";
    }
    else{
      return "une erreur est survenue";
    }

}



function readMovieDetailsController(){
    // PREMIERE VERIFICATION : LES PARAMETRES EXISTENT ET SONT NON VIDES
    // Vérification du paramètre 'semaine' 
      $id = $_REQUEST['id'];
      $movie = getMovieDetail($id);
      return $movie;
}



function readCategoriesController() {
  $categories = getCategory();

  if ($categories != 0){
      return $categories;
  } else {
      return "Les catégories n'ont pas pu être récupérer";
  };
}

function readMovieCategoryController() {
  $id = $_REQUEST['id'];

  $movies = getMovieCategories($id);

  if ($movies != 0) {
      return $movies;
  } else {
      return "La catégorie $category de ces films n'a pas été récupéré";
  }
}




function addProfilController(){
  /* Lecture des données de formulaire
     On ne vérifie pas si les données sont valides, on suppose (faudra pas toujours...) que le client les a déjà
     vérifiées avant de les envoyer 
   */
   $name = $_REQUEST['name'];
   $image = $_REQUEST['image'];
   $age = $_REQUEST['age'];

   // Mise à jour du menu à l'aide de la fonction updateMenu décrite dans model.php
   $ok = addProfil($name, $image, $age);
   // $ok est le nombre de ligne affecté par l'opération de mise à jour dans la BDD (voir model.php)
   if ($ok!=0){
     return "Le profil $name a été ajouté a la liste";
   }
   else{
     return "une erreur est survenue";
   }
}



