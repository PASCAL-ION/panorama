<?php
require_once "../config/database.php";

function fetchAllMoviesTitle(){
    $con = BDConnection();
    $request = 'SELECT title FROM movie;';
    $stmt = $con->prepare($request);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchMemberDetails($id) {
    $con = BDConnection();
    $request = '
        SELECT 
            u.firstname, 
            u.lastname, 
            m.id_subscription AS subscriptionId 
        FROM user u 
        JOIN membership m ON u.id = m.id_user 
        WHERE u.id = ?';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function fetchUserHistory($id) {
    $con = BDConnection();
    $request = '
        SELECT 
            movie.title AS movie_title, 
            movie_schedule.date_begin, 
            room.number AS room 
        FROM membership 
        JOIN membership_log ON membership.id = membership_log.id_membership 
        JOIN movie_schedule ON movie_schedule.id = membership_log.id_session 
        JOIN movie ON movie_schedule.id_movie = movie.id 
        JOIN room ON room.id = movie_schedule.id_room 
        WHERE membership.id_user = ? ORDER BY movie_schedule.date_begin;';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateSubscription($id, $subscriptionId) {
    $con = BDConnection();
    echo "update subscription" . "<br/>";
    $request = '
        UPDATE membership 
        SET id_subscription = ?, date_begin = NOW() 
        WHERE id_user = ?';
    $stmt = $con->prepare($request);
    $stmt->execute([$subscriptionId, $id]);
}

function addSubscription($subscriptionId, $id){
    $con = BDConnection();
    $request = 'INSERT INTO membership (id_user, id_subscription, date_begin) VALUES (?, ?, NOW());';
    $stmt = $con->prepare($request);
    $stmt->execute([$id, $subscriptionId]);
}

function deleteSubscription($member_id, $id) {
    $con = BDConnection();
    deleteMembLogFirst($member_id);
    $request = 'DELETE FROM membership WHERE id_user = ?;';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
}

function addFilmToHistory($film_title, $userid) {
    $con = BDConnection();
    $membership_id = getMemberIdFromUserId($userid)['id'];
    $filmSessionExist = filmSessionExist($film_title, $userid);
    if ($filmSessionExist == true) {
        echo "Session already exist in history of this member";
    } elseif ($filmSessionExist == false) {
        echo "Session added";
        $request = 'INSERT INTO membership_log (id_membership, id_session) SELECT ? , id  FROM movie_schedule  WHERE id_movie = (SELECT id FROM movie WHERE title = ?);';
        $stmt = $con->prepare($request);
        $stmt->execute([$membership_id, $film_title]);
        header("Refresh:0");
    }
}
    
//get member id
function getMemberIdFromUserId($id){
    $con = BDConnection();
    $request = 'SELECT id FROM membership WHERE id_user=?;';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function fetchUserDetails($id){
    $con = BDConnection();
    $request = 'SELECT lastname, firstname FROM user WHERE id=?;';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteMembLogFirst($member_id){
    $con = BDConnection();
    $request = 'DELETE FROM membership_log WHERE id_membership = ?;';
    $stmt = $con->prepare($request);
    $stmt->execute([$member_id]);
}

function memberExist($id){
    $con = BDConnection();
    $request = ' SELECT * FROM membership WHERE id_user=?';
    $stmt = $con->prepare($request);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function filmSessionExist($film_title, $userid){
    $user_history = fetchUserHistory($userid);

        for ($i=0; $i < count($user_history); $i++) {
            if ($user_history[$i]["movie_title"] == $film_title) {
                return true;
            }
        }
        return false;
}
?>
