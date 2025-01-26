<?php
require_once "../config/database.php";

function sessionExists($id_movie, $id_room, $date_begin) {
    $con = BDConnection();
    $request = 'SELECT COUNT(*) FROM movie_schedule WHERE id_movie = ? AND id_room = ? AND date_begin = ?;';
    $stmt = $con->prepare($request);
    $stmt->execute([$id_movie, $id_room, $date_begin]);
    $count = $stmt->fetchColumn();
    return $count > 0;
}

function fetchAllMoviesSchedule(){
    $con = BDConnection();
    $request = 'SELECT title, date_begin, room.number AS room FROM movie, movie_schedule, room WHERE movie.id=movie_schedule.id_movie AND room.id=movie_schedule.id_room ORDER BY title;';
    $stmt = $con->prepare($request);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchMoviesScheduleByTitle($movie_title){
    $con = BDConnection();
    $request = 'SELECT title, date_begin, room.number FROM movie JOIN movie_schedule ms ON ms.id_movie=movie.id JOIN room ON ms.id_room=room.id AND movie.id=ms.id_movie WHERE movie.title LIKE ? ORDER BY title;';
    $stmt = $con->prepare($request);
    $stmt->execute(["%$movie_title%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchMoviesScheduleByDate($session_movie_date){
    $con = BDConnection();
    $request = 'SELECT title, date_begin, room.number FROM movie JOIN movie_schedule ms ON ms.id_movie=movie.id JOIN room ON ms.id_room=room.id AND movie.id=ms.id_movie WHERE ms.date_begin LIKE ? ORDER BY title;';
    $stmt = $con->prepare($request);
    $stmt->execute(["%$session_movie_date%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addSessionInMovieSchedule($movie_name, $id_room, $date_begin){
    $con = BDConnection();
    $id_movie = getIdFromMovieName($movie_name)[0]["id"];
    $request = 'INSERT INTO movie_schedule (id_movie, id_room, date_begin) VALUES (?, ?, ?);';
    $stmt = $con->prepare($request);
    $stmt->execute([$id_movie, $id_room, $date_begin]);
}

function getIdFromMovieName($movie_name){
    $con = BDConnection();
    $request = 'SELECT id FROM movie WHERE title=?';
    $stmt = $con->prepare($request);
    $stmt->execute(["$movie_name"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchAllRooms(){
    $con = BDConnection();
    $request = 'SELECT * FROM room;';
    $stmt = $con->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchAllMoviesTitle(){
    $con = BDConnection();
    $request = 'SELECT title FROM movie;';
    $stmt = $con->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
