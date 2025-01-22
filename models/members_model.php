<?php 
require_once "../config/database.php";

function getUsers($lastname, $firstname){
    $con = BDConnection();
    if ($con) {
        $request = 'SELECT lastname, firstname, subscription.name AS subscriptionName, subscription.id AS subscriptionId, user.id AS userid FROM user LEFT JOIN membership ON membership.id_user=user.id LEFT JOIN subscription ON subscription.id=membership.id_subscription';
        if ($lastname != "" && $firstname != "") {
            $request .= ' WHERE lastname LIKE ? OR firstname LIKE ?;';
            $stmt = $con->prepare($request);
            $stmt->execute(["%$lastname%", "%$firstname%"]);
        } elseif ($lastname != "" && $firstname == "") {
            $request .= ' WHERE lastname LIKE ?;';
            $stmt = $con->prepare($request);
            $stmt->execute(["%$lastname%"]);
        } elseif ($lastname == "" && $firstname != "") {
            $request .= ' WHERE firstname LIKE ?;';
            $stmt = $con->prepare($request);
            $stmt->execute(["%$firstname%"]);
        } else {
            $request = 'SELECT lastname, firstname, subscription.name AS subscriptionName, subscription.id AS subscriptionId, user.id AS userid FROM user LEFT JOIN membership ON membership.id_user=user.id LEFT JOIN subscription ON subscription.id=membership.id_subscription';
            $stmt = $con->prepare($request);
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
?>