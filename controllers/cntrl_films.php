<?php
require_once "../models/films_model.php";

function showMovies(){
    $movies = [];
    $genre = $_GET["genre"] ?? null;
    $distributor = $_GET["distributor"] ?? null;
    $title = $_GET["title"] ?? null;

    if ((!empty($distributor) && !empty($title) && $genre !== "Filter by genre") || (!empty($distributor) && !empty($title)) || (!empty($distributor) && $genre !== "Filter by genre") || (!empty($title) && $genre !== "Filter by genre")) {
        $movies = combinedFilters($genre, $distributor, $title);
    } elseif ($genre && $genre !== "Filter by genre") {
        $movies = filterByGenre($genre);
    } elseif (!empty($distributor)) {
        $movies = filterByDistributor($distributor);
    } elseif (!empty($title)) {
        $movies = filterByTitle($title);
    } 
    else {
        $movies = showAllMovies();
    }
    require_once "../views/view_films.php";
}
?>