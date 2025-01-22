<?php 
require_once "../config/database.php";

// • D’ajouter, de supprimer, ou de modifier un abonnement à un client.
// • De pouvoir ajouter une entrée à cet historique (film vu par le membre aujourd’hui).

function getUserHistory($id){
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT movie.title AS "movie_title", movie_schedule.date_begin, room.number AS "room" FROM membership JOIN membership_log ON membership.id=membership_log.id_membership JOIN movie_schedule ON movie_schedule.id=membership_log.id_session JOIN movie ON movie_schedule.id_movie=movie.id JOIN room ON room.id=movie_schedule.id_room WHERE membership.id_user=?;';
        $stmt = $con->prepare($request);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

function modifySubscription($userid, $selected_sub_id){
    $con = BDConnection();
    if ($con) {
        if ($selected_sub_id && $userid) {
            $request = 'UPDATE membership SET id_subscription=?, date_begin=NOW() WHERE id_user=?;';
            $stmt = $con->prepare($request);
            $stmt->execute([$selected_sub_id, $userid]);
            echo "modifySubscription : ".$selected_sub_id."<br/>";
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } else {
        return [];
    }
}

// function deleteSubscription($id, $sub_selected){
//     $con = BDConnection();
//     if ($con) {
//         $request = 'ALTER ';
//         $stmt = $con->prepare($request);
//         $stmt->execute([$id]);
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     } else {
//         return [];
//     }
// }

// function addSubscription($id, $sub_selected){
//     $con = BDConnection();
//     if ($con) {
//         $request = 'ALTER ';
//         $stmt = $con->prepare($request);
//         $stmt->execute([$id]);
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     } else {
//         return [];
//     }
// }
?>