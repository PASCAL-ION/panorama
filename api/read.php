<?php
require_once "install.php";

$id = $_POST['input'];
$rows = selectMovieGenre($id);
// print_r($rows);
foreach ($rows as $value) {
    echo $value['title'] . "<br/>";
}

function selectMovieGenre($genre){
    $con = BDConnection();
    $genre_id = 'SELECT id FROM genre WHERE ' .'name'.'='.'"'.$genre.'"' .';';
    $request = 'SELECT title FROM movie WHERE movie.id=(SELECT id_genre FROM movie_genre WHERE name="'.$genre.'");';
    $stmt = $con->query($request);
    $rows = $stmt->fetchAll();
    return $rows;
}
?>