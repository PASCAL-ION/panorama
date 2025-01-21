<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <title>Cinema</title>
  </head>
  <!-- 
    • D’ajouter, de supprimer, ou de modifier un abonnement à un client.
    • De pouvoir ajouter une entrée à cet historique (film vu par le membre aujourd’hui).
    • D’ajouter une séance pour un film (séance qui sera ajouté à la table movie_schedule).
    • De rechercher les films par date de projection (“Quels films passent ce soir ? !”). -->
  <body>
    <?php
      require_once "../views/templates/header.php";
      require_once "../controllers/cntrl_films.php";

      showMovies();
    ?>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  </body>
</html>

<!-- • De rechercher des films par genre ou par distributeur(en plus de la recherche par nom bien entendu. . .
    on parle ici de filtres). 
    • De rechercher un membre par son nom et/ou son prénom.
  -->