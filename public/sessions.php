<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/sessions.css" />
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "../views/templates/header.php";
require_once "../controllers/cntrl_sessions.php";

$rooms = getAllRooms();
$moviesTitle = getMoviesTitle();


// alert("Hello World");

// function alert($msg) {
//     echo "<script type='text/javascript'>alert('$msg');</script>";
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['session_movie_title']) && !empty($_POST['session_movie_title'])) {
        $sessions = fetchMoviesScheduleByTitle($_POST['session_movie_title']);
    } elseif (isset($_POST['session_date']) && !empty($_POST['session_date'])) {
        $sessions = fetchMoviesScheduleByDate($_POST['session_date']);
    } elseif (isset($_POST['films']) && isset($_POST['room']) && isset($_POST['datetime'])) {
        $id_movie = $_POST['films'];
        $id_room = $_POST['room'];
        $date_begin = $_POST['datetime'];
    
        addSession($id_movie, $id_room, $date_begin);
        $sessions = fetchAllMoviesSchedule();
    } else {
        $sessions = fetchAllMoviesSchedule();
    }
} else {
    $sessions = fetchAllMoviesSchedule();
}

// Inclure la vue avec les données nécessaires
require_once "../views/view_sessions.php";

?>
</body>
</html>