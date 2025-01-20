<?php 
require_once "../config/database.php";

function getAllUsers(){
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT * FROM user LEFT JOIN membership ON membership.id_user=user.id;';
        $stmt = $con->prepare($request);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}

// function showMembers(){
//     $con = BDConnection();
//     if ($con) {
//         $request = 'SELECT firstname, lastname FROM user JOIN membership ON user.id=membership.id_user;';
//         $stmt = $con->prepare($request);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     } else {
//         return [];
//     }
// }
?>