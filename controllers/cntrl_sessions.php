<?php
require_once "../models/sessions_model.php";

function getAllMoviesSchedule(){
    $sessions = fetchAllMoviesSchedule();
    require_once "../views/view_sessions.php";
}

function getMovieSessionByTitle(){
    $session_movie_title = $_POST["session_movie_title"];
    $sessions = fetchMoviesScheduleByTitle($session_movie_title);
    require_once "../views/view_sessions.php";
}

function getMovieSessionByDate(){
    $session_movie_date = $_POST["session_date"];
    $sessions = fetchMoviesScheduleByDate($session_movie_date);
    require_once "../views/view_sessions.php";
}

function addSession(){
    $id_movie = $_POST['films'];
    $id_room = $_POST['room'];
    $date_begin = $_POST['datetime'];

    if (!empty($id_movie) && !empty($id_room) && !empty($date_begin)) {
        if (sessionExists($id_movie, $id_room, $date_begin)) {
            $error_message = "Cette session existe déjà. Veuillez choisir un autre horaire ou une autre salle.";
        } else {
            addSessionInMovieSchedule($id_movie, $id_room, $date_begin);
            header("Refresh:0");
        }
    } else {
        $error_message = "Veuillez remplir tous les champs pour ajouter une session.";
    }
}

function getAllRooms(){
    return fetchAllRooms();
}

function getMoviesTitle(){
    return fetchAllMoviesTitle();
}
?>
