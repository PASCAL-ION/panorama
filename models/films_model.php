<?php
require_once "../config/database.php";

function showAllMovies(){
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT title FROM movie ORDER BY title;';
        $stmt = $con->prepare($request);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }

}

function filterByGenre($option) {
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT title FROM movie WHERE movie.id IN (SELECT id_movie FROM movie_genre WHERE id_genre=?)';
        $stmt = $con->prepare($request);
        $stmt->execute([$option]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function filterByDistributor($option) {
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT title FROM movie JOIN distributor ON distributor.id = movie.id_distributor WHERE distributor.name LIKE ?';
        $stmt = $con->prepare($request);
        $stmt->execute(["%$option%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function filterByTitle($option){
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT title FROM movie WHERE title LIKE ?';
        $stmt = $con->prepare($request);
        $stmt->execute(["%$option%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function combinedFilters($genre, $distributor, $title){
    $con = BDConnection();
    if ($con) {
        if ($genre !== "Filter by genre") {
            $request = 'SELECT title FROM movie JOIN distributor ON distributor.id=movie.id_distributor JOIN movie_genre ON movie.id=movie_genre.id_movie WHERE movie.title LIKE ? AND distributor.name LIKE ? AND movie_genre.id_genre=? GROUP BY title;';
            $stmt = $con->prepare($request);
            $stmt->execute(["%$title%", "%$distributor%", $genre]);
        } else {
            $request = 'SELECT title FROM movie JOIN distributor ON distributor.id=movie.id_distributor WHERE movie.title LIKE ? AND distributor.name LIKE ? GROUP BY title;';
            $stmt = $con->prepare($request);
            $stmt->execute(["%$title%", "%$distributor%"]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
?>